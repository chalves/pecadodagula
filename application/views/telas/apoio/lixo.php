<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<form id="formTarget" action="enviarResposta" method="POST">
<?php // echo form_open('autentica');  ?>                    
    <div class="box-body">                  
        <div class="form-group">                            
            <label for="recado" class="col-sm-2 control-label">Recado</label>
            <div class="col-sm-12">
                <textarea class="form-control  bg-gray" name="recado" rows="3" cols="40" disabled  id="recado"                                      
                          placeholder="Mensagem do recado "  >Recado: <?php echo set_value('recado'); ?></textarea>                                                        
            </div>
        </div>    <!--  Fim form group  -->

        <div class="form-group">                            
            <label for="prioridade" class="col-sm-2 control-label">Nível de Prioridade</label>
            <div class="col-sm-12">
                <span id="erroPrioridade"  style="background-color: red; color: white"></span>
                <select class="form-control" name='prioridade' id="prioridade"   onselect="testaSelect()">
                    <option value="-1" selected="">Selecione o Nível de Prioridade</option>
                    <option value="0">Sem Prioridade</option>
                    <option value="1">Normal</option>   
                    <option value="2">Importante</option>
                    <option value="3">Urgente</option>
                </select>
            </div>
        </div>    <!--  Fim form group  -->

        <div class="form-group">                                                        
            <label for="resposta" class="col-sm-2 control-label">Resposta</label>
            <div class="col-sm-12">
                <span id="erroRecado" style="background-color: red; color: white"></span>
                <textarea  class="form-control"  name="resposta" rows="3" cols="40" required  id="resposta"
                           placeholder="Digite a sua resposta ... "  >Resposta: <?php echo set_value('resposta'); ?></textarea>                            
            </div>
        </div>    <!--  Fim form group  -->
        <input type="text"  name="idDE" id="idDE" value="<?php echo set_value('idDE'); ?>"> 
        <input type="text"  name="idPara" id="idPara" value="<?php echo set_value('idPara'); ?>"> 
        <input type="text"  name="id" id="id" value="<?php echo set_value('id'); ?>"> 
        <input type="text"  name="idEmpresa" id="idEmpresa" value="<?php echo set_value('idEmpresa'); ?>"> 
        <input type="text"  name="lido" id="lido" value="<?php echo set_value('lido'); ?>"> 
        <input type="text"  name="criado" id="criado" value="<?php echo set_value('criado'); ?>"> 
<?php if (set_value('enviouResposta') == '1') { ?>
            <input type="text"  class="form-control" name="enviouResposta" id="enviouResposta" value="<?php echo set_value('enviouResposta'); ?>">                                                 
            <input type="text"  class="form-control" name="dataResposta" id="dataResposta" value="<?php echo set_value('dataResposta'); ?>"> 
            <input type="text"  class="form-control" name="idOrigem" id="idOrigem" value="<?php echo set_value('idOrigem'); ?>"> 
            <input type="text"  class="form-control" name="dataOrigem" id="dataOrigem" value="<?php echo set_value('dataOrigem'); ?>"> 
<?php } ?>
    </div>   <!--  Fim box body  -->

</form>                                        
<?php
// echo form_close(); ?>