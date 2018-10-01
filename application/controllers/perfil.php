<?php

class Perfil extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index() {
        $config_array = $this->session->userdata('logged_in');

        if ($config_array['logado'] == '2') {
            $this->load->model('model_usuarios');
            $result = $this->model_usuarios->suspender();
            $this->load->view('view_lockscreen');
        } else {
            redirect('logout');
        }
    }

    public function listaperfil() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('model_perfil');
            $resultadoPerfil = $this->model_perfil->buscar();
            $dados ['resultadoPerfil'] = $resultadoPerfil;

            $dados['opcaoView'] = 'Datatables';
            $dados ['telaativa'] = 'Usuarios';
            $dados['opcaoMenu'] = 'Perfil';
            $dados ['tela'] = 'usuarios/view_listaperfil';
            $this->load->view('view_home', $dados);
        }
    }

    function cadastraperfil() {
        if ($this->session->userdata('logged_in')) {
            $dados['opcaoView'] = 'Datatables';
            $dados ['telaativa'] = 'Usuarios';
            $dados['opcaoMenu'] = 'Perfil';
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

    function alterarperfil() {
        if ($this->session->userdata('logged_in')) { // VALIDA USUARIO LOGADO                                                                                     
            $dados['opcaoView'] = 'Datatables';
            $dados ['telaativa'] = 'Usuarios';
            $dados['opcaoMenu'] = 'Perfil';
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

    function excluirperfil() {
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

    function bloquear() {
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

            if ($this->model_perfil->bloquear($dadosperfil)) {
                unset($dadosperfil);
                $resultadoPerfil = $this->model_perfil->buscar();
                $dados ['resultadoPerfil'] = $resultadoPerfil;
                unset($resultadoPerfil);

                $dados['erro'] = 0;
                $dados ['msg'] = 'Perfil de Acesso bloqueado com Sucesso..';
                $dados ['tela'] = 'usuarios/view_listaperfil';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                redirect('listaperfil');
            } else {
                unset($dadosperfil);
                $resultadoPerfil = $this->model_perfil->buscar();
                $dados ['resultadoPerfil'] = $resultadoPerfil;
                unset($resultadoPerfil);

                $dados['erro'] = 1;
                $dados ['msg'] = 'Perfil de Acesso não bloqueado. Avise ao Administrador do seu Portal..';
                $dados ['tela'] = 'usuarios/view_listaperfil';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                redirect('listaperfil');
            }
        } else {   //  Else do if que testa se o Usuario esta logado            
            //$dados ['tela'] = 'usuarios/view_listaperfil';
            redirect('logout');
        }  //  Fim do if que testa se o Usuario esta logado
    }

    function desbloquear() {
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

            if ($this->model_perfil->desbloquear($dadosperfil)) {
                unset($dadosperfil);
                $resultadoPerfil = $this->model_perfil->buscar();
                $dados ['resultadoPerfil'] = $resultadoPerfil;
                unset($resultadoPerfil);

                $dados['erro'] = 0;
                $dados ['msg'] = 'Perfil de Acesso desbloqueado com Sucesso..';
                $dados ['tela'] = 'usuarios/view_listaperfil';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                redirect('listaperfil');
            } else {
                unset($dadosperfil);
                $resultadoPerfil = $this->model_perfil->buscar();
                $dados ['resultadoPerfil'] = $resultadoPerfil;
                unset($resultadoPerfil);

                $dados['erro'] = 1;
                $dados ['msg'] = 'Perfil de Acesso não desbloqueado. Avise ao Administrador do seu Portal..';
                $dados ['tela'] = 'usuarios/view_listaperfil';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                redirect('listaperfil');
            }
        } else {   //  Else do if que testa se o Usuario esta logado
            redirect('logout');
        }  //  Fim do if que testa se o Usuario esta logado
    }

}
