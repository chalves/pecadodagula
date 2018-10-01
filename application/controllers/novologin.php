<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Novologin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_usuarios', TRUE);
        $this->load->helper('url');
    }

    public function index() {
        if (isset($_SERVER['erroLockScreen'])) {
            unset($_SERVER['erroLockScreen']);
        }
        $config_array = $this->session->userdata('logged_in');
        $this->load->model('model_usuarios');
        $result = $this->model_usuarios->novologin();
        $config_array['logado'] = '0';
        $this->session->set_userdata('logged_in', $config_array);

        $dados['opcaoView'] = 'dashboard';
        $dados['opcaoMenu'] = 'Dashboard';
        $dados ['telaativa'] = 'dashboard';
        $dados ['tela'] = 'telas/view_dasboard';
        redirect('login', 'refresh');
    }

}
