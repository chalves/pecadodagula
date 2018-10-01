<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ($this->session->userdata('logged_in')) {
    $dadosLogin = $this->session->userdata('logged_in');
    $foto =  'assets/img/fotos/' . $dadosLogin['fotoUsuario'];     
}
?>
<link rel="stylesheet" href="<?php echo site_url('assets/css/datatables/dataTables.bootstrap.css') ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/css/datatables/jquery.dataTables.min.css') ?>">

<div class="content-wrapper">
      <section class="content-header">
            <h1>Módulo Usu&aacute;rio</h1>
            <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-user-circle-o"></i> Home</a></li>
                  <li>Usu&aacute;rios</li>
                  <li class="active">Lista de Perfi de Acesso</li>
            </ol>
      </section>   <!-- Fim da section header -->

      <section class="content">
            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-lg-12">

                      <h4>  Modelo de Conteúdo </h4>
                      
                      
                      
                      
                      
                  </div>  <!-- Fim das coluna -->
            </div>     <!-- Fim das row -->
      </section>    <!-- Fim da section conteudo -->
</div>  <!-- Fim da classe wrapper -->

