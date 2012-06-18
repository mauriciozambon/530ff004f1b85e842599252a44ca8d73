<?php

class CompraController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function enderecoAction()
    {
        if ($this->getRequest()->isPost()) {
            $cep = $this->_request->getParam('cep');
            if (!is_null($cep)) {
                $tmp = Helpers_Connector::requestSoapService('enderecos', 'CepAddress', array($cep));
                $address = array();
                $address['Logradouro'] = $tmp->address->logradouro;
                $address['Número'] = $this->_request->getParam('numero');
                $address['Complemento'] = $this->_request->getParam('complemento');
                $address['Bairro'] = $tmp->address->bairro;
                $address['Cidade'] = $tmp->address->localidade;
                $address['Estado'] = $tmp->address->uf;
                $address['CEP'] = $tmp->address->cep;

                $id = Helpers_Session::getInstance()->getSessVar('produto_id');
                $produto = Helpers_Connector::requestSoapService('produtos', 'exibeDetalhesID', array($id));
                $peso = $produto[7];
                //calculo do volume e conversao para m^3.
                $volume = ($produto[8] * $produto[9] * $produto[10])/1000000;

                $params = array('peso' => $peso,
                                'volume' => $volume,
                                'cep' => $address['CEP'],
                                'modo_entrega' => '1');
                $result = Helpers_Connector::requestSoapService('logistica', 'calculaFrete', array($params));

                Helpers_Session::getInstance()->setSessVar('preco_frete', $result->calculaFreteReturn[1]);
                $address['Frete'] = $result->calculaFreteReturn[1];
                $address['Prazo para entrega'] = $result->calculaFreteReturn[2] . 'dias';
                

                $this->view->assign('endereco', $address);
            } else {
                $this->view->assign('erro', 'Endereço não encontrado.');
            }
        }
        else{
            $id = $this->_request->getParam('id');

            $prod = Helpers_Session::getInstance()->getSessVar('produto_id');
            Helpers_Session::getInstance()->setSessVar('produto_id', $id);

            $cpf = Helpers_Session::getInstance()->getSessVar('cpf');
            if(!isset($cpf)){
                $redir = $this->getHelper('redirector');
                $redir->gotoUrl('login/index/id/' . $id);
            }

            $params = array('CPF' => $cpf);
            $cliente = Helpers_Connector::requestSoapService('clientes', 'buscaInformacoesCliente', array('buscaInformacoesCliente' => $params));
            $this->view->assign('cliente', $cliente);
        }
    }

    public function pagamentoAction()
    {
        if ($this->getRequest()->isPost()) {
            $forma_de_pagamento = $this->_request->getParam('forma_de_pagamento');
            $redirector = $this->getHelper('redirector');

            if ($forma_de_pagamento == 'cc') {
                $redirector->gotoUrl("/cc/comprar/");
            } else {
                $redirector->gotoUrl("/banco/boleto/");
            }
        }

        $cpf = Helpers_Session::getInstance()->getSessVar('cpf');
        //$cpf = '78535464670';

        $situacao = Helpers_Connector::requestSoapService('protecao', 'consultaCPF', array('consultaCPF' => array("CPF" => $cpf)));

        $this->view->assign('situacao_cpf', $situacao->consultaCPFResult->situacao);
    }

    public function sucessoAction()
    {
        // action body
    }
}

