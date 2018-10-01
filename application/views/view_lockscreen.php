<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!$this->session->userdata('logged_in')) {
    redirect('login', 'refresh');
}
$dadosLogin = $this->session->userdata('logged_in');
$fotoLogin = 'assets/img/fotos/' . $dadosLogin['fotoUsuario'];
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

    <body class="hold-transition lockscreen">
        <!-- Automatic element centering -->
        <div class="lockscreen-wrapper with-border " style="margin-top: 2%">

            <div class="imgcontainer">      
                <img src="<?php echo site_url('assets/img/logo.png') ?>" alt="Logo Pecado da Gula" class="avatar">
            </div>

            <div class="lockscreen-logo">
                <a class='text-navy font-logo-mycss'  href="login"><b>Pecado</b> da GULA</a>
            </div>

<?php if (  isset($_SERVER['erroLockScreen']   )) { ?>
            <div class="alert alert-danger text-center" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign pull-left" aria-hidden="true"></span>                                        
                <strong><?php echo form_error('senha'); ?></strong>
            </div>
<?php } ?>
            <!-- User name -->
            <div class="lockscreen-name"><?php echo $dadosLogin['nomeUsuario']; ?></div>

            <!-- START LOCK SCREEN ITEM -->
            <div class="lockscreen-item">
                <!-- lockscreen image -->
                <div class="lockscreen-image">
                    <img src="<?php echo site_url($fotoLogin); ?>"  alt="Imagem do Usuário">
                </div>
                <!-- /.lockscreen-image -->

                <!-- lockscreen credentials (contains the form) -->
                <div class="lockscreen-credentials">


                    <?php echo form_open('liberar'); ?>


                    <div class="input-group">
                        <input type="password" id="senha" name="senha"  class="form-control" 
                               value="<?php echo set_value('senha'); ?>"    placeholder="Senha de Autenticação">

                        <div class="input-group-btn">
                            <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>   <!-- /.lockscreen credentials -->

            </div>
            <!-- /.lockscreen-item -->
            <div class="help-block text-center">                
                Entre com sua "senha' de AUTENTICAÇÃO para recuperar sua sessão
            </div>
            <div class="text-center">
                <a href="novologin">Ou faça um novo LOGIN com Usuário diferente</a>
            </div>
            <div class="lockscreen-footer text-center">
                Copyright &copy; 2012-2018  <b><a href="#" class="text-black">Vra web Hosting Ltda.</a></b><br>
                Todos os direitos reservados.                
            </div>
        </div>
        <!-- /.center -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo site_url('assets/js/jquery/jquery-2.2.3.min.js'); ?>"></script>

        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('assets/js/bootstrap/bootstrap.min.js'); ?>"></script>

    </body>
</html>
