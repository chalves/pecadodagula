<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Relação das Funcionalidades do Mural:
 * _construct : Responsável em instanciar a classe Mural
 * index : Função sempre executada quando a classe Mural é instanciada
 * exibir : Permite recuperar um recado para ser consultado / exibido
 * incluir : view_incluirRecado
 * alterar : 
 * excluir :  
 * salvar :
 * responder : Função responsável em responder um recado
 */

class Mural extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->model('model_mural');
    }

    public function index() {
        $config_array = $this->session->userdata('logged_in');

        if ($config_array['logado'] == '2') {
            $this->load->model('model_usuarios');
            $result = $this->model_usuarios->suspender();
            $this->load->view('view_lockscreen');
        } elseif ($config_array['logado'] != '1') {
            redirect('logout');
        }
    }

    public function incluir() {
        if ($this->session->userdata('logged_in')) {
            $empresaLogin = $this->session->userdata('empresa_login');
            $idEmpresa = $empresaLogin['id'];
            
            $this->load->model('model_usuarios');
            $resultadoUsuarios = $this->model_usuarios->listar($idEmpresa);
            $dados ['listaUsuarios'] = $resultadoUsuarios;

            $dados['opcaoView'] = 'Apoio/Mural';
            $dados ['telaativa'] = 'Mural/Incluir';
            $dados['opcaoMenu'] = 'Mural';
            $dados ['tela'] = 'apoio/mural/view_incluirRecado';
            $this->load->view('view_home', $dados);
        }
    }

    public function exibir() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('model_mural');
            $resultadoMural = $this->model_mural->buscar();
            $dados ['resultadoMural'] = $resultadoMural;

            $dados['opcaoView'] = 'Apoio/Mural';
            $dados ['telaativa'] = 'Mural/Incluir';
            $dados['opcaoMenu'] = 'Mural';
            $dados ['tela'] = 'apoio/view_exibirMural';
            $this->load->view('view_home', $dados);
        }
    }

    function cadastrar() {
        if ($this->session->userdata('logged_in')) {
            $dados['opcaoView'] = 'Apoio/Mural';
            $dados ['telaativa'] = 'Mural/Incluir';
            $dados['opcaoMenu'] = 'Mural';
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'descricao',
                    'label' => 'Descrição do Perfil',
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
                $this->load->model('model_perfil');
                $resultadocadastroperfil = $this->model_perfil->buscar();

                $dados ['msg'] = 'Ocorreu um erro ao cadastrar o Perfil..  Tente novamente';
                $dados['erro'] = 1;
                $dados ['resultadoPerfil'] = $resultadocadastroperfil;
                $dados ['tela'] = 'usuarios/view_listaperfil';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                redirect('listaperfil', 'refresh');
            } else {
                $dadosperfil ['descricao'] = $this->input->post('descricao');
                $dadosperfil ['status'] = 1;

                $this->load->model('model_perfil');
                $resultadocadastroperfil = $this->model_perfil->cadastrar($dadosperfil);

                if ($resultadocadastroperfil) {
                    $this->load->model('model_perfil');
                    $resultadocadastroperfil = $this->model_perfil->buscar();
                    $dados ['resultadoPerfil'] = $resultadocadastroperfil;
                    $dados ['tela'] = 'usuarios/view_listaperfil';
                    $dados ['msg'] = 'Perfil de Acesso cadastrado com sucesso.';
                    $dados['erro'] = 0;
                    $_SESSION['msg'] = $dados ['msg'];
                    $_SESSION['erro'] = $dados ['erro'];
                    redirect('listaperfil');
                }
            }
        } else {
            redirect('logout');
        }
    }

// Fim da Function cadastraPerfil

    function alterar() {
        if ($this->session->userdata('logged_in')) { // VALIDA USUARIO LOGADO                                                                                     
            $dados['opcaoView'] = 'Apoio/Mural';
            $dados ['telaativa'] = 'Mural/Incluir';
            $dados['opcaoMenu'] = 'Mural';
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'id',
                    'label' => 'codigo do Perfil',
                    'errors' => array(
                        'required' => 'Campo %s é obrigatório.'
                    ),
                ),
                array(
                    'field' => 'descricao',
                    'label' => 'Descrição do Perfil',
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
                $dados ['msg'] = 'Ocorreu um erro ao cadastrar o Perfil..  Tente novamente';
                $dados['erro'] = 1;
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                $dados ['resultadoPerfil'] = $resultadoPerfil;
                $dados ['tela'] = 'usuarios/view_listaperfil';
                redirect('listaperfil');
            } else {
                $dadosperfil ['id'] = $this->input->post('id');
                $dadosperfil ['descricao'] = $this->input->post('descricao');
                $dadosperfil ['status'] = 1;

                $this->load->model('model_perfil');
                $resultadoalterarperfil = $this->model_perfil->altualizar($dadosperfil);
                unset($dadosperfil);

                $dados['erro'] = 0;
                $dados ['msg'] = 'Perfil de Acesso alterado com Sucesso..';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                $dados ['tela'] = 'usuarios/view_listaperfil';
                redirect('listaperfil');
            }   //  Fim da validação do Form
        } else {   //  Else do if que testa se o Usuario esta logado
            redirect('logout');
        }  //  Fim do if que testa se o Usuario esta logado
    }

//  Fim da funcao alterarperfil

    function excluir() {
        if ($this->session->userdata('logged_in')) {
            $dados['opcaoView'] = 'Datatables';
            $dados ['telaativa'] = 'Usuarios';
            $dados['$opcaoMenu'] = 'Perfil';
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('model_perfil');

            $dadosperfil ['id'] = $this->input->post('id');
            $dadosperfil ['descricao'] = $this->input->post('descricao');
            $dadosperfil ['status'] = 1;

            if ($resultadoexcluirperfil = $this->model_perfil->deletar($dadosperfil)) {
                unset($dadosperfil);
                $dados['erro'] = 0;
                $dados ['msg'] = 'Perfil de Acesso deletado com Sucesso..';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                $dados ['tela'] = 'usuarios/view_listaperfil';
                redirect('listaperfil');
            } else {
                unset($dadosperfil);
                $dados['erro'] = 1;
                $dados ['msg'] = 'Perfil de Acesso não deletado. Ocorreu um problema  no comando delete..';
                $dados ['tela'] = 'usuarios/view_listaperfil';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                redirect('listaperfil');
            }
        } else {   //  Else do if que testa se o Usuario esta logado
            redirect('logout');
        }  //  Fim do if que testa se o Usuario esta logado
    }

    function salvar() {
        if ($this->session->userdata('logged_in')) {
            
        } else {
            
        }
    }

    function responder() {
        if ($this->session->userdata('logged_in')) {
            $dados['opcaoView'] = 'Mural';
            $dados ['telaativa'] = 'Responder';
            $dados['opcaoMenu'] = 'Mural';

            $dadosRecado = Array();
            $dadosRecado ['id'] = $this->input->post('id');
            $dadosRecado ['recado'] = $this->input->post('textoRecado');
            $dadosRecado ['prioridade'] = $this->input->post('prioridade');
            $dadosRecado ['resposta'] = $this->input->post('resposta');
            $dadosRecado ['assunto'] = $this->input->post('textoAssunto');
            $dadosRecado ['idDE'] = $this->input->post('idDE');
            $dadosRecado ['idPara'] = $this->input->post('idPara');

            $dadosRecado ['idOrigem'] = $this->input->post('idOrigem');
            $dadosRecado ['dataOrigem'] = $this->input->post('dataOrigem');

            $dadosRecado ['lido'] = 2;
            $dadosRecado ['enviouResposta'] = 1;

            var_dump($dadosRecado);

            $this->load->model('model_mural');
            $resultadoMural = $this->model_mural->responder($dadosRecado);

            if ($resultadoMural) {
                // THEN -  A fun;'ao responder um recado foi executado com sucesso
                $dados['erro'] = 0;
                $dados ['msg'] = 'Sua Resposta foi salva e enviada ao Remetente com Sucesso..';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                $_SESSION ['resultadoMural'] = $resultadoMural;
                $_SESSION['dados'] = $dados;

                $dados ['tela'] = 'apoio/view_exibirMural';
                $this->load->view('view_home', $dados);
                // redirect('exibirMural');
            } else {
                unset($dadosRecado);
                $resultadoMural = $this->model_mural->buscar();
                unset($resultadoMural);

                $dados['erro'] = 1;
                $dados ['msg'] = 'Não foi possível salvar e nem enviar a sua resposta. Avise ao Administrador do seu Portal..';
                $dados ['tela'] = 'usuarios/view_exibirMural';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                $_SESSION['dados'] = $dados;
                redirect('exibirMural');
            }
        } else {
            redirect('logout');
        }
    }

}
