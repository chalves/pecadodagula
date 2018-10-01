<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suspender extends CI_Controller {

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
                'field' => 'login',
                'label' => 'Email ou Código do Usuário',
                'rules' => 'trim|required|min_length[3]|callback_validarlogin',
                'errors' => array(
                    'required' => 'Campo %s é obrigatório.',
                    'min_length' => 'Campo %s tem menos que 3 caracteres.',
                    'validarlogin' => '%s não cadastrado na base de Usuários'
                ),
            ),
            array(
                'field' => 'senha',
                'label' => 'Senha de Autenticação',
                'rules' => 'trim|required|min_length[3]|max_length[6]|callback_validarsenha',
                'errors' => array(
                    'required' => 'Campo %s é obrigatório.',
                    'min_length' => 'Campo %s tem menos que 3 caracteres.',
                    'max_length' => 'Campo %s tem mais que 6 caracteres.',
                    'validarsenha' => 'A %s do Usuário é inválida'
                ),
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            //FALHA DE VALIDAÇÃO.  Redirecionando para pagina de login            
            // redirect('login');
            $this->load->view('view_login');
        } else {
            unset($_SERVER['senhainformada']);
            unset($_SERVER['senhausuario']);
            redirect('home/dashboard', 'refresh');
        }
    }

    public function validarlogin() {
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');
        $_SERVER['senhainformada'] = $senha;

        if ($login == '') {  //  Para evitar que qdo não se informa o Login ele emita mensagem de erro errada
            return true;
        }

        $this->load->model('model_usuarios');
        $result = $this->model_usuarios->autenticar($login);

        if ((isset($result)) && (!empty($result))) {
            foreach ($result as $usuario) {
                $config_array = array(
                    'idUsuario' => $usuario->id,
                    'senhaUsuario' => $usuario->senha,
                    'nomeUsuario' => $usuario->nome,
                    'loginUsuario' => $usuario->login,
                    'emailUsuario' => $usuario->email,
                    'dataCadUsuario' => $usuario->datacadastro,
                    'dataAltUsuario' => $usuario->dataalteracao,
                    'perfilUsuario' => $usuario->perfilid,
                    'statusUsuario' => $usuario->status,
                    'fotoUsuario' => $usuario->foto,
                    'cargoUsuario' => $usuario->cargo,
                    'nicknameUsuario' => $usuario->nickname,
                    'logado' => $usuario->logado,
                    'dateLogin' => $usuario->dateLogin,
                    'ultimoLogin' => $usuario->ultimoLogin,
                    'dateLogout' => $usuario->dateLogout,
                    'nomeUsuario' => $usuario->nome,
                    'celularUsuario' => $usuario->celular,
                    'dateBloqueio' => $usuario->dateBloqueio,
                    'dateDesbloqueio' => $usuario->dateDesbloqueio
                );
                $_SERVER['senhausuario'] = $usuario->senha;
                $config_array['totalUsuarios'] = $this->db->count_all('usuarios');
            }
            $this->load->model('model_usuarios');
            $result = $this->model_usuarios->login($config_array);
            $this->session->set_userdata('logged_in', $config_array);
            return TRUE;
        } else {
            $_SERVER['senhausuario'] = '';
            return FALSE;
        }
    }

}
