<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dadosLogin = $this->session->userdata('logged_in');
$empresaLogin = $this->session->userdata('empresa_login');
$foto =  'assets/img/fotos/' . $dadosLogin['fotoUsuario'];     

?>
<ul class="dropdown-menu col-xs-12 clearfix">  
            <!-- User image -->
            <li class="user-header bg-blue-active"> 
                <img src="<?php echo site_url( $foto ); ?>" class="img-circle" alt="Imagem do Usuário">
                <p>
                    <?php 
                        echo $dadosLogin['nicknameUsuario'];  
                    ?><br>                     
                    <small>
                      Cadastrado em <?php $dtCadastro = strTOTime( $dadosLogin['dataCadUsuario'] );
                      echo date( 'd/m/y h:i:s', $dtCadastro );   ?>  <br>
                      Último Acesso: <?php $ultimoLogin = strTOTime( $dadosLogin['ultimoLogin'] );
                              echo date( 'd/m/y h:i:s', $ultimoLogin );   ?>                    
                    </small>                                        
                </p>
            </li>   

            <!-- Menu Body -->
            <li class="user-body bg-gray">
                <div class="row">
                        <div class="col-xs-4 pull-left">                            
                            <a class="btn btn-primary btn-lg btn-mycustom" href="#">
                                <span class="fa fa-pie-chart img-circle text-primary btn-icon"></span>
                                <span style="color: white">Metas </span>
                            </a>                            
                        </div>
                        <div class="col-xs-4 pull-right btn-margin-custom">
                            <a class="btn btn-primary btn-lg btn-mycustom" href="#">
                                    <span class="fa fa-tachometer img-circle text-primary btn-icon"></span>
                                    <span style="color: white">Vendas </span>
                                </a>
                        </div>
                    <br><br><br>
                        <div class="col-xs-4 ml-auto">
                                <a class="btn btn-primary btn-lg btn-mycustom" href="#">
                                    <span class="fa fa-group img-circle text-primary btn-icon"></span> 
                                    <span style="color: white">Clientes </span>
                                </a>
                        </div>
                </div>   <!-- /.row -->
            </li>

            <!-- Menu Footer-->
            <li class="user-footer bg-blue-active">
                <div class="pull-left">
                        <a class="btn btn-success btn-lg btn-mycustom" href="profile">
                                    <span class="fa fa-group img-circle text-success btn-icon"></span> 
                                    <span style="color: white">Minha Conta </span>
                        </a>                        
                </div>
                <div class="pull-right">
                    <a class="btn btn-danger btn-lg btn-mycustom" href="<?= base_url()?>home/logout">
                                    <span class="fa fa-group img-circle text-danger btn-icon"></span> 
                                    <span style="color: white">Sair </span>
                        </a>                                                
                </div>
            </li>         
  </ul>
