<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Liberar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_usuarios', TRUE);
        $this->load->helper('url');
    }

    public function index() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');        
        $config = array(
            array(
                'field' => 'senha',
                'label' => 'Senha de Autenticação',
                'rules' => 'trim|required|min_length[3]|callback_validarlogin',
                'errors' => array(
                    'required' => 'Campo %s é obrigatório.',
                    'min_length' => 'Campo %s tem menos que 3 caracteres.',
                    'validarlogin' => '%s informada inválida.'
                ),
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            //FALHA DE VALIDAÇÃO.  Redirecionando para pagina de suspensão do terminal      
            $_SERVER['erroLockScreen'] = 1;
            $this->load->view('view_lockscreen');
        } else {
            if (isset($_SERVER['erroLockScreen'])) {
                unset($_SERVER['erroLockScreen']);
            }

            $config_array = $this->session->userdata('logged_in');
            $this->load->model('model_usuarios');
            $result = $this->model_usuarios->liberar();
            $config_array['logado'] = '1';
            $this->session->set_userdata('logged_in', $config_array);

            $dados['opcaoView'] = 'dashboard';
            $dados['opcaoMenu'] = 'Dashboard';
            $dados ['telaativa'] = 'dashboard';
            $dados ['tela'] = 'telas/view_dasboard';            
            redirect('home/dashboard', 'refresh');
        }
    }

    public function validarlogin() {
        $senhaInformada = $this->input->post('senha');
        $dadosUSR = $this->session->userdata('logged_in');
        $senhaUSR = $dadosUSR['senhaUsuario'];        
        if ($senhaInformada == $senhaUSR) {
            return true;
        } else {
            return false;
        }
    }

}
