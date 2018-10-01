<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dadosLogin = $this->session->userdata('logged_in');
$empresaLogin = $this->session->userdata('empresa_login');
$foto = 'assets/img/fotos/' . $dadosLogin['fotoUsuario'];
// $logoEmpresa = 'assets/img/fotos/' . $empresaLogin['logo'];
// var_dump($empresaLogin);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1><b>Módulo Apoio</b>  <small> - Mural de Recados</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user-circle-o"></i> Home</a></li>
            <li>Apoio</li>
            <li>Mural</li>
            <li class="active">Incluir Recado</li>
        </ol>
        <hr class="hr-solid-top-black">
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12 ">                

                <div class="col-xs-2 col-sm-2 col-lg-2 ">

                </div> <!--  Fim  col  2   -->

                <div class="col-xs-8 col-sm-8 col-lg-8 " style="border: 1px solid #000; background-color: #dedede">    
                    <div class="bg-blue-active" >
                        <h3 class="text-center" style="padding: 1em 1em; margin-top: 3px"><b><<<<  Cadastrar Recado no Mural  >>>></b></h3>
                    </div>
                    <br />    
                    <form method="post">                                            

                        <div id="destinatario-group"  class="form-group">
                            <div class="input-group">      
                                <label for="destinatario">Destinatario</label>
                                <a href="#" >        
                                    <i class="fa fa-info-circle mypopover " data-toggle="popover" data-placement="right" title="Destinatario da Mensagem" 
                                       data-content="Neste combo-Box voce podera selecionar o Usuario que recebera a mensagem do seu recado.." ></i>
                                </a>    

                                <select class="form-control" name="destinatario"  id="destinatario-incluir" aria-describedby="msgDestinatario">
                                    <option value="-1">Selecione...</option>
                                    <?php
                                    if (( isset($listaUsuarios) ) && (!empty($listaUsuarios) )) {
                                        foreach ($listaUsuarios as $usuario) {
                                            ?>
                                            <option value="<?= $usuario->id ?>"><?= $usuario->nome ?></option>   
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>                                                    
                                <span id="msgDestinatario" class="help-block"></span>
                            </div>  <!--  Fim  Input group   -->
                        </div>    <!-- Fim  Form group   -->

                        <div id="prioridade-group" class="form-group">
                            <div class="input-group">      
                                <label for="prioridade">Prioridade</label>
                                <a href="#" >        
                                    <i class="fa fa-info-circle mypopover " data-toggle="popover" data-placement="right" title="Nivel de Prioridade" 
                                       data-content="O Nivel da prioridade ira definir o grau de importancia e urgencia da sua mensagem.." ></i>
                                </a>    
                                <select class="form-control" name="prioridade"  id="prioridade-incluir" >
                                    <option value="0">Sem Prioridade</option>
                                    <option value="1">Normal</option>   
                                    <option value="2">Importante</option>
                                    <option value="3">Urgente</option>
                                </select>                                                    
                                <span id="msgPrioridade" class="help-block"></span>
                            </div>  <!--  Fim  Input group   -->
                        </div>    <!-- Fim  Form group   -->

                        <div id="recado-group" class="form-group">
                            <div class="input-group">      
                                <label for="recado">Mensagem</label>      
                                <a href="#" >        
                                    <i class="fa fa-info-circle mypopover " data-toggle="popover" data-placement="right" title="Mensagem do Recado" 
                                       data-content="Digite a sua mensagem de forma clara e enjuta" ></i>
                                </a>    
                                <textarea  class="form-control"  name="recado" rows="4"  cols="80" required  id="recado-incluir"
                                           placeholder="Digite o recado ... "  > </textarea>                            
                                <span id="msgRecado" class="help-block"></span>
                            </div>  <!--  Fim  Input group   -->
                        </div>    <!-- Fim  Form group   -->

                        <div class="form-group">
                            <div class="inline">
                                <button type="button" id='cancelar-inclusao' class="btn btn-danger btn-block btn-flat btn-sm"
                                        data-url='<?= base_url() ?>mural/exibir'>
                                    <span class="fa fa-close img-circle text-primary btn-icon"></span>
                                    Cancelar
                                </button>                                                

                                <button type="button" id='confirmar-inclusao' class="btn btn-success btn-block btn-flat btn-sm"
                                        data-url='<?= base_url() ?>mural/exibir'>
                                    <span class="fa fa-check img-circle text-primary btn-icon"></span>
                                    Confirmar
                                </button>                                                                                
                            </div>
                        </div>    <!-- Fim  Form group   -->                                
                    </form>
                </div> <!--  Fim  col  8   -->

                <div class="col-xs-2 col-sm-2 col-lg-2 ">


                </div>  <!--  Fim  col  2   -->

            </div>   <!--  Fim  col  12   -->
        </div>  <!--  Fim Row  Geral  -->
    </section>

</div>   <!--  Fim  content-wrapper  -->                         


