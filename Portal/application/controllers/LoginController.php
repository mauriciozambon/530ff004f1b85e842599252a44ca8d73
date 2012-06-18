<?php

class LoginController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {

        $authenticated = Helpers_Session::getInstance()->getSessVar("authenticated");
        
        if ($authenticated) {  //Usuário já logado
            $redirector = $this->getHelper('redirector');
            $redirector->gotoUrl("");
        }

        if ($this->getRequest()->isPost()) {    //Se o form foi submetido: 
            $params = $this->getRequest()->getParams();
            $auth = Helpers_Connector::requestSoapService("login", "authenticate", Array($params['cpf'], $params['senha']));

            if ($auth == "1") {                
                $session = Helpers_Session::getInstance();
                $session->setSessVar("authenticated", true);
                $session->setSessVar("cpf", $params['cpf']);                
                $redirector = $this->getHelper('redirector');
                if(isset($params['id'])){
                    $redirector->gotoUrl('compra/endereco/id/' . $params['id']);
                }
                else{
                    $redirector->gotoUrl("");
                }
            } else {
                $this->view->error = $auth;
            }
        }
        else{
            $id = $this->_request->getParam('id');
            if(isset($id)){
                $this->view->assign('id', $id);
            }
        }
    }

    public function logoutAction() {
        //Kills the mothafucka's session
        Helpers_Session::getInstance()->sessDestroy();
        $redir = $this->getHelper('redirector');
        $redir->gotoUrl('');
    }

}

