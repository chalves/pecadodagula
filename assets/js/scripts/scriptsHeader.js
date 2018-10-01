/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function () {
    $('#Modal-Mensagem').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        //          var img = $("#Modal-img img");                        
        var id = button.data('whatever-id')
        var foto = button.data('whatever-foto')
        var assunto = button.data('whatever-assunto')
        var recado = button.data('whatever-recado')
                
        var modal = $(this)

        modal.find('#ModalTitulo').text('Mural Codigo :  ' + id)
        modal.find('#ModalSubTitulo').text('Assunto :  ' + assunto)
        modal.find('#modal-texto').text( recado )

        img.attr("src", img.attr("src").replace("avatar.png", foto));
    })

});





