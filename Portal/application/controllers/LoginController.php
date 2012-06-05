<?php

class LoginController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {

        $authenticated = Helpers_Session::getInstance()->getSessVar("authenticated");
        
        if ($authenticated) {  //Usuário já logado
            $redirector = $this->getHelper('redirector');
            $redirector->gotoUrl($this->view->baseUrl() . "/produtos/listar/categoria/1");
        }

        if ($this->getRequest()->isPost()) {    //Se o form foi submetido: 
            $params = $this->getRequest()->getParams();
            $auth = Helpers_Connector::requestSoapService("login", "authenticate", Array($params['cpf'], $params['senha']));

            if ($auth == "1") {                
                $session = Helpers_Session::getInstance();
                $session->setSessVar("authenticated", true);
                $session->setSessVar("cpf", $params['cpf']);                
                $redirector = $this->getHelper('redirector');
                $redirector->gotoUrl($this->view->baseUrl() . "/produtos/listar/categoria/1");
            } else {
                $this->view->error = $auth;
            }
        }
    }

    public function logoutAction() {
        //Kills the mothafucka's session
        Helpers_Session::getInstance()->sessDestroy();
    }

}

