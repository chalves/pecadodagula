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
//var_dump( $empresaLogin);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1><b>Módulo Apoio</b>  <small> - Mural de Recados</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user-circle-o"></i> Home</a></li>
            <li>Apoio</li>
            <li>Mural</li>
            <li class="active">Exibir</li>
        </ol>
        <hr class="hr-solid-top-black">
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12 ">
                <div style="padding-top: 5px;"></div>   
                <div class="pull-right">                                           
                    <a class="btn btn-danger btn-flat"  href="<?= base_url()?>mural/incluir">
                        <i class = "fa fa-1x fa-plus-square"></i>  Incluir Recado
                    </a>
                    <br><br>                       
                </div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active" >
                        <a href="#recebidos" id="aba1" aria-controls="recebidos" role="tab" data-toggle="tab"
                           style="border: 1px solid #036; border-radius: 15px 15px 0 0; padding: 7px 10px;"
                           >:: Recebidos ::</a>
                    </li>

                    <li role="presentation" >
                        <a href="#respondidos" id="aba2" aria-controls="respondidos" role="tab" data-toggle="tab"
                           style="border: 1px solid #036; border-radius: 15px 15px 0 0; padding: 7px 10px;"
                           >:: Respondidos ::</a>
                    </li>

                    <li role="presentation" >
                        <a href="#enviados" id="aba3" aria-controls="enviados" role="tab" data-toggle="tab"
                           style="border: 1px solid #036; border-radius: 15px 15px 0 0; padding: 7px 10px;"
                           >:: Enviados ::</a>
                    </li>

                    <li role="presentation" >
                        <a href="#arquivadas" id="aba4" aria-controls="arquivadas" role="tab" data-toggle="tab"
                           style="border: 1px solid #036; border-radius: 15px 15px 0 0; padding: 7px 10px;"
                           >:: Arquivados ::</a>
                    </li>                                       
                </ul>
                <div  >
                    <!-- Tab panes -->
                    <div class="tab-content"  >

                        <div role="tabpanel" class="tab-pane active " id="recebidos">
                            <div style="padding-top: 10px;"></div>   
                            <div >
                                <?php
                                if (isset($_SESSION['msgERR'])) {
                                    ?>
                                    <div class="alert alert-success" role="alert" style="padding-top: 10px;"> 
                                        <?php
                                        echo $_SESSION['msgERR'];
                                        unset($_SESSION['msgERR']);
                                        ?>
                                    </div>                            
                                    <?php
                                }
                                $this->load->view('telas/apoio/mural/view_exibirRecebidos');
                                ?>                        
                            </div>
                        </div>  <!---  Fim  tab-pane - Recebidos  -->

                        <div role="tabpanel" class="tab-pane " id="respondidos">
                            <div style="padding-top: 10px;"></div>   
                            <div >
                                <?php
                                if (isset($_SESSION['msgERR'])) {
                                    ?>
                                    <div class="alert alert-success" role="alert" style="padding-top: 10px;"> 
                                        <?php
                                        echo $_SESSION['msgERR'];
                                        unset($_SESSION['msgERR']);
                                        ?>
                                    </div>                            
                                    <?php
                                }
                                $this->load->view('telas/apoio/mural/view_exibirRespondidos');
                                ?>                        
                            </div>
                        </div>  <!--  Fim  tab-pane - respondidos  -->

                        <div role="tabpanel" class="tab-pane" id="enviados">
                            <div style="padding-top: 10px;"></div>   
                            <div >
                                <?php
                                if (isset($_SESSION['msgERR'])) {
                                    ?>
                                    <div class="alert alert-success" role="alert" style="padding-top: 10px;"> 
                                        <?php
                                        echo $_SESSION['msgERR'];
                                        unset($_SESSION['msgERR']);
                                        ?>
                                    </div>                            
                                    <?php
                                }
                                $this->load->view('telas/apoio/mural/view_exibirEnviados');
                                ?>                        
                            </div>                            
                        </div>  <!---  Fim  tab-pane - Enviados  -->

                        <div role="tabpanel" class="tab-pane  " id="arquivadas">
                            <div style="padding-top: 10px;"></div>   
                            <div >
                                <?php
                                if (isset($_SESSION['msgERR'])) {
                                    ?>
                                    <div class="alert alert-success" role="alert" style="padding-top: 10px;"> 
                                        <?php
                                        echo $_SESSION['msgERR'];
                                        unset($_SESSION['msgERR']);
                                        ?>
                                    </div>                            
                                    <?php
                                }
                                $this->load->view('telas/apoio/mural/view_exibirArquivados');
                                ?>                        
                            </div>
                        </div>   <!--  Fim  tab-pane - arquivadas   -->                     

                    </div>    <!--  Fim  Tab-content    -->
                </div>  <!--  Fim  div style box   -->



                <!--  Modal - Enviar resposta para um recado do Mural  -------------------------------------------------------->
                <div class="modal modal-primary fade" id="modal-enviar-resposta" tabindex="-1" role="dialog" aria-labelledby="ModalEnviarResposta">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">                              
                            <div class="myClearfix pull-right" style="margin-right: 20px; margin-top: 10px">
                                <img class="img-circle myImg-lg " id="img-modal-mural" src="avatar.png" alt="User Avatar"
                                     style="width: 90px; height: 90px">
                            </div>

                            <div class="modal-header">                
                                <h3 class="modal-title">::  Consultar Recado   ::</h3>
                                <h4 class="modal-remetente">Remetente: </h4>
                                <h5 class="modal-codigo">Assunto: </h5>
                            </div>                              
                            <div class="modal-body">                          

                                <form id="formTarget" action="enviarResposta" method="POST">
                                    <?php // echo form_open('autentica'); ?>                    
                                    <div class="box-body">                  
                                        <div class="form-group">                            
                                            <label for="recado" class="col-sm-2 control-label">Recado</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control  bg-gray" name="recado" rows="3" cols="40" disabled  id="recado"                                      
                                                          placeholder="Mensagem do recado "  >Recado: <?php echo set_value('recado'); ?></textarea>                                                        
                                            </div>
                                        </div>    <!--  Fim form group  -->

                                        <div class="form-group">                            
                                            <label for="prioridade" class="col-sm-2 control-label">Nível de Prioridade</label>
                                            <div class="col-sm-12">
                                                <span id="erroPrioridade"  style="background-color: red; color: white"></span>
                                                <select class="form-control" name='prioridade' id="prioridade"   onselect="testaSelect()">
                                                    <option value="-1" selected="">Selecione o Nível de Prioridade</option>
                                                    <option value="0">Sem Prioridade</option>
                                                    <option value="1">Normal</option>   
                                                    <option value="2">Importante</option>
                                                    <option value="3">Urgente</option>
                                                </select>
                                            </div>
                                        </div>    <!--  Fim form group  -->

                                        <div class="form-group">                                                        
                                            <label for="resposta" class="col-sm-2 control-label">Resposta</label>
                                            <div class="col-sm-12">
                                                <span id="erroRecado" style="background-color: red; color: white"></span>
                                                <textarea  class="form-control"  name="resposta" rows="3" cols="40" required  id="resposta"
                                                           placeholder="Digite a sua resposta ... "  >Resposta: <?php echo set_value('resposta'); ?></textarea>                            
                                            </div>
                                        </div>    <!--  Fim form group  -->
                                        <input type="hidden"  name="idDE" id="idDE" value="<?php echo set_value('idDE'); ?>"> 
                                        <input type="hidden"  name="idPara" id="idPara" value="<?php echo set_value('idPara'); ?>"> 
                                        <input type="hidden"  name="id" id="id" value="<?php echo set_value('id'); ?>"> 
                                        <input type="hidden"  name="idEmpresa" id="idEmpresa" value="<?php echo set_value('idEmpresa'); ?>"> 
                                        <input type="hidden"  name="lido" id="lido" value="<?php echo set_value('lido'); ?>"> 
                                        <input type="hidden"  name="criado" id="criado" value="<?php echo set_value('criado'); ?>"> 
                                        <input type="hidden"  name="enviouResposta" id="enviouResposta" value="<?php echo set_value('enviouResposta'); ?>">                                                 
                                        <input type="hidden"  name="dataResposta" id="dataResposta" value="<?php echo set_value('dataResposta'); ?>"> 
                                        <input type="hidden"  name="idOrigem" id="idOrigem" value="<?php echo set_value('idOrigem'); ?>"> 
                                        <input type="hidden"  name="dataOrigem" id="dataOrigem" value="<?php echo set_value('dataOrigem'); ?>"> 
                                        <input type="hidden"  name="textoRecado" id="textoRecado" value="<?php echo set_value('textoRecado'); ?>"> 
                                        <input type="hidden"  name="textoAssunto" id="textoAssunto" value="<?php echo set_value('textoAssunto'); ?>">                         

                                    </div>   <!--  Fim box body  -->

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                            <i class="fa fa-close img-circle"></i>
                                            Cancelar
                                        </button>

                                        <button type="submit" class="btn  btn-success"  id="btn-mural-enviar"  onclick="return SubmitEnviarResposta()">
                                            <i class="fa fa-comment img-circle"></i>
                                            Confirmar 
                                        </button>

                                    </div>    <!--  Fim modal footer  -->       
                                </form>                                        
                                <?php // echo form_close(); ?>
                            </div>       <!--  Fim modal body  -->       


                        </div>  <!-- /.modal-content -->
                    </div>      <!-- /.modal-dialog -->
                </div>    <!-- /.Final modal - Enviar Resposta ---------------------------------------------------------------------->

                <!--  Modal - Exibir recado do Mural  --------------------------------------------------------------------------------->
                <div class="modal modal-primary fade" id="modal-exibir-recado" tabindex="-1" role="dialog" aria-labelledby="ModalExibirRecado">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">                              
                            <div class="myClearfix pull-right" style="margin-right: 20px; margin-top: 10px">
                                <img class="img-circle myImg-lg " id="img-exbir-mural" src="avatar.png" alt="User Avatar"
                                     style="width: 90px; height: 90px">
                            </div>

                            <div class="modal-header">                
                                <h3 class="modal-title">::  Consultar Recado   ::</h3>
                                <h4 class="modal-remetente">Remetente: </h4>
                                <h5 class="modal-codigo">Assunto: </h5>
                            </div>                              

                            <div class="modal-body">                                          

                                <div id='div-abas'>
                                    <ul id='nav-abas'>
                                        <li><a href="#panel-recado">Dados do Recado</a></li>                                                                                        
                                        <li id="aba-resposta"><a href="#panel-resposta">Dados da Resposta</a></li>                                            
                                    </ul>

                                    <div id='panel-recado' class="aba-panel">
                                        <div class="col-md-12 bg-blue-active" style="padding-top: 10px;"> 
                                            <div class="row">
                                                <form>                                                                                            
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select class="form-control" name="status"  id="status-exibir" >
                                                                <option value="0">Selecione...</option>
                                                                <option value="1">Recebido</option>
                                                                <option value="2">Respondido</option>
                                                                <option value="3">Arquivado</option>
                                                                <option value="9">Cancelado</option>
                                                            </select>                                                    
                                                        </div>    <!--  Fim form group  -->
                                                    </div>    <!--  Fim Col form group  -->

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="prioridade">Prioridade</label>
                                                            <select class="form-control" name="prioridade"  id="prioridade-exibir" >
                                                                <option value="0">Sem Prioridade</option>
                                                                <option value="1">Normal</option>   
                                                                <option value="2">Importante</option>
                                                                <option value="3">Urgente</option>
                                                            </select>                                                    
                                                        </div>    <!--  Fim form group  -->
                                                    </div>    <!--  Fim Col form group  -->

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="lido">Situação</label>
                                                            <p class="btn btn-danger btn-block" id="lido-exibir"> ::  xxxxxxx   :: </p>
                                                        </div>    <!--  Fim form group  -->                                              
                                                    </div>    <!--  Fim Col form group  --> 
                                                    
                                            </div>   <!--  Fim Row -->

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="criado">Enviado em</label>
                                                        <input type="text" class="form-control trata-data-exibir" name="criado" id="criado-exibir" placeholder="Data do Envio">
                                                    </div>    <!--  Fim form group  -->                                              
                                                </div>    <!--  Fim Col form group  --> 

                                                <div class="col-md-7">
                                                    <div class="form-group">                                                        
                                                        <label for="recado" class="col-sm-2 control-label">Recado</label>                                                        
                                                        <textarea  class="form-control"  name="recado" rows="4" cols="40" required  id="recado-exibir"
                                                                   placeholder="Digite o recado ... "  > recado</textarea>                            
                                                    </div>    <!--  Fim form group  -->
                                                </div>  <!--   Fim Col  -->                                                     
                                            </div>  <!--   Fim Row  -->                                                     

                                        </div>  <!--   Fim Col 12  -->                                                     
                                    </div>  <!--   Fim Panel Recado  -->               

                                    <div id='panel-resposta' class="aba-panel" >
                                        <div class="col-md-12 bg-danger" style="padding-top: 10px;"> 
                                            <div class="row">
                                                Aqui irei exibir os dados da resposta
                                            </div>    <!--   Fim Row  -->                                                                             
                                        </div>  <!--   Fim Col 12  -->                                                     
                                    </div>  <!--   Fim Panel Resposta  -->                   

                                </div>    <!--   Fim Div Abas  -->               
                            </div>     <!--     Fim modal body         -->

                            <div class="modal-footer" style="padding-top: 10px;">
                                <button type="button" class="btn btn-warning pull-right" data-dismiss="modal">
                                    <i class="fa fa-power-off img-circle"></i>
                                    Retornar
                                </button>                    
                            </div>  <!--    Fim modal footer         -->

                        </div>  <!-- /.modal-content -->
                    </div>      <!-- /.modal-dialog -->
                </div>    <!-- /. Final modal - Exibir Recado ------------------------------------------------------------------->

            </div>   <!--  Fim  col  12   -->
        </div>  <!--  Fim Row  Geral  -->
    </section>

</div>   <!--  Fim  content-wrapper  -->         