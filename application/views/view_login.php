
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ($this->session->userdata('logged_in')) {
    $dadosLogin = $this->session->userdata('logged_in');
    $empresaLogin = $this->session->userdata('empresa_login');

    if ($dadosLogin['logado'] == '2') {
        redirect('suspender', 'refresh');
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Pecado da Gula | Login</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <meta name="description" content="Site Pecado da Gula que em conjunto com os seus parceiros e colaboradores, oferecm uma variedades de opções culinárias que com certeza irão proporcionar momentos de degustação incríveis e saborosos.. ">

        <meta name="keywords" content="Gastronomia, Culinaria, Delivery, diet, Vegano, Low Carbon, Ligth, Pizza, Marmitex, Galeto, Frango, Churrasco, Hamburguer, Detox, Pecado, Gula">

        <meta name="author" content="VRA Web Hosting - Chef Carlos Henrique">
        <meta name="contact" content="vrawebhosting@gmail.com">
        <meta name="copyright" content="© 2018 Pecado da Gula - Grupo VRA Todos os direitos reservados.">

        <!-- Icone -->
        <link rel="icon" href="<?php echo site_url('assets/img/ico/Frade Glutao 40px.ico') ?>">

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap/bootstrap.min.css') ?>">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('assets/css/font-awesome/css/font-awesome.min.css') ?>">

        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo site_url('assets/css/Ionicons/css/ionicons.min.css') ?>">

        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('assets/css/adminlte/AdminLTE.min.css') ?>">

        <!-- myCSS  - CSS Customizado -->
        <link rel="stylesheet" href="<?php echo site_url('assets/css/mycss.css') ?>">

        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo site_url('assets/css/plugins/iCheck/square/blue.css') ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    </head>

    <body class="hold-transition login-page bg-gray-active">

        <div class="box-mycustom">

            <div class="login-box bg-blue box-mycustom">

                <div class="imgcontainer">      
                    <img src="<?php echo site_url('assets/img/logo.png') ?>" alt="Logo Pecado da Gula" class="avatar">
                </div>

                <div class="login-my-logo text-center">
                    <a class='text-yellow font-logo-mycss'  href="login"><b>Pecado</b> da GULA</a>
                </div>

                <!-- /.login-logo -->
                <div class="login-box-body bg-gray">

                    <p class="login-box-msg font-mycss"> AUTENTICAÇÃO DO USUÁRIO </p>

<?php echo form_open('autentica'); ?>

                    <div><?php echo form_error('empresa'); ?></div>          

                    <div class="form-group has-feedback">                                
                        <div class="input-group">
                            <input type="text" name="empresa" value="<?php echo set_value('empresa'); ?>" 
                                   class="form-control" placeholder="Informe o Código da Empresa">
                            <span class="input-group-addon">
                                <i class="fa fa-bank img-circle ico-mycustom"></i>
                            </span>                  
                        </div>                
                    </div>

                    <div><?php echo form_error('login'); ?></div>          

                    <div class="form-group has-feedback">                                
                        <div class="input-group">
                            <input type="text" name="login" value="<?php echo set_value('login'); ?>"  class="form-control" placeholder="Email ou Código do Usuário">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user img-circle ico-mycustom"></i>
                            </span>                  
                        </div>                
                    </div>

                    <div><?php echo form_error('senha'); ?></div>

                    <div class="input-group">
                        <input type="password"  id="senha" name="senha"  value="<?php echo set_value('senha'); ?>"  class="form-control" placeholder="Senha de Autenticação">              
                        <span class="input-group-btn">
                            <button id="btn-mycustom"  type="button"  onclick="mostrarsenha()" class="btn btn-default ">
                                <i id="icosenha" class="glyphicon glyphicon-eye-close img-circle ico-mycustom"></i>
                            </button>
                        </span>
                    </div>
                    <br>
                    <div class="form-group has-feedback">               
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox" checked> Manter Conectado
                                    </label>
                                </div>
                            </div>  <!-- /.col -->

                            <div class="col-xs-4">                  
                                <button type="submit" class="btn btn-primary btn-block btn-flat btn-sm">
                                    <span class="fa fa-check img-circle text-primary btn-icon"></span>
                                    Autenticar
                                </button>                                                
                            </div>  <!-- /.col -->                      
                        </div>
<?php echo form_close(); ?>

                        <a href="#">Esqueci a minha senha</a><br>
                        <a href="register.html" class="text-center">Efetuar cadastramento</a>
                    </div>
                </div>  <!-- /.login-box-body -->
            </div>     <!-- /.login-box -->

        </div>

        <!-- Script para mostrar e encrypitar o input senha  -->
        <script>
            function mostrarsenha() {
                var tipo = document.getElementById("senha");
                var icon = document.getElementById("icosenha");
                if (tipo.type == "password") {
                    tipo.type = "text";
                    icon.className = 'glyphicon glyphicon-eye-open img-circle ico-mycustom ico-mydanger';
                } else {
                    tipo.type = "password";
                    icon.className = 'glyphicon glyphicon-eye-close img-circle ico-mycustom';
                }

            }
        </script>

        <!-- jQuery 3 -->
        <script src="<?php echo site_url('assets/js/jquery/jquery.min.js'); ?>"></script>      

        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo site_url('assets/js/bootstrap/bootstrap.min.js'); ?>"></script>      

        <!-- iCheck -->
        <script src="<?php echo site_url('assets/js/plugins/iCheck/icheck.js'); ?>"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' /* optional */
                });
            });
        </script>
    </body>
</html>

