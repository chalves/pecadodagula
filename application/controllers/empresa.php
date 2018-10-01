<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cadastraempresa
 *
 * @author CEDITH
 */
class Empresa extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $config_array = $this->session->userdata('logged_in');

            echo 'mmmmmmmmmmmmm';
                        $this->load->model('model_empresa');
            $resultadoEmpresa = $this->model_empresa->buscaEmpresas();
            $dados ['resultadoEmpresa'] = $resultadoEmpresa;

            $dados['opcaoView'] = 'Empresas';
            $dados['opcaoMenu'] = 'Empresas';
            $dados ['telaativa'] = 'Empresas';
            $dados ['tela'] = 'superadmin/view_listaempresas';

            $this->load->view('view_home', $dados);

        } else {
            redirect('login', 'refresh');
            return false;
        }
    }

    public function cadastrar() {
        if ($this->session->userdata('logged_in')) {
            $config_array = $this->session->userdata('logged_in');
            echo 'mmmm555555555555555555555555555mmmmmmmmm';
            $this->load->model('model_empresa');
            $resultadoEmpresa = $this->model_empresa->buscaEmpresas();
            $dados ['resultadoEmpresa'] = $resultadoEmpresa;

            $dados['opcaoView'] = 'Empresas';
            $dados['opcaoMenu'] = 'Empresas';
            $dados ['telaativa'] = 'Empresas';
            $dados ['tela'] = 'superadmin/view_listaempresas';

            $this->load->view('view_home', $dados);
        } else {
            redirect('login', 'refresh');
            return false;
        }
    }
    
    
}
