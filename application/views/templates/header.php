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
 * Template View - header
 *
 * header do template do Portal de Administração
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
if (!$this->session->userdata('logged_in')) {
    redirect('login', 'refresh');
}

$dadosLogin = $this->session->userdata('logged_in');
$empresaLogin = $this->session->userdata('empresa_login');
$empresaStatus = $this->session->userdata('empresaStatus');

if ($dadosLogin['fotoUsuario'] != "") {
    $fotoLogin = 'assets/img/fotos/' . $dadosLogin['fotoUsuario'];
} else {
    $fotoLogin = 'assets/img/avatar/avatar5.png';
}

$idLogin = $dadosLogin['idUsuario'];
?>
<header class="main-header">      
    <!-- Logo -->
    <a href="dashboard" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>G</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>PECADO</b> da Gula</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="messages-menu pull-left" >
            <p style="font-size: 22px; color: #FFC414; font-weight: bold; margin-top: 8px">
                <?php                                        
                echo '    ' . $empresaLogin['nomeFantasia'] . '    ';
                if ($empresaStatus['implantada'] == '1') {
                    if ($empresaStatus['aberto'] == '1') {
                        echo '<span class="label label-success">Aberto</span>';
                    } else {
                        echo '<span class="label label-danger">Fechado</span>';
                    }
                } else {
                    echo '<span class="label label-danger">  Não Implantada  </span>';
                }
                ?>
            </p>
        </div>
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">                                    
                <!-- Messages: style can be found in dropdown.less-->                    
                <li class="dropdown messages-menu" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-info">
                            <?php
                            $this->db->select('*');
                            $this->db->where('lido', 0);
                            $this->db->where('idPara', $idLogin);
                            $this->db->where('status', 1);
                            $this->db->limit(6);
                            $resultMural = $this->db->get('mural', 6);

                            if (( isset($resultMural) ) && (!empty($resultMural) )) {
                                $qtdeMSG = $resultMural->num_rows();
                            } else {
                                $qtdeMSG = 0;
                            }
                            echo $qtdeMSG;
                            ?>
                        </span>
                    </a>
                    <?php $this->load->view('templates/messagebar'); ?>                                    
                </li>

                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>                            
                    <?php
                    $this->load->view('templates/notificabar');
                    ?>                           
                </li>

                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <?php $this->load->view('templates/tarefasbar'); ?>                           
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo site_url($fotoLogin); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $dadosLogin['nomeUsuario']; ?></span>
                    </a>
                    <?php $this->load->view('templates/perfilbar'); ?>                                                     
                </li>

                <!-- Control Config Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>

            </ul>

        </div>
    </nav>
</header>


<!--  Modal - Exibir recado do Mural  --------------------------------------------------------------------------------->
<div class="modal modal-primary fade" id="modal-exibir-recado" tabindex="-1" role="dialog" aria-labelledby="ModalExibirRecado">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                              
            <div class="myClearfix pull-right" style="margin-right: 20px; margin-top: 10px">
                <img class="img-circle myImg-lg " id="img-exbir-mural" src="avatar.png" alt="User Avatar"
                     style="width: 90px; height: 90px">
            </div>

            <div class="modal-header">                
                <h3 class="modal-title">::  Consultar Recado   ::</h3>
                <h4 class="modal-remetente">Remetente: </h4>
                <h5 class="modal-codigo">Assunto: </h5>
            </div>                              

            <div class="modal-body">                                          

                <div id='div-abas'>
                    <ul id='nav-abas'>
                        <li><a href="#panel-recado">Dados do Recado</a></li>                                                                                        
                        <li id="aba-resposta"><a href="#panel-resposta">Dados da Resposta</a></li>                                            
                    </ul>

                    <div id='panel-recado' class="aba-panel">
                        <div class="col-md-12 bg-blue-active" style="padding-top: 10px;"> 
                            <div class="row">
                                <form>                                                                                            
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status"  id="status-exibir" >
                                                <option value="0">Selecione...</option>
                                                <option value="1">Recebido</option>
                                                <option value="2">Respondido</option>
                                                <option value="3">Arquivado</option>
                                                <option value="9">Cancelado</option>
                                            </select>                                                    
                                        </div>    <!--  Fim form group  -->
                                    </div>    <!--  Fim Col form group  -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="prioridade">Prioridade</label>
                                            <select class="form-control" name="prioridade"  id="prioridade-exibir" >
                                                <option value="0">Sem Prioridade</option>
                                                <option value="1">Normal</option>   
                                                <option value="2">Importante</option>
                                                <option value="3">Urgente</option>
                                            </select>                                                    
                                        </div>    <!--  Fim form group  -->
                                    </div>    <!--  Fim Col form group  -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lido">Situação</label>
                                            <p class="btn btn-danger btn-block" id="lido-exibir"> ::  xxxxxxx   :: </p>
                                        </div>    <!--  Fim form group  -->                                              
                                    </div>    <!--  Fim Col form group  --> 

                            </div>   <!--  Fim Row -->

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="criado">Enviado em</label>
                                        <input type="text" class="form-control trata-data-exibir" name="criado" id="criado-exibir" placeholder="Data do Envio">
                                    </div>    <!--  Fim form group  -->                                              
                                </div>    <!--  Fim Col form group  --> 

                                <div class="col-md-7">
                                    <div class="form-group">                                                        
                                        <label for="recado" class="col-sm-2 control-label">Recado</label>                                                        
                                        <textarea  class="form-control"  name="recado" rows="4" cols="40" required  id="recado-exibir"
                                                   placeholder="Digite o recado ... "  > recado</textarea>                            
                                    </div>    <!--  Fim form group  -->
                                </div>  <!--   Fim Col  -->                                                     
                            </div>  <!--   Fim Row  -->                                                     

                        </div>  <!--   Fim Col 12  -->                                                     
                    </div>  <!--   Fim Panel Recado  -->               

                    <div id='panel-resposta' class="aba-panel" >
                        <div class="col-md-12 bg-danger" style="padding-top: 10px;"> 
                            <div class="row">
                                Aqui irei exibir os dados da resposta
                            </div>    <!--   Fim Row  -->                                                                             
                        </div>  <!--   Fim Col 12  -->                                                     
                    </div>  <!--   Fim Panel Resposta  -->                   

                </div>    <!--   Fim Div Abas  -->               
            </div>     <!--     Fim modal body         -->

            <div class="modal-footer" style="padding-top: 10px;">
                <button type="button" class="btn btn-warning pull-right" data-dismiss="modal">
                    <i class="fa fa-power-off img-circle"></i>
                    Retornar
                </button>                    
            </div>  <!--    Fim modal footer         -->

        </div>  <!-- /.modal-content -->
    </div>      <!-- /.modal-dialog -->
</div>    <!-- /. Final modal - Exibir Recado ------------------------------------------------------------------->
