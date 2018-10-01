<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentica extends CI_Controller {
    
    var $empresaImplantada;

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
                'field' => 'empresa',
                'label' => 'ID ou o Código da Empresa',
                'rules' => 'trim|required|callback_validarempresa',
                'errors' => array(
                    'required' => 'Campo %s é obrigatório.',
                    'validarempresa' => 'O %s não cadastrado.'
                ),
            ),
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

        $_SERVER['senhausuario'] = '';

        if ($this->form_validation->run() == FALSE) {
            //FALHA DE VALIDAÇÃO.  Redirecionando para pagina de login            
            // redirect('login');
            $this->load->view('view_login');
        } else {
            unset($_SERVER['senhainformada']);
            unset($_SERVER['senhausuario']);
            
            $empresaLogin = $this->session->userdata('empresa_login');
            
            if(  $empresaLogin['implantada'] == '1'  ){
                redirect('home/dashboard', 'refresh');
            } else {
                redirect('usuario/listar', 'refresh');
            }
            
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
                    'idEmpresa' => $usuario->idEmpresa,
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
                    'logado' => '1',
                    'dateLogin' => $usuario->dateLogin,
                    'ultimoLogin' => $usuario->ultimoLogin,
                    'dateLogout' => $usuario->dateLogout,
                    'nomeUsuario' => $usuario->nome,
                    'celularUsuario' => $usuario->celular,
                    'dateBloqueio' => $usuario->dateBloqueio,
                    'superAdmin' => $usuario->superAdmin,
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

    public function validarsenha() {
        $senhausuario = $_SERVER['senhausuario'];
        $senha = $_SERVER['senhainformada'];

        if ($senha == $senhausuario) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function validarstatus() {
        $senhausuario = $_SERVER['senhausuario'];
        $senha = $_SERVER['senhainformada'];

        if ($senha == $senhausuario) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function validarempresa() {
        $idEmpresa = $this->input->post('empresa');

        if ($idEmpresa == '') {  //  Para evitar que qdo não se informa o Login ele emita mensagem de erro errada
            return true;
        }

        $this->load->model('model_empresa');
        $result = $this->model_empresa->consultarEmpresa($idEmpresa);

        if ((isset($result)) && (!empty($result))) {
            foreach ($result as $Empresa) {
                $config_array_empresa = array(
                    'codigo' => $Empresa->codigo,
                    'id' => $Empresa->id,
                    'nomeFantasia' => $Empresa->nomeFantasia,
                    'razaoSocial' => $Empresa->razaoSocial,
                    'cgc' => $Empresa->cgc,
                    'status' => $Empresa->status,
                    'implantada' => $Empresa->implantada,
                    'endereco' => $Empresa->endereco,
                    'contato' => $Empresa->contato,
                    'telContato' => $Empresa->telContato,
                    'celContato' => $Empresa->celContato,
                    'emailEmpresa' => $Empresa->email,
                    'site' => $Empresa->site,
                    'taxaServico' => $Empresa->taxaServico,
                    'cobraFrete' => $Empresa->cobraFrete,
                    'totalTicket' => $Empresa->totalTicket,
                    'ticketMedio' => $Empresa->ticketMedio,
                    'qtdeTicket' => $Empresa->qtdeTicket,
                    'aberto' => $Empresa->aberto,
                    'abre' => $Empresa->abre,
                    'fecha' => $Empresa->fecha,
                    'cep' => $Empresa->cep,
                    'uf' => $Empresa->uf,
                    'tipo' => $Empresa->tipo
                );
            }
            $this->session->set_userdata('empresa_login', $config_array_empresa);
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
