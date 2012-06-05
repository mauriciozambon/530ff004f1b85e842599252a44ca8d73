<?php

class AtendimentoController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {

        if (!Helpers_Session::getInstance()->getSessVar("authenticated")) {
            $this->_helper->redirector('index', 'login');
        }

        $reqData = array("idCliente" => "00000000-0000-0000-0000-000000000007",
            "idUsuario" => Helpers_Session::getInstance()->getSessVar("cpf")
        );
        //$resp = Helpers_Connector::requestSoapService('atendimento', 'Consultar_Chamados_Por_Usuario', array(array('chamado' => $reqData)));
        $resp = Helpers_Connector::requestSoapService('atendimento', 'Consultar_Chamados_Por_Usuario', array($reqData));
        $this->view->chamados = isset($resp->Consultar_Chamados_Por_UsuarioResult->ChamadoResumido) ? $resp->Consultar_Chamados_Por_UsuarioResult->ChamadoResumido : false;
    }

    public function novochamadoAction() {
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getParams();
            $reqData = array("IdCliente" => "00000000-0000-0000-0000-000000000007",
                "IdSolicitante" => Helpers_Session::getInstance()->getSessVar("cpf"),                
                "Descricao" => $params['descricao'],
                "IdPedido" => $params['id_pedido'],
                "IdProduto" => $params['id_produto'],
                "TipoChamado" => $params['tipo_chamado']
            );
            $resp = Helpers_Connector::requestSoapService('atendimento', 'Abrir_Chamado', array(array('chamado' => $reqData)));
            if (isset($resp->Abrir_ChamadoResult->Id)) {
                $redirector = $this->getHelper('redirector');
                $redirector->gotoUrl($this->view->baseUrl() . "/atendimento/consultachamado/id/" . $resp->Abrir_ChamadoResult->Id);
            } else {
                echo "Erro ao criar chamado.";
            }
        }
    }

    public function consultachamadoAction() {
        $id = $this->getRequest()->getParam("id");
        if (empty($id)) {
            $this->_helper->redirector('index', 'atendimento');
        }
        $reqData = array("idCliente" => "00000000-0000-0000-0000-000000000007",
            "idChamado" => $id
        );
        $resp = Helpers_Connector::requestSoapService('atendimento', 'Consultar_Chamado', array($reqData));
        $this->view->chamado = $resp->Consultar_ChamadoResult;
    }

    public function interagirAction() {
        $id = $this->getRequest()->getParam("id");
        if (empty($id)) {
            $this->_helper->redirector('index', 'atendimento');
        }
        $this->view->id = $id;

        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getParams();
            $reqData = array("IdCliente" => "00000000-0000-0000-0000-000000000007",
                "Descricao" => $params['descricao'],
                "IdChamado" => $id,
                "Status" => $params['status']
            );

            $resp = Helpers_Connector::requestSoapService('atendimento', 'Alterar_Chamado', array(array('alteracao' => $reqData)));

            if ($resp) {
                $redirector = $this->getHelper('redirector');
                $redirector->gotoUrl($this->view->baseUrl() . "/atendimento/consultachamado/id/" . $id);
            }
        }
    }

}

