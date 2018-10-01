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
 * Model - Base e Dados Empresa
 *
 * Contem funcionalidades para tratar e manipular as propriedades da tabela Empresa
 *
 * @package    PecadoGula    
 * @subpackage   Model
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
class Model_empresa extends CI_Model {

    function listar() {
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

    function consultar($empresa) {
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

    function cadastrar($dados = NULL) {
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

    function altualizar($dados = NULL) {
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

    function deletar($dados = NULL) {
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

    
}
