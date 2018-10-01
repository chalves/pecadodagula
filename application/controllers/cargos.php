
<?php

class Cargos extends CI_Controller {

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

    public function listacargos() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('model_cargos');
            $resultadoCargos = $this->model_cargos->buscar();
            $dados ['resultadoCargos'] = $resultadoCargos;

            $dados['opcaoView'] = 'Datatables';
            $dados ['telaativa'] = 'Usuarios';
            $dados['opcaoMenu'] = 'Cargos';
            $dados ['tela'] = 'usuarios/view_listacargos';
            $this->load->view('view_home', $dados);
        }
    }

    function cadastracargo() {
        if ($this->session->userdata('logged_in')) {
            $dados['opcaoView'] = 'Datatables';
            $dados ['telaativa'] = 'Usuarios';
            $dados['opcaoMenu'] = 'Cargos';
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
                $this->load->model('model_cargos');
                $resultadocadastrocargos = $this->model_cargos->buscar();

                $dados ['msg'] = 'Ocorreu um erro ao cadastrar a descrição do Cargo..  Tente novamente';
                $dados['erro'] = 1;
                $dados ['resultadoCargos'] = $resultadocadastrocargos;
                $dados ['tela'] = 'usuarios/view_listacargos';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                redirect('listacargos', 'refresh');
            } else {
                $dadoscargos ['descricao'] = $this->input->post('descricao');
                $dadoscargos ['status'] = 1;

                $this->load->model('model_cargos');
                $resultadocadastrocargos = $this->model_cargos->cadastrar($dadoscargos);

                if ($resultadocadastrocargos) {
                    $this->load->model('model_cargos');
                    $resultadocadastrocargos = $this->model_cargos->buscar();
                    $dados ['resultadoCargos'] = $resultadocadastrocargos;
                    $dados ['tela'] = 'usuarios/view_listacargos';
                    $dados ['msg'] = 'A descrição do Cargo cadastrado com sucesso.';
                    $dados['erro'] = 0;
                    $_SESSION['msg'] = $dados ['msg'];
                    $_SESSION['erro'] = $dados ['erro'];
                    redirect('listacargos');
                }
            }
        } else {
            redirect('logout');
        }
    }

// Fim da Function cadastraCargos

    function alterarcargo() {
        if ($this->session->userdata('logged_in')) { // VALIDA USUARIO LOGADO                                                                                     
            $dados['opcaoView'] = 'Datatables';
            $dados ['telaativa'] = 'Usuarios';
            $dados['opcaoMenu'] = 'Cargos';
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
                $dados ['msg'] = 'Ocorreu um erro ao cadastrar a descrição do Cargo..  Tente novamente';
                $dados['erro'] = 1;
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                $dados ['resultadoCargos'] = $resultadoCargos;
                $dados ['tela'] = 'usuarios/view_listacargos';
                redirect('listacargos');
            } else {
                $dadoscargos ['id'] = $this->input->post('id');
                $dadoscargos ['descricao'] = $this->input->post('descricao');
                $dadoscargos ['status'] = 1;

                $this->load->model('model_cargos');
                $resultadoalterarcargos = $this->model_cargos->altualizar($dadoscargos);
                unset($dadoscargos);

                $dados['erro'] = 0;
                $dados ['msg'] = 'A descrição do Cargo alterado com Sucesso..';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                $dados ['tela'] = 'usuarios/view_listacargos';
                redirect('listacargos');
            }   //  Fim da validação do Form
        } else {   //  Else do if que testa se o Usuario esta logado
            redirect('logout');
        }  //  Fim do if que testa se o Usuario esta logado
    }

//  Fim da funcao alterarcargos

    function excluircargo() {
        if ($this->session->userdata('logged_in')) {
            $dados['opcaoView'] = 'Datatables';
            $dados ['telaativa'] = 'Usuarios';
            $dados['$opcaoMenu'] = 'Cargos';
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('model_cargos');

            $dadoscargos ['id'] = $this->input->post('id');
            $dadoscargos ['descricao'] = $this->input->post('descricao');
            $dadoscargos ['status'] = 1;

            if ($resultadoexcluircargos = $this->model_cargos->deletar($dadoscargos)) {
                unset($dadoscargos);
                $dados['erro'] = 0;
                $dados ['msg'] = 'A descrição do Cargo foi deletado com Sucesso..';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                $dados ['tela'] = 'usuarios/view_listacargos';
                redirect('listacargos');
            } else {
                unset($dadoscargos);
                $dados['erro'] = 1;
                $dados ['msg'] = 'A descrição do Cargo  não foi deletado. Ocorreu um problema  no comando delete..';
                $dados ['tela'] = 'usuarios/view_listacargos';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                redirect('listacargos');
            }
        } else {   //  Else do if que testa se o Usuario esta logado
            redirect('logout');
        }  //  Fim do if que testa se o Usuario esta logado
    }

    function bloquear() {
        if ($this->session->userdata('logged_in')) {
            $dados['opcaoView'] = 'Datatables';
            $dados ['telaativa'] = 'Usuarios';
            $dados['$opcaoMenu'] = 'Cargos';

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('model_cargos');

            $dadoscargos ['id'] = $this->input->post('id');
            $dadoscargos ['descricao'] = $this->input->post('descricao');
            $dadoscargos ['status'] = 1;

            if ($this->model_cargos->bloquear($dadoscargos)) {
                unset($dadoscargos);
                $resultadoCargos = $this->model_cargos->buscar();
                $dados ['resultadoCargos'] = $resultadoCargos;
                unset($resultadoCargos);

                $dados['erro'] = 0;
                $dados ['msg'] = 'A descrição do Cargo bloqueado com Sucesso..';
                $dados ['tela'] = 'usuarios/view_listacargos';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                redirect('listacargos');
            } else {
                unset($dadoscargos);
                $resultadoCargos = $this->model_cargos->buscar();
                $dados ['resultadoCargos'] = $resultadoCargos;
                unset($resultadoCargos);

                $dados['erro'] = 1;
                $dados ['msg'] = 'A descrição do Cargo não foi bloqueado. Avise ao Administrador do seu Portal..';
                $dados ['tela'] = 'usuarios/view_listacargos';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                redirect('listacargos');
            }
        } else {   //  Else do if que testa se o Usuario esta logado            
            //$dados ['tela'] = 'usuarios/view_listacargos';
            redirect('logout');
        }  //  Fim do if que testa se o Usuario esta logado
    }

    function desbloquear() {
        if ($this->session->userdata('logged_in')) {
            $dados['opcaoView'] = 'Datatables';
            $dados ['telaativa'] = 'Usuarios';
            $dados['$opcaoMenu'] = 'Cargos';
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('model_cargos');

            $dadoscargos ['id'] = $this->input->post('id');
            $dadoscargos ['descricao'] = $this->input->post('descricao');
            $dadoscargos ['status'] = 1;

            if ($this->model_cargos->desbloquear($dadoscargos)) {
                unset($dadoscargos);
                $resultadoCargos = $this->model_cargos->buscar();
                $dados ['resultadoCargos'] = $resultadoCargos;
                unset($resultadoCargos);

                $dados['erro'] = 0;
                $dados ['msg'] = 'A descrição do Cargo desbloqueado com Sucesso..';
                $dados ['tela'] = 'usuarios/view_listacargos';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                redirect('listacargos');
            } else {
                unset($dadoscargos);
                $resultadoCargos = $this->model_cargos->buscar();
                $dados ['resultadoCargos'] = $resultadoCargos;
                unset($resultadoCargos);

                $dados['erro'] = 1;
                $dados ['msg'] = 'A descrição do Cargo não foi desbloqueado. Avise ao Administrador do seu Portal..';
                $dados ['tela'] = 'usuarios/view_listacargos';
                $_SESSION['msg'] = $dados ['msg'];
                $_SESSION['erro'] = $dados ['erro'];
                redirect('listacargos');
            }
        } else {   //  Else do if que testa se o Usuario esta logado
            redirect('logout');
        }  //  Fim do if que testa se o Usuario esta logado
    }

}
