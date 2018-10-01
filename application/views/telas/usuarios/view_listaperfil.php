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
                                <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-incluir-perfil">
                                    Incluir
                                </button>
                                <br><br>                       
                            </div>

                            <table id="tableperfil" class="table table-striped table-bordered" style="width:100%">

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
                                    if (isset($resultadoPerfil)) {
                                        foreach ($resultadoPerfil as $perfil) {
                                            ?>
                                            <tr>                                                                        
                                                <td class="text-center" style="width:80px"><?php echo $perfil->id; ?></td>                                                                                                                                                
                                                <td class="text-center"  style="width:100px">                                                                            
                                                    <?php
                                                    if ($perfil->status == '1') {
                                                        echo '<span class="label label-default label-success">Ativo</span>';
                                                    } else {
                                                        echo '<span class="label label-default label-danger">Bloqueado</span>';
                                                    }
                                                    ?>                                                                                                                                                                                                                                                                                                                            
                                                </td>

                                                <td><?php echo $perfil->descricao; ?></td>                                                                        

                                                <td style="width:100px">                                                                                                                                                                           
                                                    <a href="#modal-alterar-perfil" title="Alterar o Perfil de Acesso" data-toggle="modal"  id="alterarPerfil"  
                                                       data-whatever-id="<?php echo $perfil->id; ?>"  
                                                       data-whatever-descricao="<?php echo $perfil->descricao; ?>"
                                                       >  <i class="fa fa-pencil-square-o"></i>
                                                    </a>                                                                                                       
                                                    <?php
                                                    echo '          ';
                                                    if ($perfil->status == '1') {
                                                        ?>
                                                        <a href="#modal-excluir-perfil"  title="Deletar o Perfil de Acesso" data-toggle="modal" id="excluirPerfil"   
                                                           data-whatever-id="<?php echo $perfil->id; ?>" 
                                                           data-whatever-descricao="<?php echo $perfil->descricao; ?>"
                                                           data-whatever-descricao2="<?php echo $perfil->descricao; ?>"
                                                           >  <i class="fa fa-trash-o"></i>
                                                        </a>
                                                        <?php
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>                                                                                                                                                                                                                                                
                                                    <?php
                                                    echo '          ';
                                                    if ($perfil->status == '1') {
                                                        ?>
                                                        <a href="#modal-bloquear-perfil"  title="Bloquear o Perfil de Acesso" data-toggle="modal" id="bloquearPerfil"   
                                                           data-whatever-id="<?php echo $perfil->id; ?>" 
                                                           data-whatever-descricao="<?php echo $perfil->descricao; ?>"                                                       
                                                           >  <i class="fa fa-lock"></i>
                                                        </a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a href="#modal-desbloquear-perfil"  title="Desbloquear o Perfil de Acesso" data-toggle="modal" id="desbloquearPerfil"   
                                                           data-whatever-id="<?php echo $perfil->id; ?>" 
                                                           data-whatever-descricao="<?php echo $perfil->descricao; ?>"                                                           
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

<!--  Modal - Incluir Perfil de Acesso  -->
<div class="modal modal-primary fade" id="modal-incluir-perfil" tabindex="-1" role="dialog" aria-labelledby="ModalIncluirPerfil">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                              
            <div class="modal-header">                
                <h4 class="modal-title">::  Inclusão de Perfil de Acesso  ::</h4>
            </div>                              
            <div class="modal-body">                          

                <?php echo form_open('cadastraperfil'); ?>

                <div class="box-body">                  

                    <div class="form-group">
                        <div><?php echo form_error('descricao'); ?></div>                                                                                   
                        <label for="email" class="col-sm-2 control-label">Descrição</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="descricao"
                                   name="descricao" placeholder="Informe a descriçao do Perfil" value="<?php echo set_value('descricao'); ?>">
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

<!--  Modal - Excluir Perfil de Acesso  -->
<div class="modal modal-primary fade" id="modal-excluir-perfil" tabindex="-1" role="dialog" aria-labelledby="ModalExcluirPerfil">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                              
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h2>::  Exclusão do Perfil de Acesso  ::</h2>
                <h4 class="modal-title">Código: </h4>
            </div>                              

            <div class="modal-body">                          
                <?php echo form_open('excluirperfil'); ?>                          

                <div class="box-body">
                    <div><?php echo form_error('descricao'); ?></div>            
                    <div class="form-group">
                        <label for="name-descricao" class="col-sm-2 control-label">Descrição</label>                      
                        <input type="text" class="form-control"   disabled  id="name-descricao" name="descricao"
                               placeholder="Informe a descrição do Perfil" value="<?php echo set_value('descricao'); ?>">                      
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


<!--  Modal - Alterar Perfil de Acesso  -->
<div class="modal modal-primary fade" id="modal-alterar-perfil" tabindex="-1" role="dialog" aria-labelledby="ModalAlterarPerfil">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                              
            <div class="modal-header">                             
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>                            
                    <h2>::  Alteração do Perfil de Acesso  ::</h2>
                    <h4 class="modal-title">Código: </h4>                              
                </div>  
            </div>                              
            <div class="modal-body">                          
                <?php echo form_open('alterarperfil'); ?>                          
                <div class="box-body">

                    <div class="form-group">
                        <div><?php echo form_error('descricao'); ?></div>                                                       
                        <label for="name-descricao" class="col-sm-2 control-label">Descrição</label>                      
                        <input type="text" class="form-control" id="name-descricao" name="descricao"
                               placeholder="Informe a descrição do Perfil" value="<?php echo set_value('descricao'); ?>">                                                                                                         
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

<!--  Modal - Bloquear Perfil de Acesso  -->
<div class="modal modal-primary fade" id="modal-bloquear-perfil" tabindex="-1" role="dialog" aria-labelledby="ModalBloquearPerfil">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                              
            <div class="modal-header">                             
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>                            
                    <h2>::  Bloquear o Perfil de Acesso  ::</h2>
                    <h4 class="modal-title">Código: </h4>                              
                </div>  
            </div>                              
            <div class="modal-body">                          
                <?php echo form_open('bloquearperfil'); ?>                          
                <div class="box-body">

                    <div class="form-group">
                        <div><?php echo form_error('descricao'); ?></div>                                                       
                        <label for="name-descricao" class="col-sm-2 control-label">Descrição</label>                      
                        <input type="text" class="form-control" id="name-descricao" name="descricao" disabled
                               placeholder="Informe a descrição do Perfil" value="<?php echo set_value('descricao'); ?>">                                                                                                         
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

<!--  Modal - Desbloquear Perfil de Acesso  -->
<div class="modal modal-primary fade" id="modal-desbloquear-perfil" tabindex="-1" role="dialog" aria-labelledby="ModalDesloquearPerfil">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                              
            <div class="modal-header">                             
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>                            
                    <h2>::  Desbloquear o Perfil de Acesso  ::</h2>
                    <h4 class="modal-title">Código: </h4>                              
                </div>  
            </div>                              
            <div class="modal-body">                          
                <?php echo form_open('desbloquearperfil'); ?>                          
                <div class="box-body">

                    <div class="form-group">
                        <div><?php echo form_error('descricao'); ?></div>                                                       
                        <label for="name-descricao" class="col-sm-2 control-label">Descrição</label>                      
                        <input type="text" class="form-control" id="name-descricao" name="descricao" disabled
                               placeholder="Informe a descrição do Perfil" value="<?php echo set_value('descricao'); ?>">                                                                                                         
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
