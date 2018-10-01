<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//
$dadosLogin = $this->session->userdata('logged_in');
$empresaLogin = $this->session->userdata('empresa_login');
$foto = 'assets/img/fotos/' . $dadosLogin['fotoUsuario'];
// $logoEmpresa = 'assets/img/fotos/' . $empresaLogin['logo'];
//var_dump( $empresaLogin);
?>

<div class = "col-sm-12 bg-gray " style = "padding-top: 7px;padding-bottom: 7px">
    <div class = "col-sm-3" >
        <div style = "padding-left: 3px; margin-left: -17px">
            <a class = "btn btn-flat btn-primary  margin-r-5"  href = "#modal-exibir-recado" 
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
               > <i class = "fa fa-2x fa-eye"></i>
            </a>
        </div>
    </div> <!--/.col -->

    <?php if ($mural->status != '3') { ?>

        <div class = "col-sm-3">
            <div style = "padding-left: 3px; margin-left: -10px">
                <a class = "btn btn-flat btn-danger  margin-r-5" href = "deletarRecado"
                   title = "Deletar um recado.." id = "deletarRecado"
                   data-whatever-id = "<?php echo $mural->id; ?>"
                   data-whatever-assunto = "<?php echo $mural->assunto; ?>"
                   data-whatever-recado = "<?php echo $mural->recado; ?>"
                   data-whatever-lido = "<?php echo $mural->lido; ?>"
                   data-whatever-prioridade = "<?php echo $mural->prioridade; ?>"
                   data-whatever-envio = "<?php echo $envio; ?>"
                   data-whatever-resposta = "<?php echo $mural->resposta; ?>"
                   data-whatever-nome = "<?php echo $quemEnviou; ?>"
                   data-whatever-foto = "<?php echo site_url($pathFoto); ?>"
                   > <i class = "fa fa-2x fa-trash-o"></i>
                </a>
            </div>
        </div> <!--/.col -->                            
        <div class = "col-sm-3">                           
            <div style = "padding-left: 3px; margin-left: -10px">                                                                      
                <a class = "btn btn-flat btn-info  margin-r-5"  href = "#modal-salvar-recado" 
                   data-toggle = "modal"
                   title = "Arquivar um Recado do Mural.." id = "exibirRecado"
                   data-id = "<?php echo $mural->id; ?>"                                                       
                   data-idde = "<?php echo $mural->idDE; ?>" 
                   data-idpara = "<?php echo $mural->idPara; ?>"                                     
                   data-idempresa = "<?php echo $empresaLogin['id']; ?>"
                   data-assunto = "<?php echo $mural->assunto; ?>"
                   data-recado = "<?php echo $mural->recado; ?>"
                   data-lido = "<?php echo $mural->lido; ?>"
                   data-prioridade = "<?php echo $mural->prioridade; ?>"
                   data-envio = "<?php echo $envio; ?>"
                   data-resposta = "<?php echo $mural->resposta; ?>"
                   data-nome = "<?php echo $quemEnviou; ?>"
                   data-foto = "<?php echo site_url($pathFoto); ?>"
                   data-enviouresposta = "<?php echo $mural->enviouResposta; ?>"                                                       
                   data-dataorigem = "<?php echo $mural->dataOrigem; ?>"                  
                   data-dataresposta = "<?php echo $mural->dataResposta; ?>" 
                   data-datarecado = "<?php echo $mural->criado; ?>" 
                   > <i class = "fa fa-2x fa-database"></i>
                </a>
            </div>
        </div> <!--/.col -->

        <div class = "col-sm-3">                                                        
            <div style = "padding-left: 3px; margin-left: -10px">                                                                      
                <a class = "btn btn-flat btn-success  margin-r-5"  href = "#modal-enviar-resposta" 
                   data-toggle = "modal" id = "enviarResposta" title = "Salvar e Enviar a resposta ao Remetente.." 
                   data-id = "<?php echo $mural->id; ?>"                                                       
                   data-idde = "<?php echo $mural->idDE; ?>" 
                   data-idpara = "<?php echo $mural->idPara; ?>"                                     
                   data-idempresa = "<?php echo $empresaLogin['id']; ?>"
                   data-assunto = "<?php echo $mural->assunto; ?>"
                   data-textorecado = "<?php echo $mural->recado; ?>"
                   data-lido = "<?php echo $mural->lido; ?>"
                   data-prioridade = "<?php echo $mural->prioridade; ?>"
                   data-envio = "<?php echo $envio; ?>"
                   data-textoresposta = "<?php echo $mural->resposta; ?>"
                   data-nome = "<?php echo $quemEnviou; ?>"
                   data-foto = "<?php echo site_url($pathFoto); ?>"
                   data-enviouresposta = "<?php echo $mural->enviouResposta; ?>"                                                       
                   data-dataorigem = "<?php echo $mural->dataOrigem; ?>"                  
                   data-dataresposta = "<?php echo $mural->dataResposta; ?>" 
                   data-datarecado = "<?php echo $mural->criado; ?>" 
                   > <i class = "fa fa-2x fa-bullhorn"></i>
                </a>
            </div>
        </div> <!--/.col -->                                                                                              
    <?php } ?>