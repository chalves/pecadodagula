/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function () {
    
    $('#modal-desbloquear-cargo').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('whatever-id')
        var descricao = button.data('whatever-descricao')
        var modal = $(this)
        
        modal.find('.modal-title').text('Código :  ' + id)
        modal.find('#name-descricao').val(descricao)
        modal.find('#name-id-hidden').val(id)
    })

    $('#modal-bloquear-cargo').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('whatever-id')
        var descricao = button.data('whatever-descricao')        
        var modal = $(this)
        
        modal.find('.modal-title').text('Código :  ' + id)
        modal.find('#name-descricao').val(descricao)
        modal.find('#name-id-hidden').val(id)
    })

    $('#modal-alterar-cargo').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('whatever-id')
        var descricao = button.data('whatever-descricao')        
        var modal = $(this)
        
        modal.find('.modal-title').text('Código :  ' + id)
        modal.find('#name-descricao').val(descricao)
        modal.find('#name-id-hidden').val(id)
    })

    $('#modal-excluir-cargo').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('whatever-id')
        var descricao = button.data('whatever-descricao')        
        var modal = $(this)
        
        modal.find('.modal-title').text('Código :  ' + id)
        modal.find('#name-descricao').val(descricao)
        modal.find('#name-id-hidden').val(id)
    })

    $('#tablecargo').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "stateSave": false,
        "pagingType": "full_numbers",
        "autoWidth": false,
        "scrollX": true,
        "pageLength": 10,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        buttons: [
            {
                extend: 'excel',
                text: 'Salvar página atual',
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                }
            },
            {
                extend: 'pdf',
                text: 'Salvar página atual',
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                }
            },
            {
                extend: 'print',
                text: 'Imprimir página atual',
                autoPrint: true,
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                }
            }
        ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "decimal": ",",
            "thousands": ".",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
});

