<?php
$dadosLogin = $this->session->userdata('logged_in');
$empresaLogin = $this->session->userdata('empresa_login');
$fotoLogin = 'assets/img/fotos/' . $dadosLogin['fotoUsuario'];

$idLogin = $dadosLogin['idUsuario'];
?>
<ul class="dropdown-menu dropdown-menu-left " aria-labelledby="messages-menu" style="background-color: blue">
    <?php
//    $idLogin = $dadosLogin["idUsuario"];
//    $this->load->model('model_mural');
//    $resultMural = $this->model_mural->contarNaoLidos();

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

    if (( isset($resultMural) ) && (!empty($resultMural) ) && ( $qtdeMSG > 0 )) {
        ?>    
        <li class="header" style="background-color: blue; color: white">   
            <b>Você tem <?php echo $qtdeMSG; ?> mensagens não lidas </b>
        </li>
        <li>            
            <ul class="menu ">
                <?php
                foreach ($resultMural->result() as $mural) {

                    $envio = date('d/m/y h:i:s', strTOtime($mural->criado));

                    if ($mural->prioridade == '1') {   // Prioridade: Normal 
                        $prioridade = '';
                        $corPrioridade = 'btn-';
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

                    $this->db->select('*');
                    $this->db->where('id', $mural->idDE);
                    $resultUsrDE = $this->db->get('usuarios', 1);
                    if ((isset($resultUsrDE)) && (!empty($resultUsrDE))) {
                        foreach ($resultUsrDE->result() as $usrDE) {
                            if ($usrDE->foto != '') {
                                $foto = $usrDE->foto;
                                $pathFoto = 'assets/img/fotos/' . $usrDE->foto;
                            } else {
                                $foto = "avatar.png";
                                $pathFoto = 'assets/img/avatar/avatar.png';
                            }
                            $quemEnviou = $usrDE->nome;
                        }
                    } else {
                        $foto = "avatar.png";
                        $pathFoto = 'assets/img/avatar/avatar.png';
                        $quemEnviou = 'Não achei nome de remetente';
                    }
                    ?>

                    <li>   <!-- Inicio de um Recado / Messagem -->
                        <a class = "btn btn-flat margin-r-5"  href = "#modal-exibir-recado" style="background-color: #d4d4d4; color: #000"
                           data-toggle = "modal"  id = "exibirRecado" title = "Exibir um Recado do Mural.." 
                           data-id = "<?php echo $mural->id; ?>"                                                       
                           data-idde = "<?php echo $mural->idDE; ?>" 
                           data-idpara = "<?php echo $mural->idPara; ?>"                                     
                           data-idempresa = "<?php echo $empresaLogin['id']; ?>"
                           data-assunto = "<?php echo $mural->assunto; ?>"
                           data-recado = "<?php echo $mural->recado; ?>"
                           data-lido = "<?php echo $mural->lido; ?>"
                           data-status = "<?php echo $mural->status; ?>"
                           data-prioridade = "<?php echo $mural->prioridade; ?>"
                           data-envio = "<?php echo $envio; ?>"
                           data-resposta = "<?php echo $mural->resposta; ?>"
                           data-nome = "<?php echo $quemEnviou; ?>"
                           data-foto = "<?php echo site_url($pathFoto); ?>"
                           data-enviouresposta = "<?php echo $mural->enviouResposta; ?>"                                                       
                           data-dataorigem = "<?php echo $mural->dataOrigem; ?>"                  
                           data-dataresposta = "<?php echo $mural->dataResposta; ?>" 
                           data-datarecado = "<?php echo $mural->criado; ?>" 
                           >                              
                            <small class="pull-right"><i class="fa fa-clock-o"></i> 5 mins</small>        

                            <div class="text-left text-bold text-primary"> 
                                <h5>  <B> Enviado por:</B>  <small><?php echo $quemEnviou ?></small></h5>
                            </div>     

                            <div class="pull-left">                                            
                                <img src="<?php echo site_url($pathFoto); ?>" class="img-circle" alt="Foto do Usuário">
                            </div>

                            <div class="text-left text-bold">                                                        
                                <h5>
                                    <span class = " <?php echo $corPrioridade; ?> text-center" 
                                          style = "width: 80px; font-weight: bold">
                                              <?php echo '   ' . $prioridade . '   '; ?>
                                    </span>
                                </h5>
                                <?php
                                $part1 = substr($mural->assunto, 0, 31);
                                $part2 = substr($mural->assunto, 31, 19);
                                ?>          
                                <div class="h4 myDescription-text" style="color: #000">

                                    <small>
                                        <?php // echo $part1; ?><br>
                                        <?php // echo $part2; ?>
                                        <?php echo trim($mural->assunto); ?>
                                    </small>

                                </div>
                            </div>    
                        </a>
                    </li>  <!-- Final de um Recado / Messagem -->

                <?php } ?>

            </ul>
        </li>
        <li class="footer ">
            <div class='h4 text-center'>
                <a href="<?= base_url() ?>mural/exibir" class="text-bold text-yellow">Veja todos os recados ...</a>
            </div>
        </li>    
    <?php } else { ?>
        <li >
            <div class='h4 text-black text-center'>
                <a href="#">Não existem recados com status de NÃO LIDO</a>
            </div>
        </li>    
    <?php } ?>

</ul>

