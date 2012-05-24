<?php

class ProdutosController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
        ini_set ( "soap.wsdl_cache_enabled", "0" );
    }

    public function indexAction() {
        // action body
    }

    public function listarAction() {
        $categoria = $this->_request->getParam('categoria');
        if (!is_null($categoria)) {
            $categories = Helpers_Connector::requestSoapService('produtos', 'listarCategorias');
            
            $produtos = array();
            
            foreach($categories as $category) {
                if ($category[1] == $categoria) {
                    $produtos[] = Helpers_Connector::requestSoapService('produtos', 'buscaAvancada', array($category[0]));
                }
            }
            
           echo '<pre>'; print_r($produtos);
           echo '</pre>';
        } else {
            $this->assign->error('Nenhum produto encontrado.');
        }
    }

    public function detalhesAction() {
        $id = $this->_request->getParam('id');
        if (!is_null($id)) {
            var_dump(Helpers_Connector::requestSoapService('produtos', 'exibeDetalhesID', array($id)));
        } else {
            $this->view->assign('Produto não encontrado.');
        }
    }

}

