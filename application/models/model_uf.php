<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Modelo model_usuario - Efetua a busca dos dados no banco
 *
 * @author Wagner
 */
class Model_uf extends CI_Model {

    function buscaUF() {
        $this->db->select('*');
        $this->db->from('uf');
        // $this->db->where ( 'status', '1' );
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {            
            return $query->result();
        } else {            
            return false;
        }
    }

    function consultaUF($dados = NULL) {
        if ($dados !== NULL) {
            extract($dados);

            $this->db->select('*');
            $this->db->from('uf');
            $this->db->where('id', $dados ['id']);
            $query = $this->db->get();
            return true;
        } else {
            return false;
        }
    }

    function cadastraUF($dados = NULL) {
        if ($dados !== NULL) {
            extract($dados);
            $this->db->insert('uf', array(
                'descricao' => $dados ['descricao'],                
                    )
            );
            return true;
        } else {
            return false;
        }
    }

    function altualizaUF($dados = NULL) {
        if ($dados !== NULL) {
            extract($dados);
            $this->db->where('id', $dados['id']);
            $this->db->update('uf', array(
                'descricao' => $dados ['descricao'],
                    )
            );
            return true;
        } else {
            return false;
        }
    }

    function deletaUF($dados = NULL) {
        if ($dados !== NULL) {
            extract($dados);
            $this->db->where('id', $dados['id']);
            if ($this->db->delete('uf')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
