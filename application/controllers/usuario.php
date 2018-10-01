<?php

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index() {
        $data['title'] = "Pecado da Gula - Login";
        $data['heading'] = "Autenticação do Usuário";

        $config_array = $this->session->userdata('logged_in');

        if ($config_array['logado'] == '2') {
            $this->load->model('model_usuarios');
            $result = $this->model_usuarios->suspender();
            $this->load->view('view_lockscreen');
        } else {
            redirect('login');
        }
    }

    function listar() {
        if ($this->session->userdata('logged_in')) {
            $empresaLogin = $this->session->userdata('empresa_login');                
            
            $idEmpresa = $empresaLogin['id'];
            
            $this->load->model('model_usuarios');
            $resultadoUsuarios = $this->model_usuarios->listar( $idEmpresa );
            $dados ['resultadoUsuarios'] = $resultadoUsuarios;

            $dados['opcaoView'] = 'Datatables';
            $dados['opcaoMenu'] = 'Usuario';
            $dados ['telaativa'] = 'Usuarios';
            $dados ['tela'] = 'usuarios/view_listausuarios';
            $this->load->view('view_home', $dados);
        }
    }

}

//  Fim da Class                    