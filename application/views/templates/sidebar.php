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
 * Template View - sidebar
 *
 * Menu lateral esquerdo do template do Portal de Administração
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
$dadosLogin = $this->session->userdata('logged_in');
$empresaLogin = $this->session->userdata('empresa_login');

$this->load->helper('My_empresa');
$empresaStatus = $this->session->userdata('empresaStatus');

// $logoEmpresa = 'assets/img/fotos/' . $empresaLogin['logo'];
//var_dump( $empresaLogin);
$fotoLogin = 'assets/img/fotos/' . $dadosLogin['fotoUsuario'];
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->      
        <div class="user-panel">
            <div class="pull-left image">          
                <img src="<?php echo site_url($fotoLogin); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $dadosLogin['nomeUsuario']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>            
            </div>
            <?php if ($dadosLogin['logado'] == '1') { ?>
                <div class="pull-right">                
                    <a href="suspender" class="btn btn-sm btn-danger text-danger" 
                       data-toggle="tooltip" data-placement="bottom" title="Bloquear a sessão do Usuário">
                        <i class="fa fa-lock"></i>
                    </a>
                </div> 
            <?php } ?>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <!-- Definição do Menu do Super Administrador  -->
            <?php
            if ($dadosLogin['superAdmin'] == 1) {
                ?>
                <li class="header">:: SUPER ADMINISTRADOR ::</li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs text-danger"></i> <span>Gestão Pecado da Gula</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right text-danger"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-file-text text-red"></i> 
                                <span>Configurações</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>      

                            <ul class="treeview-menu">    
                                <li class="treeview">  
                                    <a href="#">
                                        <i class="fa fa-database text-yellow"></i>
                                        <span>Tabelas</span>            
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a href="listaculinaria">
                                                <i class="fa fa-cutlery text-aqua"></i> 
                                                <span>Tipo da Culinária</span>
                                                <span class="pull-right-container">
                                                    <span class="label label-warning pull-right"><?php echo $this->db->count_all('tipoculinaria'); ?></span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="listatipoempresa">
                                                <i class="fa fa-building-o text-fuchsia"></i> 
                                                <span>Tipo da Empresa</span>
                                                <span class="pull-right-container">
                                                    <span class="label label-info pull-right"><?php echo $this->db->count_all('tipoempresa'); ?></span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="listauf">
                                                <i class="fa fa-map text-info"></i> 
                                                <span>Lista das UF</span>
                                                <span class="pull-right-container">
                                                    <span class="label label-danger pull-right"><?php echo $this->db->count_all('uf'); ?></span>
                                                </span>
                                            </a>
                                        </li>                        
                                        <li>
                                            <a href="listaperfilpreco">
                                                <i class="fa fa-money text-danger"></i> 
                                                <span>Perfil de Preço</span>
                                                <span class="pull-right-container">
                                                    <span class="label label-primary pull-right"><?php echo $this->db->count_all('perfilpreco'); ?></span>
                                                </span>
                                            </a>
                                        </li>                        
                                    </ul>   
                                </li>                

                                <li class="treeview">  
                                    <a href="#">
                                        <i class="fa fa-file text-fuchsia"></i>
                                        <span>Cadastros</span>            
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a href="<?= base_url() ?>empresa/cadastrar">
                                                <i class="fa fa-building text-aqua"></i> 
                                                <span>Empresas</span>
                                                <span class="pull-right-container">
                                                    <span class="label label-warning pull-right"><?php echo $this->db->count_all('empresas'); ?></span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-cutlery text-info"></i> 
                                                <span>Taxas de Serviço</span>
                                                <span class="pull-right-container">
                                                    <span class="label label-danger pull-right"><?php echo $this->db->count_all('clientes'); ?></span>
                                                </span>
                                            </a>
                                        </li>                        
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-line-chart text-danger"></i> 
                                                <span>Financeiro</span>
                                                <span class="pull-right-container">
                                                    <span class="label label-danger pull-right"><?php echo $this->db->count_all('cargos'); ?></span>
                                                </span>
                                            </a>
                                        </li>                        
                                    </ul>   
                                </li>                
                            </ul>    
                        </li>   

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard text-warning"></i> <span>Configurações do Portal</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right text-danger"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active"><a href="#"><i class="fa fa-shopping-cart text-yellow"></i>Loja Virtual</a></li>
                                <li><a href="#"><i class="fa fa-cubes  text-aqua "></i>Livro de Receita</a></li>
                            </ul>
                        </li>


                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-file-text text-red"></i> 
                                <span> Empresa</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>      

                            <ul class="treeview-menu">    
                                <li class="treeview">  
                                    <a href="#">
                                        <i class="fa fa-database text-yellow"></i>
                                        <span>Implantar</span>            
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-cutlery text-aqua"></i> 
                                                <span>Empresa</span>
                                                <span class="pull-right-container">
                                                    <span class="label label-warning pull-right"><?php echo $this->db->count_all('tipoculinaria'); ?></span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-building-o text-fuchsia"></i> 
                                                <span>Horário Funcionamento</span>                                                
                                            </a>
                                        </li>
                                        <li>
                                            <a href="listauf">
                                                <i class="fa fa-map text-info"></i> 
                                                <span>Lista das UF</span>
                                                <span class="pull-right-container">
                                                    <span class="label label-danger pull-right"><?php echo $this->db->count_all('uf'); ?></span>
                                                </span>
                                            </a>
                                        </li>                        
                                        <li>
                                            <a href="listaperfilpreco">
                                                <i class="fa fa-money text-danger"></i> 
                                                <span>Perfil de Preço</span>
                                                <span class="pull-right-container">
                                                    <span class="label label-primary pull-right"><?php echo $this->db->count_all('perfilpreco'); ?></span>
                                                </span>
                                            </a>
                                        </li>                        
                                    </ul>   
                                </li>                

                                <li class="treeview">  
                                    <a href="#">
                                        <i class="fa fa-wrench text-fuchsia"></i>
                                        <span>Serviços</span>            
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>

                                    <ul class="treeview-menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-truck text-aqua"></i> 
                                                <span>Logística</span>                                                
                                            </a>
                                        </li> <!-- fim menu Logistica --> 

                                        <li>
                                            <a href="#">
                                                <i class="fa fa-comments text-info"></i> 
                                                <span>SAC</span>                                                
                                            </a>
                                        </li> <!-- fim menu SAC --> 

                                        <li>
                                            <a href="#">
                                                <i class="fa fa-cart-plus text-danger"></i> 
                                                <span>Central de Compras</span>                                                
                                            </a>
                                        </li>  <!-- fim menu Centra de Compras --> 

                                    </ul>   <!-- fim treeView Logística --> 
                                </li>  <!-- fim treeView Servicos -->                

                                <li class="treeview">  
                                    <a href="#">
                                        <i class="fa fa-external-link text-fuchsia"></i>
                                        <span>Plugins</span>            
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>

                                    <ul class="treeview-menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-truck text-aqua"></i> 
                                                <span>Email Marketing</span>                                                
                                            </a>
                                        </li> <!-- fim menu Email Marketing --> 

                                        <li>
                                            <a href="#">
                                                <i class="fa fa-print text-info"></i> 
                                                <span>Newsletter</span>                                                
                                            </a>
                                        </li> <!-- fim menu NewsLetter --> 

                                        <li>
                                            <a href="#">
                                                <i class="fa fa-comments text-info"></i> 
                                                <span>SMS Marketing</span>                                                
                                            </a>
                                        </li> <!-- fim menu SMS Marketing --> 

                                        <li>
                                            <a href="#">
                                                <i class="fa fa-cart-plus text-danger"></i> 
                                                <span>Central de Videos</span>                                                
                                            </a>
                                        </li>  <!-- fim menu Central de Videos --> 

                                    </ul>   <!-- fim treeView Central de Videos --> 
                                </li>  <!-- fim treeView Plugins -->                




                            </ul>   <!-- fim treeView Implantar -->                
                        </li>    <!-- fim -->                

                    </ul>  <!-- fim treeView Configuracoes --> 

                </li>   <!-- fim treeView Gestao Portal  --> 

            <?php } ?>
            <!-- Final da Definição do Menu do Super Administrador  -->

            <?php
            if ($empresaStatus['implantada'] == '1') {
                if ($empresaStatus['aberto'] == '1') {
                    ?>     
                    <li class="header">OPERACIONAL</li>
                    <li><a href="#"><i class="fa fa-shopping-cart text-red"></i> <span>Vendas</span></a></li>
                    <li><a href="#"><i class="fa fa-industry text-yellow"></i> <span>Ordens de Produção</span></a></li>
                    <li><a href="#"><i class="fa fa-university text-aqua"></i> <span>Pagamentos</span></a></li>          
                <?php } ?>
                <li class="header">DASHBOARD</li>
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-dashboard text-warning"></i> <span>Indicadores Operacionais</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right text-danger"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="<?= base_url() ?>dashboard"><i class="fa fa-pie-chart text-yellow"></i>Operacional do Dia</a></li>
                        <li><a href="<?= base_url() ?>dashboard2"><i class="fa fa-line-chart  text-aqua "></i>Fechamento Mensal</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard text-danger"></i> <span>Indicadores Marketing</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right text-danger"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o text-warning"></i>Campanhas & Promoções</a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-danger"></i>Redes Sociais</a></li>
                    </ul>
                </li>
            <?php } ?> 

            <li class="header">MENU DE APOIO</li>

            <!-- Definição do Menu Cadastro e Tabelas  -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text text-red"></i> 
                    <span>Cadastros & Tabelas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <!-- Definição do Menu Cadastro  -->                   
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user text-yellow"></i>
                            <span>Cadastros</span>            
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>   
                                <a href="<?= base_url() ?>listausuarios">
                                    <i class="fa fa-id-card text-yellow"></i> 
                                    <span>Usuários</span>
                                    <span class="pull-right-container">
                                        <span class="label label-warning pull-right"><?php echo $this->db->count_all('usuarios'); ?></span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-user text-warning"></i> 
                                    <span>Clientes</span>
                                    <span class="pull-right-container">
                                        <span class="label label-danger pull-right"><?php echo $this->db->count_all('clientes'); ?></span>
                                    </span>
                                </a>
                            </li>                        
                            <li>
                                <a href="#">
                                    <i class="fa fa-building text-danger"></i> 
                                    <span>Fornecedores</span>
                                    <span class="pull-right-container">
                                        <span class="label label-danger pull-right"><?php echo $this->db->count_all('cargos'); ?></span>
                                    </span>
                                </a>
                            </li>                        
                        </ul>   <!-- Final da Definição do Menu Cadastro  -->                   

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder text-green"></i> Tabelas de Apoio
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?= base_url() ?>listacep">
                                    <i class="fa fa-envelope text-fuchsia"></i> 
                                    <span>CEPs Atendidos</span>
                                    <span class="pull-right-container">
                                        <span class="label label-danger pull-right"><?php echo $this->db->count_all('cep'); ?></span>
                                    </span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-vcard-o text-yellow"></i> Usuários
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="<?= base_url() ?>listaperfil">
                                            <i class="fa fa-lock text-fuchsia"></i> 
                                            <span>Perfil de Acesso</span>
                                            <span class="pull-right-container">
                                                <span class="label label-warning pull-right"><?php echo $this->db->count_all('perfil'); ?></span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>listacargos">
                                            <i class="fa fa-mortar-board"></i> 
                                            <span>Cargos Funcionais</span>
                                            <span class="pull-right-container">
                                                <span class="label label-danger pull-right"><?php echo $this->db->count_all('cargos'); ?></span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>         <!-- Final da Definição do Menu Cadastro e Tabelas  --> 

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i>
                    <span>Agenda / Atividades</span>            
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?= base_url() ?>mural/exibir">
                            <i class="fa fa-bullhorn text-yellow"></i> 
                            <span>Mural de Recados</span>
                            <span class="pull-right-container">
                                <span class="label label-info pull-right">
                                    <?php echo $this->db->count_all('mural'); ?>
                                </span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"></i> 
                            <span>Agenda de Telefones</span>
                            <span class="pull-right-container">
                                <span class="label label-danger pull-right"><?php echo $this->db->count_all('telefones'); ?></span>
                            </span>
                        </a>
                    </li>                        
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"></i> 
                            <span>Calendário</span>
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right"><?php echo $this->db->count_all('cargos'); ?></span>
                            </span>
                        </a>
                    </li>                        
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"></i> 
                            <span>Tarefas</span>
                            <span class="pull-right-container">
                                <span class="label label-warning pull-right"><?php echo $this->db->count_all('tarefas'); ?></span>
                            </span>
                        </a>
                    </li>                        
                </ul>
            </li>       

            <li class="header">MÓDULOS OPCIONAIS</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>Gestão do Estoque</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Produtos</a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Tabelas de Apoio
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#n"><i class="fa fa-circle-o"></i> Ficha Técnica</a></li>
                </ul>
            </li>    


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>CRM Sytem</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Produtos</a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Tabelas de Apoio
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#n"><i class="fa fa-circle-o"></i> Ficha Técnica</a></li>
                </ul>
            </li>    

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>Central de Compras</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Produtos</a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Tabelas de Apoio
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#n"><i class="fa fa-circle-o"></i> Ficha Técnica</a></li>
                </ul>
            </li>    

            <li class="header">MARKETING</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>Campanhas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>Datas Festivas</a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> 
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Black Friday</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Fidelização
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Clube VIP</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Promoções Cliente</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Promoções Produto</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#n"><i class="fa fa-circle-o"></i> Ficha Técnica</a></li>
                </ul>
            </li>    



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
