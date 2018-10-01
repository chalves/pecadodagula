<?php

//defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$dadosLogin = $this->session->userdata('logged_in');
//$fotoLogin =  'assets/img/fotos/' . $dadosLogin['fotoUsuario'];     

/**
 * Description of model_usuarios
 *
 * @author CEDITH
 */
class model_usuarios extends CI_Model {

    public function autenticar($login) {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('login', $login);
        $this->db->or_where('email', $login);
// $this->db->where('status','1');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function login($config_array) {
        if ($config_array !== NULL) {
            $this->db->where('id', $config_array['idUsuario']);
            $this->db->update('usuarios', array(
                'logado' => 1,
                'dateLogin' => date('Y-m-d H:i:s')
                    )
            );
            return true;
        } else {
            return false;
        }
    }

    public function logout() {
        $dadosSession = $this->session->logged_in;
        if ($dadosSession !== NULL) {
            $this->db->where('id', $dadosSession['idUsuario']);
            $this->db->update('usuarios', array(
                'logado' => 0,
                'dateLogout' => date('Y-m-d H:i:s'),
                'ultimoLogin' => $dadosSession['dateLogin']
                    )
            );
            return true;
        } else {
            return false;
        }
    }

    public function suspender() {
        $dadosSession = $this->session->logged_in;
        if ($dadosSession !== NULL) {
            $this->db->where('id', $dadosSession['idUsuario']);
            $this->db->update('usuarios', array(
                'logado' => 2,
                'dateBloqueio' => date('Y-m-d H:i:s')
                    )
            );
            return true;
        } else {
            return false;
        }
    }

    public function liberar() {
        $dadosSession = $this->session->logged_in;
        if ($dadosSession !== NULL) {
            $this->db->where('id', $dadosSession['idUsuario']);
            $this->db->update('usuarios', array(
                'logado' => 1,
                'dateDesbloqueio' => date('Y-m-d H:i:s'),
                    )
            );
            return true;
        } else {
            return false;
        }
    }

    public function novoLogin() {
        $dadosSession = $this->session->logged_in;
        if ($dadosSession !== NULL) {
            $this->db->where('id', $dadosSession['idUsuario']);
            $this->db->update('usuarios', array(
                'logado' => 0,
                'dateLogout' => date('Y-m-d H:i:s'),
                'ultimoLogin' => $dadosSession['dateLogin']
                    )
            );
            return true;
        } else {
            return false;
        }
    }

    function listar($idEmpresa) {
        $dadosSession = $this->session->logged_in;
        if ($dadosSession !== NULL) {
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('status >', '0');
            $this->db->where('idEmpresa', $idEmpresa);
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

    function validarID( $id ) {
        $dadosSession = $this->session->logged_in;
        if ($dadosSession !== NULL) {
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('status', '1');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if ($query->num_rows() >= 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
