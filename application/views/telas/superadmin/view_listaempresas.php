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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Módulo Configuração do Portal 
            <small> - Empresas Parceiras</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Gestão do Portal</li>
            <li>Configuração</li>
            <li>Cadastro</li>
            <li class="active">Empresa</li>
        </ol>
    </section>

    <!-- Main content -->
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
                        <h3 class="box-title">Relação dos Estabelecimentos Comerciais Parceiros</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="pull-right">                                                                       
                            <a href="incluirempresa"  class="btn btn-danger btn-flat" title="Incluir Empresa Parceira">
                                <i class="fa fa-user-circle-o"></i> Incluir
                            </a>
                            <br><br>                       
                        </div>                        
                        <?php
                        if (isset($resultadoEmpresa)) {
                            if (!empty($resultadoEmpresa)) {
                                ?>
                                <table id="tableEmpresa" class="table table-striped table-bordered" style="width:100%" >
                                    <thead class="bg-blue-active">
                                        <tr class="text-center text-bold" style="color: white">                                                            
                                            <th style="width:20px">Seq.</th>                
                                            <th style="width:30px">Status</th>
                                            <th style="width:80px"> Aberto?</th>                                                                                                                                                                                 
                                            <th style="width:100px"> Nome Fantasia</th> 
                                            <th style="width:30px">Ticket</th>
                                            <th style="width:40px"> Contato</th> 
                                            <th style="width:40px"> Telefone</th> 
                                            <th style="width:40px"> Celular</th> 
                                            <th style="width:100px">Ações</th>                                              
                                        </tr>                            
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($resultadoEmpresa as $empresa) {
                                            if (!empty($empresa)) {
                                                ?>
                                                <tr>
                                                    <td class = "text-center " style = "width20px"><?php echo $empresa->id; ?> </td>                                                    
                                                    <td class="text-center"  style="width:30px">                                                                            
                                                        <?php
                                                        if ($empresa->status == '1') {
                                                            echo '<span class="label label-default label-success">Ativo</span>';
                                                        } else {
                                                            echo '<span class="label label-default label-danger">Bloqueado</span>';
                                                        }
                                                        ?>                                                                                                                                                                                                                                                                                                                            
                                                    </td>

                                                    <td class="text-center"  style="width:80px">                                                                            
                                                        <?php
                                                        if ($empresa->aberto == '1') {
                                                            echo '<span class="label label-default label-info">Aberto</span>';
                                                        } else {
                                                            echo '<span class="label label-default label-warning">Fechado</span>';
                                                        }
                                                        ?>                                                                                                                                                                                                                                                                                                                            
                                                    </td>    

                                                    <td class="text-center" style = "width:100px"><?php echo $empresa->nomeFantasia; ?></td> 
                                                    <td class="text-center" style = "width:30px"><?php echo $empresa->qtdeTicket; ?></td>                                            
                                                    <td class="text-center" style = "width:40px"><?php echo $empresa->contato; ?></td> 
                                                    <td class="text-center" style = "width:40px"><?php echo $empresa->telContato; ?></td> 
                                                    <td class="text-center" style = "width:40px"><?php echo $empresa->celContato; ?></td> 

                                                    <td style="width:100px">                                                                                                                                                                           
                                                        <a href="#modal-alterar-empresa" title="Alterar o Perfil de Acesso" data-toggle="modal"  id="alterarEmpresa"  
                                                           data-whatever-id="<?php echo $empresa->id; ?>"  
                                                           data-whatever-descricao="<?php echo $empresa->nomeFantasia; ?>"
                                                           >  <i class="fa fa-pencil-square-o"></i>
                                                        </a>                                                                                                       
                                                        <?php
                                                        echo '          ';
                                                        if ($empresa->status == '1') {
                                                            ?>
                                                            <a href="#modal-excluir-empresa"  title="Deletar o Perfil de Acesso" data-toggle="modal" id="excluirEmpresa"   
                                                               data-whatever-id="<?php echo $empresa->id; ?>" 
                                                               data-whatever-descricao="<?php echo $empresa->nomeFantasia; ?>"
                                                               data-whatever-descricao2="<?php echo $empresa->nomeFantasia; ?>"
                                                               >  <i class="fa fa-trash-o"></i>
                                                            </a>
                                                            <?php
                                                        } else {
                                                            echo '';
                                                        }
                                                        ?>                                                                                                                                                                                                                                                
                                                        <?php
                                                        echo '          ';
                                                        if ($empresa->status == '1') {
                                                            echo '<a href="bloquearempresa?id=<?php echo $empresa->id; ?>"  title="Bloquear a Empresa"><i class="fa fa-lock"></i></a>';
                                                        } else {
                                                            echo '<a href="desbloquearempresa?id=<?php echo $empresa->id; ?>" title="Desbloquear a Empresa"><i class="fa fa-unlock"></i></a>';
                                                        }
                                                        ?>                                                                                                                                                                                                                                                
                                                    </td>
                                                </tr> 

                                                <?php
                                            } else {
                                                echo '<h4>Não existem Empresas Parceiras cadastradas...</h4>';
                                            }
                                            ?>   

                                            <?php
                                        }
                                    } else {
                                        echo '<h4>Não existem Estabelecimentos Comerciais cadastrados...</h4>';
                                    }
                                    ?>
                                </tbody>
                                <tfoot class = "bg-blue-active">
                                    <tr class = "text-center text-bold" style = "color: white">
                                        <th style = "width:20px">Seq.</th>                                        
                                        <th style = "width:30px">Status</th>
                                        <th style = "width:80px"> Aberto?</th>
                                        <th style = "width:100px"> Nome Fantasia</th>
                                        <th style = "width:30px">Tickets</th>
                                        <th style="width:40px"> Contato</th> 
                                        <th style="width:40px"> Telefone</th> 
                                        <th style="width:40px"> Celular</th> 

                                        <th style = "width:100px">Ações</th>
                                    </tr>
                                </tfoot>
                            </table>

                        <?php } ?>                            
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div>
                    <p >                                         
                        <i class="fa fa-pencil-square-o"></i> <span class="label label-default label-info margin-r-5">   Alterar  </span>
                        <i class="fa fa-trash-o"></i> <span class="label label-default label-warning margin-r-5">   Excluir </span>
                        <i class="fa fa-unlock"></i> <span class="label label-default label-primary margin-r-5"> Desbloquear  </span>
                        <i class="fa fa-lock"></i> <span class="label label-default label-danger margin-r-5"> Bloquear  </span>
                    </p>
                </div>  

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
