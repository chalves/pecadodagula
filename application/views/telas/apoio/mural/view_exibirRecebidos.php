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
// $logoEmpresa = 'assets/img/fotos/' . $empresaLogin['logo'];
//var_dump( $empresaLogin);
?>
<?php
if ($this->session->userdata('logged_in')) {
    $dados ['resultadoMural'] = $resultadoMural;
    $dados['opcaoView'] = 'Mural - Recebidos';
    $dados ['telaativa'] = 'Apoio';
    $dados['opcaoMenu'] = 'Mural';
    $this->load->model('model_mural');
    $resultadoMural = $this->model_mural->buscarRecebidos();

    if (( isset($resultadoMural) ) && (!empty($resultadoMural) )) {
        foreach ($resultadoMural as $mural) {
            //  Recupera dados de quem enviou o recado
            $this->db->select('*');
            $this->db->where('id', $mural->idDE);
            $resultUsrDE = $this->db->get('usuarios', 1);
            if ((isset($resultUsrDE)) && (!empty($resultUsrDE))) {
                $quemEnviou = '**  Anônimo **';
                $cargo = '** ?????  **';
                foreach ($resultUsrDE->result() as $usrDE) {
                    if ($usrDE->foto != '') {
                        $foto = $usrDE->foto;
                        $pathFoto = 'assets/img/fotos/' . $usrDE->foto;
                    } else {
                        $foto = "avatar.png";
                        $pathFoto = 'assets/img/avatar/avatar.png';
                    }
                    $quemEnviou = $usrDE->nome;
                    $cargo = $usrDE->cargo;
                }   //  Fim Foreacg Usuario De
            } else {
                $foto = "avatar.png";
                $pathFoto = 'assets/img/avatar/avatar.png';
                $quemEnviou = 'Não achei nome de remetente';
            }   //   Fim if  Resultado Usuario De

            if ($mural->lido == '1') {
                $lido = 'Lido';
                $corHeader = 'bg-navy-active';
                $corFooter = 'bg-blue';
                $corTexto = 'bg-navy-active';
            } elseif ($mural->lido == '2') {
                $lido = 'Lido & Respondido';
                $corHeader = 'bg-black';
                $corFooter = 'bg-gray-active';
                $corTexto = 'bg-black';
            } else {
                $lido = 'Não Lido';
                $corHeader = 'bg-green-active';
                $corFooter = 'bg-lime';
                $corTexto = 'bg-green-active';
            }

            if ($mural->prioridade == '1') {   // Prioridade: Normal 
                $prioridade = 'Normal';
                $corPrioridade = 'btn-blue-active';
                $corBotao = 'bg-navy';
            } elseif ($mural->prioridade == '2') {   // Prioridade: Atenção
                $prioridade = 'Importante';
                $corPrioridade = 'bg-yellow  text-navy';
                $corBotao = 'bg-yellow';
            } elseif ($mural->prioridade == '3') {   // Prioridade: Urgente
                $prioridade = 'Urgente';
                $corPrioridade = 'bg-red-active';
                $corBotao = 'bg-red-active';
            } else {
                $prioridade = 'Sem Prioridade';
                $corPrioridade = 'bg-blue-active';
                $corBotao = 'bg-navy';
            }            
            ?>                        
            <div class='widget-user-header <?php echo $corPrioridade; ?>'>
                <div class="col-md-4 ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user" style="height: 400px">
                        <!-- Add the bg color to the header using any of the bg-* classes -->                                    
                        <div class="widget-user-header <?php echo $corHeader; ?>">                                        
                            <h3 class="widget-user-username"><span class="badge bg-yellow-active"><?php echo $mural->id; ?></span><?php echo '   ' . $quemEnviou; ?></h3>
                            <h5 class="widget-user-desc <?php echo $corPrioridade; ?> text-center" style="width: 80px; font-weight: bold"><?php echo $prioridade; ?></h5>
                        </div>
                        <div class="widget-user-image" style="width: 90px; height: 90px">                                         
                            <img class="img-circle" src=" <?php echo site_url($pathFoto); ?>" alt="<?php echo $quemEnviou; ?>">
                        </div>
                        <div class="box-footer <?php echo $corFooter; ?>" style="height: auto" >
                            <div class="row"  style="height: 100px">
                                <div class="col-sm-4 border-right">
                                    <div class="myDescription-block text-center">
                                        <h5 class="myDescription-header text-left">Enviado</h5>
                                        <span>
                                            <small>
                                                <?php
                                                $envio = date('d/m/y h:i:s', strTOtime($mural->criado));
                                                echo $envio;
                                                ?>
                                            </small>
                                        </span>
                                    </div>  <!-- /.description-block -->
                                </div>   <!-- /.col -->
                                <div class="col-sm-8 ">
                                    <div class="myDescription-block">
                                        <h5 class="myDescription-header text-left">Assunto</h5>
                                        <span class="myDescription-text text-left" ><small> <?php echo $mural->assunto; ?> </small> </span>
                                    </div>  <!-- /.description-block -->

                                </div>   <!-- /.col -->
                            </div>  <!-- /.row -->

                            <div class="row"  style="height: 30px">
                                <div class="col-sm-12 border-right">
                                    <div class="myDescription-block <?php echo $corTexto; ?> text-center" style="width: 240px">
                                        <h5><<  <?php echo $lido; ?>  >></h5>                                                 
                                    </div>  <!-- /.description-block -->
                                </div>   <!-- /.col -->
                            </div>  <!-- /.row -->

                            <div class="myDescription-block">                                                
                                <?php if ($mural->enviouResposta == '1') { ?> 
                                    <p>
                                        Resposta enviada em <?php echo date('d/m/y h:i:s', strTOtime($mural->dataResposta)); ?>
                                    </p>                                                                                                 
                                <?php } ?>
                            </div> <!--/.description-block -->
                        </div> <!--/.box Footer -->

                                    <?php include 'view_exibirBotoes.php'; ?> 
                        
                        </div>   <!-- Fim  box-widget widget-user -->
                    </div> <!--/.widget-user -->
                </div> <!--/.col -->
            </div>
            <?php
        }   // Fim Foreach Mural
       } else {   // Fim if Resultado  
        ?> 
        <div class="col-md-4 ">
            <div class = "alert alert-success" role = "alert" style = "width: 350px; margin: 20 auto; padding-top: 10px;">
                Vocë náo existe nenhum Recado no Mural encaminhado para vocë...
            </div>        
        </div>
        <?php
    }
} //
?>
