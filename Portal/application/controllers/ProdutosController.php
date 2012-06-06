<?php

class ProdutosController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
        ini_set("soap.wsdl_cache_enabled", "0");
    }

    public function indexAction() {
        // action body
    }

    public function listarAction() {
        $categoria = $this->_request->getParam('categoria');
        if (!is_null($categoria)) {
            $categories = Helpers_Connector::requestSoapService('produtos', 'listarCategorias');

            $produtos = array();

            foreach ($categories as $category) {
                if ($category[1] == $categoria) {
                    $produtos = array_merge($produtos, Helpers_Connector::requestSoapService('produtos', 'buscaAvancada', array($category[0])));
                }
            }

            $preco = array();
            $imagens = array();
            srand(999999);
            foreach ($produtos as $produto) {
                $preco[] = Helpers_Connector::requestSoapService('estoque', 'returnProductInfo', array(array('ID' => $produto[0])));
                //$preco = array_merge($preco, array(rand(1000, 4000)));
                $imagens[] = Helpers_Connector::requestSoapService('produtos', 'imagensProduto', array($produto[0]));
            }

            $this->view->assign('produtos', $produtos);
            $this->view->assign('preco', $preco);
            $this->view->assign('imagens', $imagens);
        } else {
            $this->assign->error('Nenhum produto encontrado.');
        }
    }

    public function detalhesAction() {
        $id = $this->_request->getParam('id');
        if (!is_null($id)) {
            $detalhes = Helpers_Connector::requestSoapService('produtos', 'exibeDetalhesID', array($id));
            $imagens = Helpers_Connector::requestSoapService('produtos', 'imagensProduto', array($id));
            $preco = Helpers_Connector::requestSoapService('estoque', 'returnProductInfo', array(array('ID' => $id)));
            
            Helpers_Session::getInstance()->setSessVar('produto', $detalhes);
            Helpers_Session::getInstance()->setSessVar('preco_produto', $preco->ReturnProductInfoResult->Price);
            
            $this->view->assign('detalhes', $detalhes);
            $this->view->assign('imagens', $imagens);
            $this->view->assign('preco', $preco);
        } else {
            $this->view->assign('Produto não encontrado.');
        }
    }

}

