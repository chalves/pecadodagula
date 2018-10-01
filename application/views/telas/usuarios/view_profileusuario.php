<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dadosLogin = $this->session->userdata('logged_in');
$foto =  'assets/img/fotos/' . $dadosLogin['fotoUsuario'];   
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
                Perfil da Conta do Usuário
          </h1>
          <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Usuários</a></li>
                <li class="active">Minha Conta</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary bg-gray">
                    <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo site_url( $foto ); ?>" alt="Imagem do Usuário">
                            <h3 class="profile-username text-center"><?php echo $dadosLogin['nomeUsuario'];  ?></h3>
                            <p class="profile-username text-center"><?php echo $dadosLogin['nicknameUsuario'];  ?></p>
                            <p class="text-muted text-center"><?php echo $dadosLogin['cargoUsuario'];  ?></p>

                            <ul class="list-group list-group-unbordered">
                                  <li class="list-group-item bg-gray">
                                      <b>Clientes</b> <a class="pull-right">1,322</a>
                                  </li>
                                  <li class="list-group-item bg-gray">
                                      <b>Vendas</b> <a class="pull-right">543</a>
                                  </li>
                                  <li class="list-group-item bg-gray">
                                      <b>Nro Pedidos</b> <a class="pull-right">13,287</a>
                                  </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>Follow-up</b></a>
                    </div>    <!-- /.box-body -->
              </div>  <!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title text-center bg-gray">
                      Informações Complementares
                  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i> Educação</strong>

                  <p class="text-muted">
                    Colégio Visconde de Cairu - Curso Técnico em Processamento de Dados - 1992                    
                  </p>
                  <p class="text-muted">
                    Faculdade Celso Lisboa - Licenciatura Plena em Matemática - 1996  
                  </p>
                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Endereço</strong>

                  <address>
                        Email para <a href="mailto<?php echo $dadosLogin['emailUsuario'];  ?>">Vra Web Hosting</a>.<br> 
                        Loja : Rua Uruguai, 194 <br> 
                        Galeria - Loja 30<br>
                        Contato: <?php echo $dadosLogin['celularUsuario'];  ?> <br>
                        Rio de Janeiro, RJ<br>
                        Cep 20.510-060 <br>
                       Brasil
                   </address>

                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                  <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Delphi</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                  </p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Experiência Profissional</strong>

                  <p>
                      Profissional com mais de 34 anos de experiência no setor de TI e Telecomunicações tendo 
                      realizado diversos projetos de relevância ao kongo do tempo de sua experiência.
                  </p>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>      <!-- /.col -->
            
            <div class="col-md-9">     
                
              <div class="nav-tabs-custom">
                
                <div class="bg-primary">
                      <ul class="nav nav-tabs">
                          <li class="active text-bold"><a style="color: #003399" id="hrefSettings" href="#settings" data-toggle="tab">Configuração</a></li>
                              <li class="text-bold"><a style="color: #003399" href="#activity" data-toggle="tab">Atividades</a></li>
                              <li class="text-bold"><a style="color: #003399" href="#timeline" data-toggle="tab">Timeline</a></li>                  
                      </ul>
                </div>  
                  
                <div class="tab-content bg-gray">

                 <!-- Inicio - Perfil - Config  --> 
                  <div class="active tab-pane " id="settings">
                      <br>
                      <br>
                    <form class="form-horizontal">
                      <div class="form-group">
                            <label for="inputLogin" class="col-sm-2 control-label">Login</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="inputLogin" value="<?php echo $dadosLogin['loginUsuario']; ?>" id="inputLogin" placeholder="Login do Usuário">
                            </div>
                      </div>
                        
                      <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="inputEmail" value="<?php echo $dadosLogin['emailUsuario']; ?>" id="inputEmail" placeholder="Email">
                            </div>
                      </div>
                        
                      <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="inputName" value="<?php echo $dadosLogin['nomeUsuario']; ?>" id="inputName" placeholder="Name do Usuário">
                            </div>
                      </div>
                        
                       <div class="form-group">
                            <label for="inputNickname" class="col-sm-2 control-label">Nickname</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="inputNickname" value="<?php echo $dadosLogin['nicknameUsuario']; ?>" id="inputNickname" placeholder="Name do Usuário">
                            </div>
                      </div>
                        
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                        
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                    <br>
                  </div>   
                  <!-- Final - Perfil - Config  --> 
                  
                  <!-- Inicio - Perfil - Atividades  --> 
                  <div class="tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                            <span class="username">
                              <a href="#">Jonathan Burke Jr.</a>
                              <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>
                      <ul class="list-inline">
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                        </li>
                        <li class="pull-right">
                          <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                            (5)</a></li>
                      </ul>

                      <input class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                            <span class="username">
                              <a href="#">Sarah Ross</a>
                              <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="form-group margin-bottom-none">
                          <div class="col-sm-9">
                            <input class="form-control input-sm" placeholder="Response">
                          </div>
                          <div class="col-sm-3">
                            <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                            <span class="username">
                              <a href="#">Adam Jones</a>
                              <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row margin-bottom">
                        <div class="col-sm-6">
                          <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                              <br>
                              <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                              <br>
                              <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <ul class="list-inline">
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                        </li>
                        <li class="pull-right">
                          <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                            (5)</a></li>
                      </ul>

                      <input class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <li class="time-label">
                            <span class="bg-red">
                              10 Feb. 2014
                            </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs">Read more</a>
                            <a class="btn btn-danger btn-xs">Delete</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-user bg-aqua"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                          <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-comments bg-yellow"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <li class="time-label">
                            <span class="bg-green">
                              3 Jan. 2014
                            </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                      </li>
                    </ul>
                  </div>     
                  <!-- Final - Perfil - Config  --> 
                  
                </div>    <!-- /.tab-content -->
              </div>    <!-- /.nav-tabs-custom -->
            </div>     <!-- /.col -->
          </div>   <!-- /.row -->

        </section>   <!-- /.content -->
</div>    <!-- /.content-wrapper -->

<!-- Script para mostrar e encrypitar o input senha  -->
      <script>
          function(){
              var settings = document.getElementById("hrefSettings");                     
              if( settings.style == "color: white"){
                  settings.style = "color: black";                  
              } else {
                  settings.style = "color: white";                  
              }
              
          }          
      </script>