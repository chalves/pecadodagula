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
<link rel="stylesheet" href="<?php echo site_url('assets/css/datatables/dataTables.bootstrap.min.css') ?>">

<div class="content-wrapper">
    <section class="content-header">
        <h1>Módulo Usu&aacute;rio</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user-circle-o"></i> Home</a></li>
            <li>Usu&aacute;rios</li>
            <li class="active">Lista de Usu&aacute;rios</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="box box-warning with-border">
                    <?php if (isset($msg)) { ?>
                        <?php if ($erro) { ?>
                            <div class="alert alert-danger" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>                                        
                                <strong><?php echo $msg; ?></strong>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-success" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>                                        
                                <strong><?php echo $msg; ?></strong>
                            </div>                            
                        <?php } ?>
                    <?php } ?>
                    <div class="box-header with-border bg-navy">
                        <h3 class="box-title text-bold">Relação dos Usuários Cadastrados</h3>
                    </div>   <!-- /.box-header -->

                    <div class="box">
                        <div class="box-body">                                        

                            <div class="pull-right">                                           
                                <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-incluir-usuario">
                                    Incluir
                                </button><br><br>
                            </div>

                            <table id="tableUsuario" class="table table-bordered table-striped" style="width:100%">
                                <thead class="bg-blue-active" >
                                    <tr class="text-center text-bold" style="color: white">                                                                                                                
                                        <th>Nome</th>
                                        <th>Login</th>
                                        <th>Logado</th>
                                        <th>E-mail</th>
                                        <th>Status</th>
                                        <th  style="width:30px">Cadastrado</th>
                                        <th style="width:30px">Ultimo<br> Acesso</th>
                                        <th>Ações</th>                                                             
                                    </tr>
                                </thead>
                                <tbody class="bg-gray">
                                    <?php                                    
                                    if (isset($resultadoUsuarios)) {
                                        foreach ($resultadoUsuarios as $usuarios) {
                                            ?>
                                            <tr>
                                                <td><?php echo $usuarios->nome; ?></td>
                                                <td><?php echo $usuarios->login; ?></td>
                                                <td>                                                                            
                                                    <?php
                                                    if ($usuarios->logado == '1') {
                                                        $LoginUSR = 'Usuário logado em ' . date_format(date_create($usuarios->dateLogin), 'd/m/Y  H:i:s a');
                                                        ?>
                                                        <span class="label label-default label-warning" data-toggle="tooltip" data-placement="left" title="<?php echo $LoginUSR ?>" >Logado</span>'
                                                        <?php
                                                    } elseif ($usuarios->logado == '2') {
                                                        $LoginUSR = 'Usuário suspendeu a sessão em  ' . date_format(date_create($usuarios->dateBloqueio), 'd/m/Y  H:i:s a') . '. Terminal bloqueado..';
                                                        ?>
                                                        <span class="label label-default label-danger" data-toggle="tooltip" data-placement="left" title="<?php echo $LoginUSR ?>">Travado</span>
                                                        <?php
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>                                                                                                                                                                                                                                                                                                                            
                                                </td>
                                                <td><?php echo $usuarios->email; ?></td>
                                                <td>                                                                            
                                                    <?php
                                                    if ($usuarios->status == '1') {
                                                        echo '<span class="label label-default label-success">Ativo</span>';
                                                    } else {
                                                        echo '<span class="label label-default label-danger">Bloqueado</span>';
                                                    }
                                                    ?>                                                                                                                                                                                                                                                                                                                            
                                                </td>
                                                <td  style="width:30px">
                                                    <?php
                                                    $dtCadastro = strTOTime($usuarios->datacadastro);
                                                    echo date('d/m/y h:i:s', $dtCadastro);
                                                    ?>
                                                </td>
                                                <td style="width:30px">
                                                    <?php
                                                    if ($usuarios->ultimoLogin != '') {
                                                        $dtUltLogin = strTOTime($usuarios->ultimoLogin);
                                                        echo date('d/m/y h:i:s', $dtUltLogin);
                                                    }
                                                    ?>
                                                </td>        
                                                <td>
                                                    <a href="consultausuario?id=<?php echo $usuarios->id; ?>" title="Consultar o Usuário"><i class="fa fa-eye margin-r-5"></i></a>
                                                    <?php
                                                    if ($usuarios->status == '1' and $usuarios->logado == '0') {
                                                        echo '<a href="alterarusuario?id=<?php echo $usuarios->id; ?>" title="Alterar o Usuário"><i class="fa fa-pencil-square-o margin-r-5"></i></a>';

                                                        if ($usuarios->status == '1') {
                                                            echo '<a href="excluirausuario?id=<?php echo $usuarios->id; ?>" title="Deletar o Usuário"><i class="fa fa-trash-o margin-r-5"></i></a>';
                                                        } else {
                                                            echo '   ';
                                                        }
                                                    }
                                                    if ($usuarios->status == '0' and $usuarios->logado == '0') {
                                                        echo '<a href="desbloquearusuario?id=<?php echo $usuarios->id; ?>"  title="Bloquear o Usuário"><i class="fa fa-unlock margin-r-5"></i></a>';
                                                    } else {
                                                        if ($usuarios->status == '1' and $usuarios->logado == '0') {
                                                            echo '<a href="bloquearusuario?id=<?php echo $usuarios->id; ?>" title="Desbloquear o Usuário"><i class="fa fa-lock margin-r-5"></i></a>';
                                                        } else {
                                                            echo '   ';
                                                        }
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
                                        <th>Nome</th>
                                        <th>Login</th>
                                        <th>Logado</th>
                                        <th>E-mail</th>
                                        <th>Status</th>
                                        <th  style="width:30px">Cadastrado</th>
                                        <th style="width:30px">Ultimo<br> Acesso</th>
                                        <th>Ações</th>                                                                                                 </tr>
                                </tfoot>    

                            </table>                                        
                        </div>                                    
                    </div>  <!-- Fim class box  -->
                    <div> 
                        <p>
                            <i class="fa fa-eye"></i> <span class="label label-default label-success margin-r-5 ">   Consultar  </span>
                            <i class="fa fa-pencil-square-o"></i> <span class="label label-default label-info margin-r-5">   Alterar  </span>
                            <i class="fa fa-trash-o"></i> <span class="label label-default label-warning margin-r-5">   Excluir </span>
                            <i class="fa fa-unlock"></i> <span class="label label-default label-primary margin-r-5"> Ativar  </span>
                            <i class="fa fa-lock"></i> <span class="label label-default label-danger margin-r-5"> Bloquear  </span>
                        </p>
                    </div>  
                </div>  <!-- Fim box-warning  -->
            </div>
        </div>
    </section>
</div>

<!--  Modal - Incluir Perfil de Acesso  -->
<div class="modal modal-primary fade" id="modal-incluir-usuario" tabindex="-1" role="dialog" aria-labelledby="ModalIncluirUsuario">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                              
            <div class="modal-header">                
                <h4 class="modal-title">::  Inclusão do Usuário  ::</h4>
            </div>                              
            <div class="modal-body">                          

                <?php echo form_open('cadastraperfil'); ?>

                <div class="box-body">

                    <div class="form-group">
                        <div><?php echo form_error('nickname'); ?></div>                                                       
                        <label for="nickname" class="col-sm-2 control-label">Nickname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nickname" name="nickname"   size="30"
                                   placeholder="Informe o nickname do usuário" value="<?php echo set_value('nickname'); ?>">
                        </div>
                    </div>    <!--  Fim form group  --> 

                    <div class="form-group">
                        <div><?php echo form_error('nome'); ?></div>                                                       
                        <label for="nome" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nome" name="nome"
                                   placeholder="Informe o nome completo do usuário" value="<?php echo set_value('nome'); ?>">
                        </div>
                    </div>    <!--  Fim form group  --> 

                    <div class="form-group">
                        <div><?php echo form_error('login'); ?></div>                                                       
                        <label for="login" class="col-sm-2 control-label">Login</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="login"
                                   name="login" placeholder="Informe o nome completo do usuário" value="<?php echo set_value('login'); ?>">
                        </div>
                    </div>     <!--  Fim form group  -->

                    <div class="form-group">
                        <div><?php echo form_error('email'); ?></div>                                                                                   
                        <label for="email" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email"
                                   name="email" placeholder="Informe o e-mail de contato" value="<?php echo set_value('email'); ?>">
                        </div>
                    </div>    <!--  Fim form group  -->

                    <div class="form-group">
                        <div><?php echo form_error('senha'); ?></div>                                                       
                        <label for="senha" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="senha"
                                   name="senha" placeholder="Informe uma senha de 6 a 8 caracteres" value="<?php echo set_value('senha'); ?>">
                        </div>
                    </div>   <!--  Fim form group  -->

                    <div class="form-group">
                        <label for="perfilid" class="col-sm-2 control-label">Perfil</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="perfilid" name="perfilid">
                                <option value="">Selecione...</option>
                                <?php
                                if (isset($resultadoPerfil)) {
                                    foreach ($resultadoPerfil as $perfil) {
                                        echo '<option value="' . $perfil->perfilid . '">' . $perfil->descricao . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>




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

