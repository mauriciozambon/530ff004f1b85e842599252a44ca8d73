<?php

class CCController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function listaCartoesAction() {

        //var_dump(Helpers_Connector::requestSoapService('cc', 'validaCompra', array(10, "Joao", "visa", "1234.1234.1234.1234", "12/12", 123, 1)));
        var_dump(Helpers_Connector::requestSoapService('cc', 'listaCartoes'));
    }

    public function comprarAction() {
        $cpf = Helpers_Session::getInstance()->getSessVar('cpf');
        $reqparams = array("CPF" => $cpf);
        $result = Helpers_Connector::requestSoapService('clientes', 'buscaPotencialCliente', array($reqparams));
        //print_r($result);
        $this->view->potencial = $result->return;//"medio";

        if ($this->getRequest()->isPost()) {
            $total = Helpers_Session::getInstance()->getSessVar('preco_produto') + Helpers_Session::getInstance()->getSessVar('preco_frete');
            $params = $this->_request->getParams();

            $request_params = array('validaCompra' => array('ValorDaCompra' => (float) ($total),
                    'NomeDoTitular' => $params['titular'],
                    'BandeiraDoCartao' => $params['bandeira'],
                    'NumeroDoCartao' => $params['numero'],
                    'DataDeValidade' => $params['validade'],
                    'CodigoDeSeguranca' => (float) ($params['codigo']),
                    'QuantidadeDeParcelas' => (float) ($params['parcelas'])));
            $aprovado = Helpers_Connector::requestSoapService('cc', 'validaCompra', $request_params);

            if ($aprovado->return) {
                $redirector = $this->getHelper('redirector');
                $redirector->gotoUrl("/compra/sucesso/");
            } else {
                $this->view->assign('error', 'Não foi possivel realizar a compra.<br/>Verifique os dados abaixo.');
            }
        }
    }
}

