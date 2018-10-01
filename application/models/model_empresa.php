<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Modelo model_usuario - Efetua a busca dos dados no banco
 *
 * @author Wagner
 */
class Model_empresa extends CI_Model {

    function buscarEmpresas() {
        $this->db->select('*');
        $this->db->from('empresas');
        // $this->db->where ( 'status', '1' );
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->result();
        } else {
            return false;
        }
//        Codigo: UFTPCZxxxxxLJ aonde
//        UF : Unidade da Federação
//        TP : Tipo de estabelecimento comercial
//        CZ : Tipo de cozinha / culinária
//        xxxxx : id do cadastro de Empresa
//        LJ : número sequencial que representa o Id da loja. A Matriz sempre será 00 (zero zero)   
    }

    function consultarEmpresa($empresa) {
        if ($empresa !== NULL) {
            $this->db->select('*');
            $this->db->from('empresas');
            $this->db->where('id', $empresa);
            $this->db->or_where('codigo', $empresa);
            $query = $this->db->get();
            return $query->result();
        } else {
            return false;
        }
    }

    function cadastrarEmpresa($dados = NULL) {
        if ($dados !== NULL) {
            extract($dados);
            $this->db->insert('empresas', array(
                'nomeFantasia' => $dados ['nomeFantasia'],
                'razaoSocial' => $dados ['razaoSocial']
                    )
            );
            return true;
        } else {
            return false;
        }
    }

    function altualizarEmpresa($dados = NULL) {
        if ($dados !== NULL) {
            extract($dados);
            $this->db->where('id', $dados['id']);
            $this->db->update('perfil', array(
                'descricao' => $dados ['descricao'],
                'dateAlteracao' => date('Y-m-d H:i:s')
                    )
            );
            return true;
        } else {
            return false;
        }
    }

    function deletarEmpresa($dados = NULL) {
        if ($dados !== NULL) {
            extract($dados);
            $this->db->where('id', $dados['id']);
            if ($this->db->delete('perfil')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function estaAberto() {
        if ($this->session->userdata('logged_in')) {
            $empresa_login = $this->session->userdata('empresa_login');

            $this->db->select('*');
            $this->db->from('empresas');
            $this->db->where('id', $empresa_login['id']);
            $this->db->limit(1);
            $query = $this->db->get();

            $this->session->unset_userdata('empresa_login');

            foreach ($query->result() as $row) {
                if ($row->aberto == '1') {
                    $empresaLogin['aberto'] = '1';
                    $this->session->set_userdata('empresa_login', $empresaLogin);
                    return true;
                } else {
                    $empresaLogin['aberto'] = '0';
                    $this->session->set_userdata('empresa_login', $empresaLogin);
                    return false;
                }                
            }
        } else {
            return false;
        }
    }

}
