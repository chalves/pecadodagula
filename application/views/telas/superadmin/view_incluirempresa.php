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
        <h1>
            Módulo Configuração do Portal 
            <small> - Empresas Parceiras</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Gestão do Portal</li>
            <li>Configuração</li>
            <li>Cadastro</li>
            <li class="active">Incluir Empresa</li>
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
                        <h3 class="box-title text-bold">Inclusão de Estabelecimento Comercial</h3>                                                
                    </div>  <!-- Final box header -->

                    <div class="box">                        
                        <div class="box-body">                                        

                            <?php
                            /*
                             * To change this license header, choose License Headers in Project Properties.
                             * To change this template file, choose Tools | Templates
                             * and open the template in the editor.
                             */
                            ?>
                            <?php
                            $attributes = array('class' => 'form-horizontal', 'id' => 'myform', 'method' => 'POST');
                            echo form_open('cadastrarempresa', $attributes);
                            ?>



                            <div class="box-body">       
                                <div class="col-sm-12 bg-red "><?php echo form_error('nomeFantasia'); ?></div>
                                <div class="form-group">                                    
                                    <label for="nomeFantasia" class="col-sm-2 control-label">Nome Fantasia</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nomeFantasia" name="nomeFantasia"  size="40"
                                               placeholder="Informe o nome fantasia do Estabelecimento Comercial" value="<?php echo set_value('nomeFantasia'); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 bg-red "><?php echo form_error('razaoSocial'); ?></div>
                                <div class="form-group">
                                    <label for="razaoSocial" class="col-sm-2 control-label">Razão social</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="razaoSocial" name="razaoSocial"  size="40"
                                               placeholder="Informe a razão social do Estabelecimento Comercial" value="<?php echo set_value('razaoSocial'); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 bg-red "><?php echo form_error('cgc'); ?></div>
                                <div class="form-group">
                                    <label for="cgc" class="col-sm-2 control-label">CGC/MF</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="cgc" name="cgc"  size="40"
                                               placeholder="Informe o CGC do Estabelecimento Comercial" value="<?php echo set_value('cgc'); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 bg-red "><?php echo form_error('endereco'); ?></div>                                
                                <div class="form-group">
                                    <label for="endereco" class="col-sm-2 control-label">Endereço</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="endereco" name="endereco"  size="40"
                                               placeholder="Informe o endereço do Estabelecimento Comercial" value="<?php echo set_value('endereco'); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 bg-red "><?php echo form_error('cep'); ?></div>                                
                                <div class="form-group">
                                    <label for="cep" class="col-sm-2 control-label">Cep</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="cep" name="cep"  size="40"
                                               placeholder="Informe o cep do Estabelecimento Comercial" value="<?php echo set_value('cep'); ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="uf" class="col-sm-2 control-label">UF</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="perfilid" name="uf">
                                            <option  value="">Selecione  a Unidade da Federação...</option>
                                            <?php
                                            if ($this->session->userdata('resultadoUF')) {
                                                $resultadoUF = $this->session->userdata('resultadoUF');
                                                foreach ($resultadoUF as $UF) {
                                                    echo '<option value=" ' . $UF->id . ' ">' . $UF->uf . ' - ' . $UF->descricao . '</option>';
                                                }
                                            }
                                            ?>                                                    
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">E-mail</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email"
                                               name="email" placeholder="Informe o e-mail de contato" value="<?php echo set_value('email'); ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="contato" class="col-sm-2 control-label">Contato</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="contato"
                                               name="contato" placeholder="Informe o nome de contato" value="<?php echo set_value('contato'); ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="telContato" class="col-sm-2 control-label">Telefone</label>

                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control" id="telContato"
                                               name="telContato" placeholder="Informe o telefone do contato" value="<?php echo set_value('telContato'); ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="celContato" class="col-sm-2 control-label">Celular</label>

                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control" id="celContato"
                                               name="celContato" placeholder="Informe o celular do contato" value="<?php echo set_value('celContato'); ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="idTipo" class="col-sm-2 control-label">Tipo</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="idTipo" name="idTipo">
                                            <option value="">Selecione o tipo do Estabelecimento......</option>
                                            <?php
                                            if ($this->session->userdata('resultadoTipoEmpresa')) {
                                                $resultadoTipoEmpresa = $this->session->userdata('resultadoTipoEmpresa');
                                                foreach ($resultadoTipoEmpresa as $TipoEmpresa) {
                                                    echo '<option value=" ' . $TipoEmpresa->id . ' ">' . $TipoEmpresa->descricao . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-9 col-lg-9">&nbsp;</div>
                                <div class="col-xs-12 col-sm-3 col-lg-3">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary"
                                                style="width: 100%">Incluir Estabelecimento</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-9 col-lg-9">&nbsp;</div>
                                <div class="col-xs-12 col-sm-3 col-lg-3">                                                                                
                                    <div class="pull-right" >
                                        <button type="reset" class="btn btn-warning"
                                                style="width: 100%">Limpar</button>
                                    </div>                                                                                                                        
                                </div>
                            </div>
<?php echo form_close(); ?>


                        </div>
                    </div>
                </div>

            </div>  <!--   Fim do div clonunas    -->
        </div>     <!--   Fim do div linhas    -->
    </section>

</div>   <!--   Fim do div content-wrapper    -->

