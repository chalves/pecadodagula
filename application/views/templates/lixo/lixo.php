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
                            }
                        } else {
                            $foto = "avatar.png";
                            $pathFoto = 'assets/img/avatar/avatar.png';
                            $quemEnviou = 'Não achei nome de remetente';
                        }
                        ?>
                        <div class="col-md-4">  <!-- Widget: user widget style 1 -->
                            <div class="myBox Box-widget myWidget-user">  <!-- Add the bg color to the header using any of the bg-* classes -->
                                <!--                                <div class="widget-user-header bg-aqua-active">-->
                                <?php
                                if ($mural->lido == '1') {
                                    $lido = 'Lido';
                                    $corFooter = 'bg-navy';
                                    $corTexto = '';
                                } elseif ($mural->lido == '2') {
                                    $lido = 'Respondido';
                                    $corFooter = 'bg-black';
                                    $corTexto = 'text-yellow';
                                } else {
                                    $lido = 'Não Lido';
                                    $corFooter = 'bg-lime-active';
                                    $corTexto = 'bg-yellow text-bold text-red';
                                }

                                if ($mural->prioridade == '1') {   // Prioridade: Normal 
                                    $prioridade = 'Normal';
                                    echo "<div class='widget-user-header bg-green-active'>";
                                } elseif ($mural->prioridade == '2') {   // Prioridade: Atenção
                                    $prioridade = 'Atenção';
                                    echo "<div class='widget-user-header bg-yellow'>";
                                } elseif ($mural->prioridade == '3') {   // Prioridade: Urgente
                                    $prioridade = 'Urgente';
                                    echo "<div class='widget-user-header bg-red-active'>";
                                } else {
                                    $prioridade = 'Sem Prioridade';
                                    echo "<div class='widget-user-header bg-blue-active'>";
                                }
                                ?>

                                <h3 class="widget-user-username"><?php echo $quemEnviou ?></h3>
                                <h5 class="widget-user-desc">
                                    <span class="text-right"><?php echo $prioridade; ?>   
                                        <br>  <?php echo date('d/m/y', strTOtime($mural->criado)); ?>  
                                        <br> <?php echo date('h:i:s', strTOtime($mural->criado)); ?>  
                                    </span>
                                </h5>

                                <!--                                    <p class="myWidget-user-desc pull-right">
                                        <span class="text-right">Enviado:  <?php echo date('d/m/y h:i:s', strTOtime($mural->criado)); ?>   </span>
                                        <br> <span class="text-right">Prioridade:  <?php echo $prioridade; ?>    </span>
                                        <br> <span class="text-right  <?php echo $corTexto; ?> ">Status:  <?php echo $lido; ?>   </span>
                                    </p>                                -->

                            </div>
                            <div class="myWidget-user-image">
                                <img class="myIMG" src="<?php echo $pathFoto ?>" 
                                     alt="<?php echo $quemEnviou ?>" >
                            </div>
                            <div class="myBox-footer <?php echo $corFooter; ?>">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="myDescription-block">
                                            <h5 class="myDescription-header">Recado </h5>
                                            <span class="myDescription-text">
                                                <?php echo substr($mural->recado, 1, 80); ?>
                                            </span>
                                        </div>  <!-- /.description-block -->
                                    </div>   <!-- /.col -->
                                </div>  <!-- /.row -->
                            </div>  <!-- /.box Footer -->
                        </div>  <!-- /.widget-user -->
                    </div> <!-- /.col -->
