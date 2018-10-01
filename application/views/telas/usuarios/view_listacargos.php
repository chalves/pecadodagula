<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dadosLogin = $this->session->userdata('logged_in');
$foto = 'assets/img/fotos/' . $dadosLogin['fotoUsuario'];
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Módulo Usu&aacute;rio</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user-circle-o"></i> Home</a></li>
            <li>Usu&aacute;rios</li>
            <li class="active">Lista de Perfi de Acesso</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="box box-warning with-border">                    
                    <?php if (isset($_SESSION['msg'])) { ?>                    
                        <?php if ($_SESSION['erro']) { ?>
                            <div class="alert alert-danger" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>                                        
                                <strong><?php echo $_SESSION['msg']; ?></strong>
                            </div>                    
                        <?php } else { ?>
                            <div class="alert alert-success" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>                                        
                                <strong><?php echo $_SESSION['msg']; ?></strong>
                            </div>                            
                        <?php } ?>
                        <?php
                        unset($_SESSION['msg']);
                        unset($_SESSION['erro']);
                    }
                    ?>

                    <div class="box-header with-border bg-navy">

                        <h3 class="box-title text-bold">Relação dos Perfis de Acesso Cadastrados</h3>                                                

                    </div>  <!-- Final box header -->

                    <div class="box">                        
                        <div class="box-body">                                        

                            <div class="pull-right">                                           
                                <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-incluir-cargo">
                                    Incluir
                                </button>
                                <br><br>                       
                            </div>

                            <table id="tablecargo" class="table table-striped table-bordered" style="width:100%">

                                <thead class="bg-blue-active">
                                    <tr class="text-center text-bold" style="color: white">                                                            
                                        <th style="width:80px">Código</th>
                                        <th style="width:100px">Status</th>
                                        <th>Descrição</th>                                                                                                                                                                                 
                                        <th style="width:100px">Ações</th>                                              
                                    </tr>
                                </thead>

                                <tbody class="bg-gray">
                                    <?php
                                    if (isset($resultadoCargos )) {
                                        foreach ($resultadoCargos as $cargos  ) {
                                            ?>
                                            <tr>                                                                        
                                                <td class="text-center" style="width:80px"><?php echo $cargos->id; ?></td>                                                                                                                                                
                                                <td class="text-center"  style="width:100px">                                                                            
                                                    <?php
                                                    if ($cargos->status == '1') {
                                                        echo '<span class="label label-default label-success">Ativo</span>';
                                                    } else {
                                                        echo '<span class="label label-default label-danger">Bloqueado</span>';
                                                    }
                                                    ?>                                                                                                                                                                                                                                                                                                                            
                                                </td>

                                                <td><?php echo $cargos->descricao; ?></td>                                                                        

                                                <td style="width:100px">                                                                                                                                                                           
                                                    <a href="#modal-alterar-cargo" title="Alterar a descrição do Cargo" data-toggle="modal"  id="alterarCargo"  
                                                       data-whatever-id="<?php echo $cargos->id; ?>"  
                                                       data-whatever-descricao="<?php echo $cargos->descricao; ?>"
                                                       >  <i class="fa fa-pencil-square-o"></i>
                                                    </a>                                                                                                       
                                                    <?php
                                                    echo '          ';
                                                    if ($cargos->status == '1') {
                                                        ?>
                                                        <a href="#modal-excluir-cargo"  title="Deletar a descrição do Cargo" data-toggle="modal" id="excluirCargo"   
                                                           data-whatever-id="<?php echo $cargos->id; ?>" 
                                                           data-whatever-descricao="<?php echo $cargos->descricao; ?>"
                                                           data-whatever-descricao2="<?php echo $cargos->descricao; ?>"
                                                           >  <i class="fa fa-trash-o"></i>
                                                        </a>
                                                        <?php
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>                                                                                                                                                                                                                                                
                                                    <?php
                                                    echo '          ';
                                                    if ($cargos->status == '1') {
                                                        ?>
                                                        <a href="#modal-bloquear-cargo"  title="Bloquear a descrição do Cargo" data-toggle="modal" id="bloquearCargo"   
                                                           data-whatever-id="<?php echo $cargos->id; ?>" 
                                                           data-whatever-descricao="<?php echo $cargos->descricao; ?>"                                                       
                                                           >  <i class="fa fa-lock"></i>
                                                        </a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a href="#modal-desbloquear-cargo"  title="Desbloquear a descrição do Cargo" data-toggle="modal" id="desbloquearCargo"   
                                                           data-whatever-id="<?php echo $cargos->id; ?>" 
                                                           data-whatever-descricao="<?php echo $cargos->descricao; ?>"                                                           
                                                           >  <i class="fa fa-unlock"></i>
                                                        </a>
                                                        <?php
                                                    }
                                                    ?>                                                                                                                                                                                                                                                
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>

                                <tfoot class="bg-blue-active">
                                    <tr class="text-center text-bold" style="color: white">                                                            
                                        <th style="width:80px">Código</th>
                                        <th style="width:100px">Status</th>
                                        <th>Descrição</th>                                                                                                                                                                                 
                                        <th style="width:100px">Ações</th>                                                                                                                                                                                 
                                    </tr>
                                </tfoot>    

                            </table>                                                            
                        </div>                                    
                    </div>

                    <div>
                        <p >                                         
                            <i class="fa fa-pencil-square-o"></i> <span class="label label-default label-info margin-r-5">   Alterar  </span>
                            <i class="fa fa-trash-o"></i> <span class="label label-default label-warning margin-r-5">   Excluir </span>
                            <i class="fa fa-unlock"></i> <span class="label label-default label-primary margin-r-5"> Desbloquear  </span>
                            <i class="fa fa-lock"></i> <span class="label label-default label-danger margin-r-5"> Bloquear  </span>
                        </p>
                    </div>  

                </div>
            </div>
        </div>
    </section>
</div>

<!--  Modal - Incluir Cargo   -->
<div class="modal modal-primary fade" id="modal-incluir-cargo" tabindex="-1" role="dialog" aria-labelledby="ModalIncluirCargo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                              
            <div class="modal-header">                
                <h4 class="modal-title">::  Inclusão da descrição do Cargo  ::</h4>
            </div>                              
            <div class="modal-body">                          

                <?php echo form_open('cadastracargo'); ?>

                <div class="box-body">                  

                    <div class="form-group">
                        <div><?php echo form_error('descricao'); ?></div>                                                                                   
                        <label for="email" class="col-sm-2 control-label">Descrição</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="descricao"
                                   name="descricao" placeholder="Informe a descriçao do Cargo" value="<?php echo set_value('descricao'); ?>">
                        </div>
                    </div>    <!--  Fim form group  -->

                </div>   <!--  Fim box body  -->
            </div>       <!--  Fim modal body  -->       

            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                    <i class="fa fa-close img-circle"></i>
                    Cancelar
                </button>

                <button type="submit" class="btn  btn-success">
                    <i class="fa fa-check img-circle"></i>
                    Confirmar
                </button>
            </div>    <!--  Fim modal footer  -->       

            <?php echo form_close(); ?>  

        </div>  <!-- /.modal-content -->
    </div>      <!-- /.modal-dialog -->
</div>    <!-- /.modal -->

<!--  Modal - Excluir Cargo   -->
<div class="modal modal-primary fade" id="modal-excluir-carho" tabindex="-1" role="dialog" aria-labelledby="ModalExcluirCargo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                              
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h2>::  Exclusão da descrição do Cargo  ::</h2>
                <h4 class="modal-title">Código: </h4>
            </div>                              

            <div class="modal-body">                          
                <?php echo form_open('excluircargo'); ?>                          

                <div class="box-body">
                    <div><?php echo form_error('descricao'); ?></div>            
                    <div class="form-group">
                        <label for="name-descricao" class="col-sm-2 control-label">Descrição</label>                      
                        <input type="text" class="form-control"   disabled  id="name-descricao" name="descricao"
                               placeholder="Informe a descrição do Cargo" value="<?php echo set_value('descricao'); ?>">                      
                    </div>           
                </div>             
                <div class="box-body">                                       
                    <div class="form-group">                                                                                            
                        <input type="hidden"  id="name-id-hidden"   name="id" value="<?php echo set_value('id'); ?>">                                                                 
                    </div>           
                </div>             
            </div>             

            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                    <i class="fa fa-close img-circle"></i>
                    Cancelar
                </button>

                <button type="submit" class="btn  btn-success">
                    <i class="fa fa-check img-circle"></i>
                    Confirmar
                </button>
            </div>                         
            <?php echo form_close(); ?>  
        </div>  <!-- /.modal-content -->
    </div>      <!-- /.modal-dialog -->
</div>    <!-- /.modal -->


<!--  Modal - Alterar Cargo   -->
<div class="modal modal-primary fade" id="modal-alterar-cargo" tabindex="-1" role="dialog" aria-labelledby="ModalAlterarCargo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                              
            <div class="modal-header">                             
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>                            
                    <h2>::  Alteração da descrição do Cargo  ::</h2>
                    <h4 class="modal-title">Código: </h4>                              
                </div>  
            </div>                              
            <div class="modal-body">                          
                <?php echo form_open('alterarcargo'); ?>                          
                <div class="box-body">

                    <div class="form-group">
                        <div><?php echo form_error('descricao'); ?></div>                                                       
                        <label for="name-descricao" class="col-sm-2 control-label">Descrição</label>                      
                        <input type="text" class="form-control" id="name-descricao" name="descricao"
                               placeholder="Informe da descrição do Cargol" value="<?php echo set_value('descricao'); ?>">                                                                                                         
                    </div>                                                      
                    <div class="form-group">                                                                                                                                                                                      
                        <input type="hidden" class="form-control" id="name-id-hidden" name="id"
                               value="<?php echo set_value('id'); ?>">                                                      
                    </div>                                                      
                    <div class="form-group">
                        <button type="reset" class="btn btn-warning pull-left" >
                            <i class="fa fa-close img-circle"></i>Limpar
                        </button>                                              
                    </div>
                </div>             
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                        <i class="fa fa-close img-circle"></i>
                        Cancelar
                    </button>
                    <button type="submit" class="btn  btn-success" >
                        <i class="fa fa-check img-circle"></i>
                        Confirmar
                    </button>
                </div>                         
                <?php echo form_close(); ?>                                                            
            </div>    
        </div>  <!-- /.modal-content -->
    </div>      <!-- /.modal-dialog -->
</div>    <!-- /.modal -->

<!--  Modal - Bloquear Cargo  -->
<div class="modal modal-primary fade" id="modal-bloquear-cargo" tabindex="-1" role="dialog" aria-labelledby="ModalBloquearCargo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                              
            <div class="modal-header">                             
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>                            
                    <h2>::  Bloquear da descrição do Cargo  ::</h2>
                    <h4 class="modal-title">Código: </h4>                              
                </div>  
            </div>                              
            <div class="modal-body">                          
                <?php echo form_open('bloquearcargos'); ?>                          
                <div class="box-body">

                    <div class="form-group">
                        <div><?php echo form_error('descricao'); ?></div>                                                       
                        <label for="name-descricao" class="col-sm-2 control-label">Descrição</label>                      
                        <input type="text" class="form-control" id="name-descricao" name="descricao" disabled
                               placeholder="Informe da descrição do Cargo" value="<?php echo set_value('descricao'); ?>">                                                                                                         
                    </div>                                                      
                    <div class="form-group">                                                                                                                                                                                      
                        <input type="hidden" class="form-control" id="name-id-hidden" name="id"
                               value="<?php echo set_value('id'); ?>">                                                      
                    </div>                                                                        
                </div>             
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                        <i class="fa fa-close img-circle"></i>
                        Cancelar
                    </button>
                    <button type="submit" class="btn  btn-success" >
                        <i class="fa fa-check img-circle"></i>
                        Confirmar
                    </button>
                </div>                         
                <?php echo form_close(); ?>                                                            
            </div>    
        </div>  <!-- /.modal-content -->
    </div>      <!-- /.modal-dialog -->
</div>    <!-- /.modal -->

<!--  Modal - Desbloquear Cargo  -->
<div class="modal modal-primary fade" id="modal-desbloquear-cargo" tabindex="-1" role="dialog" aria-labelledby="ModalDesloquearCargo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                              
            <div class="modal-header">                             
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>                            
                    <h2>::  Desbloquear da descrição do Cargo  ::</h2>
                    <h4 class="modal-title">Código: </h4>                              
                </div>  
            </div>                              
            <div class="modal-body">                          
                <?php echo form_open('desbloquearcargos'); ?>                          
                <div class="box-body">

                    <div class="form-group">
                        <div><?php echo form_error('descricao'); ?></div>                                                       
                        <label for="name-descricao" class="col-sm-2 control-label">Descrição</label>                      
                        <input type="text" class="form-control" id="name-descricao" name="descricao" disabled
                               placeholder="Informe a descrição do Cargo" value="<?php echo set_value('descricao'); ?>">                                                                                                         
                    </div>                                                      
                    <div class="form-group">                                                                                                                                                                                      
                        <input type="hidden" class="form-control" id="name-id-hidden" name="id"
                               value="<?php echo set_value('id'); ?>">                                                      
                    </div>                                                                        
                </div>             
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                        <i class="fa fa-close img-circle"></i>
                        Cancelar
                    </button>
                    <button type="submit" class="btn  btn-success" >
                        <i class="fa fa-check img-circle"></i>
                        Confirmar
                    </button>
                </div>                         
                <?php echo form_close(); ?>                                                            
            </div>    
        </div>  <!-- /.modal-content -->
    </div>      <!-- /.modal-dialog -->
</div>    <!-- /.modal -->
