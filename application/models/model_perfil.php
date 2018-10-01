<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Modelo model_usuario - Efetua a busca dos dados no banco
 *
 * @author Wagner
 */
class Model_perfil extends CI_Model {

    function buscar() {
        $this->db->select('*');
        $this->db->from('perfil');
        // $this->db->where ( 'status', '1' );
        $query = $this->db->get();
        return $query->result();
    }

    function consultar($dados = NULL) {
        if ($dados !== NULL) {
            extract($dados);

            $this->db->select('*');
            $this->db->from('perfil');
            $this->db->where('id', $dados ['id']);
            $query = $this->db->get();
            return true;
        } else {
            return false;
        }
    }

    function cadastrar($dados = NULL) {
        if ($dados !== NULL) {
            extract($dados);
            $this->db->insert('perfil', array(
                'descricao' => $dados ['descricao'],
                'status' => $dados ['status']
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
               if ( $this->db->delete('perfil') ) {
                   return true;
               }  else {
                   return false;
               }                          
        } else {
              return false;
        }
    }    
        
    function bloquear($dados = NULL) {
        if ($dados !== NULL) {
            extract($dados);
            $this->db->where('id', $dados['id']);
            if ($this->db->update('perfil', array(
                        'status' => 0,
                        'dateAlteracao' => date('Y-m-d H:i:s')
                    ))
            ) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function desbloquear($dados = NULL) {
        if ($dados !== NULL) {
            extract($dados);
            $this->db->where('id', $dados['id']);
            if ($this->db->update('perfil', array(
                        'status' => 1,
                        'dateAlteracao' => date('Y-m-d H:i:s')
                    ))
            ) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
