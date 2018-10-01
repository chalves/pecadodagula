<?php
/**
* THE SOFTWARE @@  PECADO DA GULA 
 *
 * @package    PecadoGula
 * @author    Carlos Henrique ( Faustao )
 * @copyright    Copyright (c) 2017 - 2018, VRA Web hosting, Ltda. (https://VRAWEBHOSTING.com/)
 * @license    https://opensource.org/licenses/MIT    MIT License
 * @link    http://pecadodagula.net
 * @since    Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 * Class Home
 *
 * Acionado após o processo de Autenticação do Usuário
 *
 * @package    PecadoGula    
 * @subpackage   Controller
 * @category    Administração
 * @author        Carlos Henrique ( Faustao )
 * @link       http://pecadodagula.net
 * 
 * Repositorio GitHub
 * 
 *  Nome : pecadodagula
 * 
 *  URL Acesso : https://github.com/chalves/pecadodagula.git 
 */

class Home extends CI_Controller {

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

    public function suspender() {
        if ($this->session->userdata('logged_in')) {
            $config_array = $this->session->userdata('logged_in');

            if ($config_array['logado'] == '1') {
                $this->load->model('model_usuarios');
                $result = $this->model_usuarios->suspender();
            }

            $config_array['logado'] = '2';
            $this->session->set_userdata('logged_in', $config_array);

            $dados['opcaoView'] = 'lockscreen';
            $dados['opcaoMenu'] = 'Lockscreen';
//            $dados ['telaativa'] = 'lockscreen';
//            $dados ['tela'] = 'view_lockscreen';
            $this->load->view('view_lockscreen');
            return true;
        } else {
            redirect('login', 'refresh');
            return false;
        }
    }

    public function logout() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('model_usuarios');
            $result = $this->model_usuarios->logout();
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('empresa_login');
            session_destroy();
            redirect('home', 'refresh');
        } else {
            redirect('login', 'refresh');
        }
    }

    /*
     * Super Administrador
     */
    public function listaempresas() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('model_empresa');
            $resultadoEmpresa = $this->model_empresa->buscarEmpresas();
            $dados ['resultadoEmpresa'] = $resultadoEmpresa;

            $dados['opcaoView'] = 'Empresas';
            $dados['opcaoMenu'] = 'Empresas';
            $dados ['telaativa'] = 'Empresas';
            $dados ['tela'] = 'superadmin/view_listaempresas';

            $this->load->view('view_home', $dados);
        } else {
            redirect('login', 'refresh');
        }
    }

    public function incluirempresa() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('model_uf');
            $resultadoUF = $this->model_uf->buscaUF();
            $dados ['resultadoUF'] = $resultadoUF;

            $this->session->unset_userdata('resultadoUF');
            $this->session->set_userdata('resultadoUF', $resultadoUF);

            $this->load->model('model_tipoempresa');
            $resultadoTipoEmpresa = $this->model_tipoempresa->buscaTipo();
            $dados ['resultadoTipoEmpresa'] = $resultadoTipoEmpresa;

            $this->session->unset_userdata('resultadoTipoEmpresa');
            $this->session->set_userdata('resultadoTipoEmpresa', $resultadoTipoEmpresa);

            $dados['opcaoView'] = 'Empresas';
            $dados ['telaativa'] = 'Empresas';
            $dados['opcaoMenu'] = 'Empresas';
            $dados ['tela'] = 'superadmin/view_incluirempresa';
            $this->load->view('view_home', $dados);
        } else {
            redirect('login', 'refresh');
        }
    }

    public function cadastrarempresa() {
        if ($this->session->userdata('logged_in')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'nomeFantasia',
                    'label' => 'Nome Fantasia',
                    'rules' => 'trim|required|min_length[5]',
                    'errors' => array(
                        'required' => 'Campo %s é obrigatório.',
                        'min_length' => 'Campo %s tem menos que 5 caracteres.'
                    )
                ),
                array(
                    'field' => 'razaoSocial',
                    'label' => 'Razão Social',
                    'rules' => 'trim|required|min_length[5]',
                    'errors' => array(
                        'required' => 'Campo %s é obrigatório.',
                        'min_length' => 'Campo %s tem menos que 5 caracteres.'
                    )
                ),
                array(
                    'field' => 'cgc',
                    'label' => 'Número do CGC',
                    'rules' => 'trim|required|numeric|exact_length[14]',
                    'errors' => array(
                        'required' => 'Campo %s é obrigatório.',
                        'numeric' => 'Campo %s não é numérico.',
                        'exact_length' => 'O tamanho do %s diferente de 14 caracteres numéricos.'
                    )
                ), array(
                    'field' => 'endereco',
                    'label' => 'Endereço',
                    'rules' => 'trim|required|min_length[5]',
                    'errors' => array(
                        'required' => 'Campo %s é obrigatório.',
                        'min_length' => 'Campo %s tem menos que 5 caracteres.'
                    )
                ), array(
                    'field' => 'cep',
                    'label' => 'Código Postal (Cep)',
                    'rules' => 'trim|required|numeric|exact_length[8]',
                    'errors' => array(
                        'required' => 'Campo %s é obrigatório.',
                        'numeric' => 'Campo %s não é numérico.',
                        'exact_length' => 'O tamanho do %s diferente de 8 caracteres numéricos.'
                    )
                ),
            );

            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE) {
//FALHA DE VALIDAÇÃO.  Redirecionando para pagina de login                                                            
                $dados ['msg'] = 'Ocorreu um(ns) erro(s) ao cadastrar a Empresa.  Favor corrigir  e tentar novamente';
                $dados['erro'] = 1;
                $this->load->model('model_empresa');
                $resultadoEmpresa = $this->model_empresa->buscarEmpresas();

                $dados['opcaoView'] = 'Empresas';
                $dados ['telaativa'] = 'Empresas';
                $dados['opcaoMenu'] = 'Empresas';
                $dados ['tela'] = 'superadmin/view_incluirempresa';
                $this->load->view('view_home', $dados);
            } else {
                $dadosempresa ['nomeFantasia'] = $this->input->post('nomeFantasia');
                $dadosempresa ['razaoSocial'] = $this->input->post('razaoSocial');
//                $dadosempresa ['cgc'] = $this->input->post('cgc');
//                $dadosempresa ['cep'] = $this->input->post('cep');
//                $dadosempresa ['endereco'] = $this->input->post('endereco');

                $this->load->model('model_empresa');
                $resultadocadastroempresal = $this->model_empresa->cadastrarEmpresa($dadosempresa);

                if ($resultadocadastroempresal) {

                    $dados['opcaoView'] = 'Empresas';
                    $dados ['telaativa'] = 'Empresas';
                    $dados['opcaoMenu'] = 'Empresas';
                    $dados ['tela'] = 'superadmin/view_listempresas';
                    $dados ['msg'] = 'Estabelecimento Comercial cadastrado com sucesso.';
                    $dados['erro'] = 0;
                    $this->load->view('view_home', $dados);
                }
            }
        } else {
            redirect('login', 'refresh');
        }
    }

// Fim das Funcoes uper Administrador

    /*
     * DashBoard
     */
    public function dashboard() {        
        if ($this->session->userdata('logged_in')) {
            $dados['opcaoView'] = 'Dashboard';
            $dados['opcaoMenu'] = 'Dashboard';
            $dados ['telaativa'] = 'Dashboard';
            $dados ['tela'] = 'dashboard/view_dashboard';                    
            $this->load->view('view_home', $dados);
        } else {
            redirect('login', 'refresh');
        }
    }

    public function dashboard2() {
        if ($this->session->userdata('logged_in')) {
            $dados['opcaoView'] = 'Dashboard';
            $dados['opcaoMenu'] = 'Dashboard2';
            $dados ['telaativa'] = 'Fechmensal';
            $dados ['tela'] = 'dashboard/view_fechmensal';
            $this->load->view('view_home', $dados);
        } else {
            redirect('login', 'refresh');
        }
    }

    /*
     * USUARIOS
     */

    function listausuarios() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('model_usuarios');
            $resultadoUsuarios = $this->model_usuarios->buscaUsuarios();
            $dados ['resultadoUsuario'] = $resultadoUsuarios;

            $dados['opcaoView'] = 'Datatables';
            $dados['opcaoMenu'] = 'Usuario';
            $dados ['telaativa'] = 'Usuarios';
            $dados ['tela'] = 'usuarios/view_listausuarios';
            $this->load->view('view_home', $dados);
        }
    }

    function profile() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('model_usuarios');
            $resultadoUsuarios = $this->model_usuarios->buscaUsuarios();
            $dados ['resultadoUsuario'] = $resultadoUsuarios;

            $dados['opcaoView'] = 'profile';
            $dados['opcaoMenu'] = 'Profile';
            $dados ['telaativa'] = 'Usuarios';
            $dados ['tela'] = 'usuarios/view_profileusuario';
            $this->load->view('view_home', $dados);
        }
    }

  
    /*
     * CARGOS
     */

    public function xlistacargos() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('model_cargos');
            $resultadoCargo = $this->model_cargos->buscaCargo();
            $dados ['resultadoCargo'] = $resultadoCargo;

            $dados['opcaoView'] = 'Datatables';
            $dados['opcaoMenu'] = 'Cargo';
            $dados ['telaativa'] = 'Usuarios';
            $dados ['tela'] = 'usuarios/view_listacargos';
            $dados['erro'] = 0;
            $this->load->view('view_home', $dados);
        }
    }

    function xcadastracargo() {
        if ($this->session->userdata('logged_in')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'descricao',
                    'label' => 'Descrição do Cargo',
                    'rules' => 'trim|required|min_length[5]',
                    'errors' => array(
                        'required' => 'Campo %s é obrigatório.',
                        'min_length' => 'Campo %s tem menos que 5 caracteres.'
                    ),
                )
            );

            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE) {
//FALHA DE VALIDAÇÃO.  Redirecionando para pagina de login                                                            
                $dados ['msg'] = 'Ocorreu um erro ao cadastrar o Cargo..  Tente novamente';
                $dados['erro'] = 1;
                $this->load->model('model_cargo');
                $resultadoCargo = $this->model_cargo->buscaCargo();
                $dados ['resultadoCargo'] = $resultadoCargo;

                $dados['opcaoView'] = 'Datatables';
                $dados ['telaativa'] = 'Usuarios';
                $dados['opcaoMenu'] = 'Cargo';
                $dados ['tela'] = 'usuarios/view_listacargo';
                $this->load->view('view_home', $dados);
            } else {
                $dadosperfil ['descricao'] = $this->input->post('descricao');
                $dadosperfil ['status'] = 1;

                $this->load->model('model_cargo');
                $resultadocadastrocargo = $this->model_cargo->cadastracargo($dadoscargo);

                if ($resultadocadastrocargo) {
                    $resultadoCargo = $this->model_cargo->buscaCargo();
                    $dados ['resultadoCargo'] = $resultadoCargo;

                    $dados['opcaoView'] = 'Datatables';
                    $dados['opcaoMenu'] = 'Cargo';
                    $dados ['telaativa'] = 'Usuarios';
                    $dados ['tela'] = 'usuarios/view_listacargo';
                    $dados ['msg'] = 'Cargo cadastrado com sucesso.';
                    $dados['erro'] = 0;
                    $this->load->view('view_home', $dados);
                }
            }
        } else {
            redirect('login');
        }
    }

// Fim da Function cadastraPerfil

    function xalterarcargo() {
        if ($this->session->userdata('logged_in')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'id',
                    'label' => 'codigo do Cargo',
                    'errors' => array(
                        'required' => 'Campo %s é obrigatório.'
                    ),
                ),
                array(
                    'field' => 'descricao',
                    'label' => 'Descrição do Cargo',
                    'rules' => 'trim|required|min_length[5]',
                    'errors' => array(
                        'required' => 'Campo %s é obrigatório.',
                        'min_length' => 'Campo %s tem menos que 5 caracteres.'
                    ),
                )
            );

            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE) {
//FALHA DE VALIDAÇÃO.  Redirecionando para pagina de login                                                            
                $dados ['msg'] = 'Ocorreu um erro ao cadastrar o Cargo..  Tente novamente';
                $dados['erro'] = 1;
                $this->load->model('model_cargo');
                $resultadoCargo = $this->model_cargo->buscaCargo();
                $dados ['resultadoCargo'] = $resultadoCargo;

                $dados['opcaoView'] = 'Datatables';
                $dados ['telaativa'] = 'Usuarios';
                $dados['opcaoMenu'] = 'Cargo';
                $dados ['tela'] = 'usuarios/view_listacargo';
//$this->load->view('view_home', $dados);                                                                                                                                                                                                                                           
            } else {
                $dadosperfil ['id'] = $this->input->post('id');
                $dadosperfil ['descricao'] = $this->input->post('descricao');
                $dadosperfil ['status'] = 1;
                $this->load->model('model_cargo');
                $resultadoalterarcargo = $this->model_cargo->altualizacargo($dadoscargo);
                unset($dadoscargo);

                $this->load->model('model_cargo');
                $resultadoCargo = $this->model_cargo->buscaCargo();
                $dados ['resultadoCargo'] = $resultadoCargo;
                unset($resultadocargo);

                $dados['opcaoView'] = 'Datatables';
                $dados ['telaativa'] = 'Usuarios';
                $dados['opcaoMenu'] = 'Cargo';
                $dados['erro'] = 0;
                $dados ['msg'] = 'Cargo alterado com Sucesso..';
                $dados ['tela'] = 'usuarios/view_listacargo';
                $this->load->view('view_home', $dados);
//redirect('home/perfil/listaperfil', 'refresh');                                    
            }   //  Fim da validação do Form
        } else {   //  Else do if que testa se o Usuario esta logado
            $this->load->model('model_cargo');
            $resultadoCargo = $this->model_cargo->buscaCargo();
            $dados ['resultadoCargo'] = $resultadoCargo;

            $dados['opcaoView'] = 'Datatables';
            $dados ['telaativa'] = 'Usuarios';
            $dados['opcaoMenu'] = 'Cargo';
            $dados['erro'] = 1;
            $dados ['msg'] = 'USUÁRIO NÃO LOGADO...';
            $dados ['tela'] = 'usuarios/view_listacargo';
            $this->load->view('view_home', $dados);
//redirect('home/perfil/listaperfil', 'refresh');                                    
        }  //  Fim do if que testa se o Usuario esta logado
    }

//  Fim da funcao alterarperfil

    function xexcluircargo() {
        if ($this->session->userdata('logged_in')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('model_cargo');

            $dadoscargo ['id'] = $this->input->post('id');
            $dadoscargo ['descricao'] = $this->input->post('descricao');
            $dadoscargo ['status'] = 1;

            if ($resultadoexcluircargo = $this->model_cargo->deletacargo($dadoscargo)) {
//                                        unset( $dadoscargo);
                $this->load->model('model_cargo');
                $resultadoCargo = $this->model_cargo->buscaCargo();
                $dados ['resultadoCargo'] = $resultadoCargo;
                unset($resultadocargo);

                $dados['opcaoView'] = 'Datatables';
                $dados ['telaativa'] = 'Usuarios';
                $dados['opcaoMenu'] = 'Cargo';
                $dados['erro'] = 0;
                $dados ['msg'] = 'Cargo deletado com Sucesso..';
                $dados ['tela'] = 'usuarios/view_listacargo';
                $this->load->view('view_home', $dados);
//redirect('home/perfil/listaperfil', 'refresh');                                                        
            } else {
                unset($dadoscargo);
                $this->load->model('model_cargo');
                $resultadoCargo = $this->model_cargo->buscaCargo();
                $dados ['resultadoCargo'] = $resultadoCargo;
                unset($resultadocargo);

                $dados['opcaoView'] = 'Datatables';
                $dados ['telaativa'] = 'Usuarios';
                $dados['opcaoMenu'] = 'Cargo';
                $dados['erro'] = 1;
                $dados ['msg'] = 'Cargo não deletado. Ocorreu um problema  no comando delete..';
                $dados ['tela'] = 'usuarios/view_listaperfil';
                $this->load->view('view_home', $dados);
//redirect('home/perfil/listaperfil', 'refresh');                                                        
            }
        } else {   //  Else do if que testa se o Usuario esta logado
            $this->load->model('model_cargo');
            $resultadoCargo = $this->model_perfil->buscaCargo();
            $dados ['resultadoCargo'] = $resultadoCargo;

            $dados['opcaoView'] = 'Datatables';
            $dados ['telaativa'] = 'Usuarios';
            $dados['opcaoMenu'] = 'Cargo';
            $dados['erro'] = 1;
            $dados ['msg'] = 'USUÁRIO NÃO LOGADO...';
            $dados ['tela'] = 'usuarios/view_listaperfil';
            $this->load->view('view_home', $dados);
//redirect('home/perfil/listaperfil', 'refresh');                                    
        }  //  Fim do if que testa se o Usuario esta logado
    }

}

//  Fim da Class                    