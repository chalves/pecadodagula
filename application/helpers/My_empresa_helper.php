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
 * Helper - Tratamento Empresa
 *
 * Contem funcionalidades para tratar e manipular as propriedades da tabela Empresa
 *
 * @package    PecadoGula    
 * @subpackage   Helper
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
if (!function_exists('estaAberto')) {

    function estaAberto($aberto = NULL) {
        //  futuramente passar abre e fecha para definir se esta aberto????????????
        if (!empty($aberto)) {
            if ($aberto == '1') {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

}  // Fim da Funcao estaAberto()


$empresa_login = $this->session->userdata('empresa_login');

$this->db->select('*');
$this->db->from('empresas');
$this->db->where('id', $empresa_login['id']);
$this->db->limit(1);
$query = $this->db->get();

if ($query) {

    $this->session->unset_userdata('empresa_login');
    $this->session->unset_userdata('$empresaStatus');

    foreach ($query->result() as $Empresa):

        $array_empresa = array(
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
    
        $this->session->set_userdata('empresa_login', $array_empresa);

        if ($array_empresa['implantada'] == '1') {            
            $empresaAberta = estaAberto($array_empresa['aberto']);
        }

        $empresaStatus = array(
            'implantada' => $array_empresa['implantada'],
            'aberto' => $empresaAberta
        );

        $this->session->set_userdata('empresaStatus', $empresaStatus);
        
    endforeach;
}
?>
