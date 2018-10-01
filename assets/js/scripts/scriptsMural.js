/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {

    $('#cancelar-inclusao').click(function () {
        var url = $('#cancelar-inclusao').attr('data-url');
        $(location).attr('href', url);
    });

    $('[data-toggle="popover"]').popover(function () {
        $('#helpBlock2').hide();

    });

    $('.mypopover').popover();

    $('#confirmar-inclusao').on('click', function () {
        ConfirmarInclusaoMural();
    })

    $('#prioridade').on('change', function () {
        SelectPrioridade(this.value, this);
    })

    $('#btn-mural-exibir').on('click', function () {
        SubmitExibirRecado();
    })

    $('#btn-mural-enviar').on('click', function () {
        SubmitEnviarResposta();
    })

    function SelectPrioridade(index, el) {
        if (el.value == "-1") {
            alert("Favor escolher o Nível de Prioridade!");
            el.focus();
        }
    }

    function SubmitExibirRecado() {
        var recado = $('#recado').val();
        var prior = $('#prioridade').val();
        var resposta = $('#resposta').val();
        return true;
    }

    function ConfirmarInclusaoMural() {
        var recado = $('#recado-incluir').val();
        var prior = $('#prioridade-incluir').val();
        var destinatario = $('#destinatario-incluir').val();

        indicErro = 0;

        if (destinatario === "-1") {
            msg1 = "Favor selecionar o Destinatario da mensagem...";
            indicErro = 1;
            $('#destinatario-group').attr('class', 'form-group has-error');
            $("#msgDestinatario").text(msg1).show();
        } else {
            msg1 = '';
            $('#destinatario-group').attr('class', 'form-group');
            $("#erroPrioridade").text(msg1).show();
        }

        if (recado === "") {
            msg2 = "O campo de resposta está em branco. Favor digitar a sua resposta..!";
            indicErro = 2;
            $('#resposta-group').attr('class', 'form-group has-error');
            $("#msgResposta").text(msg1).show();
        } else {
            msg2 = '';
            $('#resposta-group').attr('class', 'form-group');            
            $("#msgResposta").text(msg2).show();
        }

        if (indicErro != 0) {
            return false;
        }

        var resposta = confirm("Deseja realmente incluir  o recado no Mural?");
        if (resposta == true) {
            var url = $('#cancelar-inclusao').attr('data-url');
            $(location).attr('href', url);
            // return true;
        }
        event.preventDefault();
        return false;
    }

    function SubmitEnviarResposta() {
        var recado = $('#recado').val();
        var prior = $('#prioridade').val();
        var resposta = $('#resposta').val();
        if (enviouResposta === 1) {
            alert('Envio foi cancelado pelo motivo de já ter sido enviado uma resposta para este Recado');
            return false;
        }

        indicErro = 0;
        if (prior === "-1") {
            msg1 = "Favor escolher o Nível de Prioridade!";
            indicErro = 1;
            $('#prioridade').focus();
            $("#erroPrioridade").text(msg1).show();
        } else {
            msg1 = '';
            $("#erroPrioridade").text(msg1).show();
        }

        if (resposta === "") {
            msg2 = "O campo de resposta está em branco. Favor digitar a sua resposta..!";
            indicErro = 2;
            $('#resposta').focus();
            $("#erroRecado").text(msg2).show();
        } else {
            msg2 = '';
            $("#erroRecado").text(msg2).show();
        }

        if (indicErro != 0) {
            return false;
        }

        var resposta = confirm("Deseja realmente enviar a resposta ao Remetente?");
        if (resposta == true) {
// window.location.href = "enviarMural";
// window.location.replace("enviarResposta");         
            $("form").submit();
            return true;
        }
        event.preventDefault();
        return false;
    }

    // ==========  MODAL DE EXIBIÇÃO PARA ENVIO DA RESPOSTA PARA UM RECADO =========
    $('#modal-enviar-resposta').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button or href that triggered the modal

        var id = button.data('id');
        var idDE = button.data('idde');
        var recado = button.data("textorecado");
        var idPara = button.data("idpara");
        var idEmpresa = button.data("idempresa");
        var assunto = button.data("assunto");
        var lido = 2;
        var prioridade = button.data("prioridade");
        var envio = button.data("envio");
        var resposta = button.data("resposta");
        var nome = button.data("nome");
        var foto = button.data("foto");
        var enviouResposta = button.data("enviouresposta");
        var criado = button.data("datarecado");
        var dataOrigem = button.data("dataorigem");
        var dataResposta = button.data("dataresposta");
        var textoResposta = button.data("textoresposta");

//        document.getElementById('b').innerHTML =
//     '<table><tr><td><form id="c"><input id="d"></table>' +
//     '<input id="e">';

        var modal = $(this)

        modal.find('.modal-title').text('::  Enviar Resposta sobre o Recado No. 00' + id + '  ::');
        modal.find('.modal-remetente').text('Destinatário :  ' + nome);
        modal.find('.modal-codigo').text('Assunto : (RE) ' + assunto);
        modal.find('#id').val(id);
        modal.find('#idEmpresa').val(idEmpresa);
        modal.find('#idDE').val(idDE);
        modal.find('#idPara').val(idPara);
        modal.find('#criado').val(criado);
        modal.find('#lido').val('2');
        modal.find('#assunto').val(assunto);
        modal.find('#textoAssunto').val(assunto);
        modal.find('#recado').val(recado);
        modal.find('#textoRecado').val(recado);
        modal.find('#prioridade').val(prioridade);
        modal.find('#enviouResposta').val('1');
        modal.find('#idOrigem').val(id);
        modal.find('#dataOrigem').val(dataOrigem);
        modal.find('#dataResposta').val(dataResposta);
        modal.find('#resposta').val(textoResposta);
        var img = $('#img-modal-mural');
        //   img.attr("src", img.attr("src").replace("avatar.png", foto));
        $('#img-modal-mural').attr('src', foto);
    });

    // ==========  MODAL DE EXIBIÇÃO PARA CONSULTA DO RECADO =========
    $('#modal-exibir-recado').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button or href that triggered the modal

        var id = button.data('id');
        var idDE = button.data('idde');
        var idPara = button.data("idpara");
        var idEmpresa = button.data("idempresa");
        var assunto = button.data("assunto");
        var recado = button.data("recado");
        var lido = button.data("lido");
        var status = button.data("status");
        var prioridade = button.data("prioridade");
        var envio = button.data("envio");
        var resposta = button.data("resposta");
        var nome = button.data("nome");
        var foto = button.data("foto");
        var enviouResposta = button.data("enviouresposta");
        var criado = button.data("datarecado");
        var dataOrigem = button.data("dataorigem");
        var dataResposta = button.data("dataresposta");

        if (enviouResposta === 1) {
            $('#aba-resposta').show();
        } else {
            $('#aba-resposta').hide();
        }

        var modal = $(this)

        modal.find('.modal-title').text('::  Consultar o Recado No. 00' + id + '  ::');
        modal.find('.modal-remetente').text('Remetente :  ' + nome);
        modal.find('.modal-codigo').text('Assunto : ' + assunto);

        if (lido === 1) {
            $('#lido-exibir').text(':::  Lido  :::');
        } else {
            $('#lido-exibir').text(':::  Nao Lido  :::');
        }

        $('#recado-exibir').val(recado);
        $('#prioridade-exibir').val(prioridade);
        $('#status-exibir').val(status);
        $('#criado-exibir').val(criado);

        $('.trata-data-exibir').each(function () {
            var todayDate = new Date(this.value);
            var format = "AM";
            var hour = todayDate.getHours();
            var min = todayDate.getMinutes();
            if (hour > 12) {
                format = "PM";
            }
            if (hour > 12) {
                hour = hour - 12;
            }
            if (hour == 0) {
                hour = 12;
            }
            if (min < 10) {
                min = "0" + min;
            }
            this.value = (todayDate.getDate() + "/" + (todayDate.getMonth() + 1) + "/" + todayDate.getFullYear()
                    + " " + hour + ":" + min + " " + format);
            //var data = new Date(this.value);
            //this.value = [data.getDate(), data).getMonth() + 1, data.getFullYear()].join('/') + 'as ' +
            //        [data.getDate(), data.getMonth() + 1, data.getFullYear()].join('-');
        });

//        modal.find('#enviouResposta').val(enviouResposta);
//        modal.find('#idOrigem').val(id);
//        modal.find('#dataOrigem').val(dataOrigem);
//        modal.find('#dataResposta').val(dataResposta);
//        modal.find('#resposta').val(resposta);

        var img = $('#img-modal-mural');
        // img.attr("src", img.attr("src").replace("avatar.png", foto));
        $('#img-exbir-mural').attr('src', foto);
        $('#img-exbir-mural').attr('alt', nome);
    });

    $('.aba-panel:first').show();

    $('#nav-abas a').click(function () {
        $('.aba-panel').hide();
        var div = $(this).attr('href');
        $(div).show();
        return false;
    });

}); //  Final Geral