function carregarLinha(result){
    var tabela = $('#inv_tabela').DataTable()
    
    if(Array.isArray(result)) {        
        $(result).each(function (index, item) { 
        tabela.row.add([item.id, item.nome, item.descricao, formatarDate(item.created_at), 
            formatarDate(item.data_inicio_obra), item.cidade]).draw().node();
        });        
    }
}
function tabelaProjetos() {
    $.ajax({
        method: 'GET',
        url: "/projeto/ajaxProjeto",
        dataType: 'json',
        success: carregarLinha,
        beforeSend: function () {

        },
        error: function (result) {
            console.log("Erro" + result)
        }
    });

    
}

$(document).ready(function () {
    $('#inv_tabela').DataTable();
    tabelaProjetos();
});