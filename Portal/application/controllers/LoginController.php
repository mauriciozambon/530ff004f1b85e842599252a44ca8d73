<?php

class LoginController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        if ($this->getRequest()->isPost()) {    //Se o form foi submetido: 
            
            $auth = false; //TODO: Fazer autenticacao
            
            if ($auth){
                //TODO: Setar variaveis de sessao e redirecionar pro index da loja
            } else {
                $this->view->error = "CPF e/ou senha inválidos.";
            }
        }
    }

}