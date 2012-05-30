<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    public function indexAction()
    {
        $this->view->authenticated = Helpers_Session::getInstance()->getSessVar("authenticated");
    }

    public function transferenciaBancoAction()
    {
        // action body
    }


}



