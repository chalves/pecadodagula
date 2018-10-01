<?php
/**
 * THE SOFTWARE @@  PECADO DA GULA 
 *
 * @package    PecadoGula
 * @author    Carlos Henrique ( Faustao )
 * @copyright    Copyright (c) 2017 - 2018, VRA Web hosting, Ltda. (https://VRAWEBHOSTING.com/)
 * @license    https://opensource.org/licenses/MIT    MIT License
 * @link    http://pecadodagula.net
 * @since    Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * View Home
 *
 * Template padrão para exibição das telas do Portal Administrativo
 *
 * @package    PecadoGula    
 * @subpackage   View
 * @category    Administração
 * @author        Carlos Henrique ( Faustao )
 * @link       http://pecadodagula.net
 * 
 * Repositorio GitHub
 * 
 *  Nome : pecadodagula
 * 
 *  URL Acesso : https://github.com/chalves/pecadodagula.git 
 */
if ($this->session->userdata('logged_in')) {
    $dadosLogin = $this->session->userdata('logged_in');
    $empresaLogin = $this->session->userdata('empresa_login');
    
    if ($dadosLogin['logado'] == '1') {
        if ($dadosLogin['fotoUsuario'] != "") {
            $fotoLogin = 'assets/img/fotos/' . $dadosLogin['fotoUsuario'];
        } else {
            $fotoLogin = 'assets/img/avatar/avatar5.png';
        }

        //if ($empresaLogin['logo'] != "") {
        //    $empresaLogin = 'assets/img/fotos/' . $empresaLogin['logo'];
        //} else {
        //    $empresaLogin = 'assets/img/avatar/logoPadrao.png';
        //}
    }

    if ($dadosLogin['logado'] == '2') {
        redirect('suspender', 'refresh');
    }

    $this->load->helper('My_empresa');
    $empresaStatus = $this->session->userdata('$empresaStatus');

} else {
    redirect('login', 'refresh');
}

if (!isset($opcaoMenu)) {
    $opcaoView = 'Datatables';
    $opcaoMenu = 'Dashboard';
}

//if (!isset($opcaoMenu) && ($opcaoMenu == 'Empresas' )) {
//    if ($this->session->userdata('dadosUF')) {
//        echo 'carreguei dados  da uf <br>';
//        $dados = $this->session->userdata('dadosUF');
//    }
//}

if (isset($tela)) {
    $tela = $tela;
} else {
    $tela = 'dashboard/view_dashboard';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Pecado da Gula | Administracao</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <meta name="description" content="Site Pecado da Gula que em conjunto com os seus parceiros e colaboradores, oferecm uma variedades de opções culinárias que com certeza irão proporcionar momentos de degustação incríveis e saborosos.. ">

        <meta name="keywords" content="Gastronomia, Culinaria, Delivery, diet, Vegano, Low Carbon, Ligth, Pizza, Marmitex, Galeto, Frango, Churrasco, Hamburguer, Detox, Pecado, Gula">

        <meta name="author" content="VRA Web Hosting - Chef Carlos Henrique">
        <meta name="contact" content="vrawebhosting@gmail.com">
        <meta name="copyright" content="© 2018 Pecado da Gula - Grupo VRA Todos os direitos reservados.">

        <!-- Html 5 shiv -->
        <!-- [if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif] -->

        <!-- Icone -->
        <link rel="icon" href="<?php echo site_url('assets/img/ico/Frade Glutao 40px.ico') ?>">

        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap/bootstrap.css') ?>">

        <!-- Font Awesome -->                  
        <link rel="stylesheet"   href="<?php echo site_url('assets/css/font-awesome/css/font-awesome.min.css') ?>">

        <!-- Ionicons -->                
        <link rel="stylesheet" href="<?php echo site_url('assets/css/Ionicons/css/ionicons.min.css') ?>">

        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo site_url('assets/css/jvectormap/jquery-jvectormap.css') ?>">

        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('assets/css/adminlte/AdminLTE.css') ?>">

        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('assets/css/adminlte/skins/_all-skins.min.css') ?>">

        <?php if (( $opcaoMenu == 'Dashboard' ) || ( $opcaoView == 'Datatables' )) { ?>            
            <script src="<?php echo site_url('assets/datatables/jquery.dataTables.min.css') ?>"></script>                            
            <script src="<?php echo site_url('assets/datatables/dataTables.bootstrap.css') ?>"></script>                    
            <script src="<?php echo site_url('assets/datatables/jquery.dataTables_themeroller.css') ?>"></script>                    
        <?php } ?>            

        <!-- myCSS  - CSS Customizado -->
        <link rel="stylesheet" href="<?php echo site_url('assets/css/mycss.css') ?>">

        <?php if ($opcaoMenu == 'Mural') { ?>
            <!-- myCSS  - CSS Mural de Recados -->
            <link rel="stylesheet" href="<?php echo site_url('assets/css/pages/myMural.css') ?>">
        <?php } ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>            

    <body class="hold-transition skin-blue sidebar-mini">

        <div class="wrapper">
            <?php
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');

            if ($tela != '') {
                $this->load->view('telas/' . $tela);
            }

            $this->load->view('templates/footer');
            $this->load->view('templates/configbar');
            ?>        
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>   <!-- Fim da Classe Wrapper -->              

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo site_url('assets/js/jquery/jquery-2.2.3.min.js'); ?>"></script>

        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('assets/js/bootstrap/bootstrap.min.js'); ?>"></script>

        <!-- FastClick -->
        <script src="<?php echo site_url('assets/js/fastclick/fastclick.min.js'); ?>"></script>

        <!-- Sparkline -->
        <script src="<?php echo site_url('assets/js/sparkline/jquery.sparkline.js'); ?>"></script>

        <!-- jvectormap -->
        <script src="<?php echo site_url('assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
        <script src="<?php echo site_url('assets/js/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>

        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo site_url('assets/js/slimScroll/jquery.slimscroll.min.js'); ?>"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo site_url('assets/js/adminlte/adminlte.min.js'); ?>"></script>

        <?php if ($opcaoView == 'Dashboard') { ?>
            <!-- ChartJS 1.0.1 -->
            <script src="<?php echo site_url('assets/js/chartjs/Chart.js'); ?>"></script>
            <!-- AdminLTE dashboard2 demo (This is only for demo purposes) -->
            <script src="<?php echo site_url('assets/js/pages/dashboard2.js'); ?>"></script>                
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="<?php echo site_url('assets/js/pages/dashboard.js'); ?>"></script>                        
        <?php } ?>

        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('assets/js/demo.js'); ?>"></script>     

        <!-- Script Modal das notificações do header.php ( Menu - NAC-BAR ) -->
        <script src="<?php echo site_url('assets/js/scripts/scriptsHeader.js') ?>"></script>;                    

        <?php if ($opcaoMenu == 'Empresas') { ?>
            <script src="<?php echo site_url('assets/js/scripts/scriptsEmpresa.js') ?>"></script>;                    
        <?php } ?>

        <?php if ($opcaoMenu == 'Perfil') { ?>
            <script src="<?php echo site_url('assets/js/scripts/scriptsPerfil.js') ?>"></script>;                    
        <?php } ?>

        <?php if ($opcaoMenu == 'Mural') { ?>
            <script src="<?php echo site_url('assets/js/scripts/scriptsMural.js') ?>"></script>;                    
        <?php } ?>

        <?php if ($opcaoMenu == 'Cargo') { ?>
            <script src="<?php echo site_url('assets/js/scripts/scriptsCargo.js') ?>"></script>;                    
        <?php } ?>

        <?php if ($opcaoMenu == 'Usuario') { ?>
            <script src="<?php echo site_url('assets/js/scripts/scriptsUsuario.js') ?>"></script>;                    
        <?php } ?>

        <?php if (( $opcaoMenu == 'Dashboard' ) || ( $opcaoView == 'Datatables' )) { ?>            
            <script src="<?php echo site_url('assets/datatables/jquery.dataTables.js') ?>"></script>
            <script src="<?php echo site_url('assets/datatables/dataTables.bootstrap.min.js') ?>"></script>      
            <!-- FastClick -->
            <script src="<?php echo site_url('assets/fastclick/fastclick.js') ?>"></script>   
            <!-- page script -->
            <script>
                $(function () {
                    $('#exampleX').DataTable()
                    $('#exampleY').DataTable({
                        'paging': true,
                        'lengthChange': false,
                        'searching': false,
                        'ordering': true,
                        'info': true,
                        'autoWidth': false
                    })
                })
            </script>
        <?php } ?>

    </body>
</html>

