<?php

class CompraController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function enderecoAction() {
        if ($this->getRequest()->isPost()) {
            $cep = $this->_request->getParam('cep');
            if (!is_null($cep)) {
                $tmp = Helpers_Connector::requestSoapService('enderecos', 'CepAddress', array($cep));
                $address = array();
                $address['Logradouro'] = $tmp->address->logradouro;
                $address['Número'] = $this->_request->getParam('numero');
                $address['Bairro'] = $tmp->address->bairro;
                $address['Cidade'] = $tmp->address->localidade;
                $address['Estado'] = $tmp->address->uf;
                $address['CEP'] = $tmp->address->cep;
                $address['Frete'] = '70';
                $address['Prazo para entrega'] = '10 dias';

                Helpers_Session::getInstance()->setSessVar('preco_frete', 70);

                /* $params = array('peso' => '1',
                  'volume' => '1',
                  'cep' => '12000111','
                  'modo_entrega' => '1');
                  $result = Helpers_Connector::requestSoapService('logistica', 'calculaFrete', array($params)); */
                $this->view->assign('endereco', $address);
            } else {
                $this->view->assign('erro', 'Endereço não encontrado.');
            }
        }
    }

    public function pagamentoAction() {
        if ($this->getRequest()->isPost()) {
            $forma_de_pagamento = $this->_request->getParam('forma_de_pagamento');
            $redirector = $this->getHelper('redirector');

            if ($forma_de_pagamento == 'cc') {
                $redirector->gotoUrl("/cc/comprar/");
            } else {
                $redirector->gotoUrl("/banco/comprar/");
            }
        }

        $cpf = $this->_request->getParam('cpf');
        $cpf = '78535464670';

        $situacao = Helpers_Connector::requestSoapService('protecao', 'consultaCPF', array('consultaCPF' => array("CPF" => $cpf)));

        $this->view->assign('situacao_cpf', $situacao->consultaCPFResult->situacao);
    }

}

