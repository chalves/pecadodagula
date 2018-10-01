<?php

/*
 * Relação das Funcionalidades do Mural:
 * buscaMuralUsuario : Recupera todos os recados enviados para um determinado Usuario
 * buscar : Recupera os recados enviados de todos os Usuarios da Empresa
 * responder : Atualiza o recado com a resposta e gera um novo recado para o remetente com a respost
 */
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of model_mural
 *
 * @author VRA Web Hosting
 */
class Model_mural extends CI_Model {

    function _construct() {
        parent::Model();
        
    }

    function buscaMuralUsuario($idLogin) {
        if ($config_array !== NULL) {
            $this->db->select('*');
            $this->db->where('lido', 0);
            $this->db->where('idPara', $idLogin);
            $this->db->where('status', 1);
            $this->db->limit(6);
            $query = $this->db->get();
            return $query->result();
        } else {
            return false;
        }
    }

    function contarNaoLidos() {
        $dadosSession = $this->session->logged_in;
        if ($dadosSession !== NULL) {
            $this->db->select('*');
            $this->db->where('lido', 0);
            $this->db->where('idPara', $dadosSession['idUsuario']);
            $this->db->where('status', 1);
            $this->db->limit(6);
            $resultMural = $this->db->get('mural', 6);
            return $resultMural;
        } else {
            return false;
        }
    }

    function buscar() {
        $this->db->select('*');
        $this->db->from('mural');
        $this->db->where('status', 1);
        // $this->db->where('lido', '0');
        $query = $this->db->get();
        return $query->result();
    }

    // Buscar todos os Recados enviados (Lidos, Não Lidos, Respondidos e Arquivados)
    // Status= 1
    function buscarEnviados() {
        $dadosSession = $this->session->logged_in;
        if ($dadosSession !== NULL) {
            $this->db->select('*');
            $this->db->from('mural');
            $this->db->where('idDE', $dadosSession['idUsuario']);    // Enviados
            // Diferente de  3 - Arquivado / 9 - Cancelado 
            $names = array('3', '9');
            $this->db->where_not_in('status', $names);

            $query = $this->db->get();
            return $query->result();
        } else {
            return false;
        }
    }

    // Buscar os Recados Recebidos (Lidos e Não Lidos)
    // Status= 1
    function buscarRecebidos() {
        $dadosSession = $this->session->logged_in;
        if ($dadosSession !== NULL) {
            $this->db->select('*');
            $this->db->from('mural');
            $this->db->where('idPara', $dadosSession['idUsuario']);    // Recebidos
            $this->db->where('status', 1);      // 1 - Ativo
            $query = $this->db->get();
            return $query->result();
        } else {
            return false;
        }
    }

    // Buscar os Recados foram Respondidos
    // Status= 2
    function buscarRespondidos() {
        $dadosSession = $this->session->logged_in;
        if ($dadosSession !== NULL) {
            $this->db->select('*');
            $this->db->from('mural');
            $this->db->where('idPara', $dadosSession['idUsuario']);  // Recebidos            
            $this->db->where('status', 2);      // 2 - Ativo e Respondido
            $query = $this->db->get();
            return $query->result();
        } else {
            return false;
        }
    }

    // Buscar os Recados foram Respondidos
    // Status= 3
    function buscarArquivados() {
        $dadosSession = $this->session->logged_in;
        if ($dadosSession !== NULL) {
            $this->db->select('*');
            $this->db->from('mural');
            $this->db->where('idDE', $dadosSession['idUsuario']);        //  Enviados
            $this->db->or_where('idPara', $dadosSession['idUsuario']);     //  Recebidos
            $this->db->where('status', 3);      // 3 - Ativo e Arquivado
            $query = $this->db->get();
            return $query->result();
        } else {
            return false;
        }
    }

    function responder($dados) {
        if ($dados !== NULL) {
            extract($dados);
            $this->db->where('id', $dados['id']);

            //  Atualizar o Recado Original
            if ($this->db->update('mural', array(
                        'lido' => 2,
                        'enviouResposta' => $dados ['textoRecado'],
                        'enviouResposta' => $dados ['enviouResposta'],
                        'prioridade' => $dados ['prioridade'],
                        'dataResposta' => date('Y-m-d H:i:s')
                    ))
            ) {
                $de = $dados ['idPara'];
                $para = $dados ['idDE'];
                // THEN - Recado Original atualizado e Gerar um novo recado com a resposta ao Remetente
                if ($this->db->insert('mural', array(
                            'idDE' => $para,
                            'idPara' => $de,
                            'assunto' => $dados ['assunto'],
                            'recado' => $dados ['textoRecado'],
                            'prioridade' => $dados ['prioridade'],
                            'idOrigem' => $dados ['id']
                        ))
                ) {
                    return true;
                } else {
                    //  Deu erro na geração do novo recado com a resposta
                    return false;
                }
            } else {
                // Deu erro na atualização do recado original
                return false;
            }
        } else {
            //  O array $dados veio NULO
            return false;
        }
    }

//  Final da funcao Responder
}

//  Final da Classe Mural
