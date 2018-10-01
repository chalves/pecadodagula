<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Modelo model_usuario - Efetua a busca dos dados no banco
 *
 * @author Wagner
 */
class Model_tipoempresa extends CI_Model {

    function buscaTipo() {
        $this->db->select('*');
        $this->db->from('tipoempresa');
        // $this->db->where ( 'status', '1' );
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consultaTipo($dados = NULL) {
        if ($dados !== NULL) {
            extract($dados);

            $this->db->select('*');
            $this->db->from('tipoempresa');
            $this->db->where('id', $dados ['id']);
            $query = $this->db->get();
            if ($query->num_rows() >= 1) {
                return $query->result();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function cadastraUF($dados = NULL) {
        if ($dados !== NULL) {
            extract($dados);
            $this->db->insert('tipoempresa', array(
                'descricao' => $dados ['descricao']                
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
            $this->db->update('tipoempresa', array(
                'descricao' => $dados ['descricao'],
                 'qtdeEmpresa' => $dados ['qtdeEmpresa'],
                'qtdeTicket' => $dados ['qtdeTicket'],
                'valorVendas' => $dados ['valorVendas']
                    )
            );
            return true;
        } else {
            return false;
        }
    }

    function deletaTipo($dados = NULL) {
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
