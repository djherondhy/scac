//
//
//
//-------------FUNÇÕES BUSCA---------------------
//
//
//

$('#buscaAtividade').submit(function(e){
    e.preventDefault();

    var _busca = $('#busca_atv').val();
    
    $.ajax({
        url: '../config/selectWhere.php',
        method: 'POST',
        data: {tabela : 'atividades', atvBusca : _busca},
        dataType: 'json'
    }).done(function(result){
       

        function getBuscaAtividades(){
         
            var box_comm = document.querySelector('.atv_table');
            while(box_comm.firstChild){
                box_comm.firstChild.remove();
            }
            $('#atv_table').append('<tr class=title><td>Data</td><td>Descrição</td><td>Ação</td></tr>');
    
            for(var i = 0; i< result.length; i++){
                $('#atv_table').append('<tr>'
                +'<td>'+ result[i].data +'</td>'
                +'<td>'+ result[i].descricao +'</td>'
                +'<td><button class="bt-action bt-del" onclick="delAtividades('+ result[i].id +')"> <i class="bx bxs-trash"></i></button></td>'
                +'</tr>');
    
    
            }

        }
        getBuscaAtividades();

    });

});

$('#buscaMaquinas').submit(function(e){
    e.preventDefault()
   var _busca  = $('#busca_maq').val();
   $.ajax({
    url: '../config/selectWhere.php',
    method: 'POST',
    data: {tabela : 'maquinas', maquinasBusca : _busca},
    dataType: 'json'
   }).done(function(result){

     
    function getBuscaMaquinas(){
        var box = document.querySelector('.table-maquinas');
        while(box.firstChild){
            box.firstChild.remove();
        }

        $('#table-maquinas').append('<tr class=title><td>Descrição</td><td>Valor</td><td>Vida Útil</td><td>Ano de Compra</td><td>Ação</td></tr>');

        for(var j = 0; j < result.length; j++){
            $('#table-maquinas').append('<tr>'
            +'<td>'+result[j].item +'</td>'
            +'<td>'+result[j].valor +'</td>'
            +'<td>'+result[j].vida_util +'</td>'
            +'<td>'+result[j].ano_compra +'</td>'
            +'<td>'
            +'<button class="bt-action bt-edit" onclick = "updateMaquinas('+result[j].id +')"><i class="bx bxs-edit"></i></button>'
            +'<button class="bt-action bt-del" onclick = "delMaquinas('+result[j].id +')"> <i class="bx bxs-trash"></i></button>'
            +'</td></tr>');
        }
   

    }
     getBuscaMaquinas();

   });
});


$('#buscaEntrada').submit(function(e){
    e.preventDefault()
   var _busca  = $('#entrada').val();
   $.ajax({
    url: '../config/selectWhere.php',
    method: 'POST',
    data: {tabela : 'entrada_saida', entradaBusca : _busca},
    dataType: 'json'
   }).done(function(result){

     
    function getBuscaEntrada(){
        var box = document.querySelector('.table-entrada');
        while(box.firstChild){
            box.firstChild.remove();
        }

        $('#table-entrada').append('<tr class=title> <td>Animal</td> <td>Tipo de Movimentação</td><td>Data da Movimentação</td> <td>Observações</td> <td>Ação</td> </tr>');

        for(var j = 0; j < result.length; j++){
            $('#table-entrada').append('<tr>'
            +'<td>'+result[j].animal +'</td>'
            +'<td>'+result[j].movimentacao +'</td>'
            +'<td>'+result[j].data +'</td>'
            +'<td>'+result[j].observacao +'</td>'
            +'<td>'
            +'<button class="bt-action bt-edit" onclick ="updateEntrada('+result[j].id +')"><i class="bx bxs-edit"></i></button>'
            +'<button class="bt-action bt-del" onclick = "delEntrada('+result[j].id +')"> <i class="bx bxs-trash"></i></button>'
            +'</td></tr>');
        }
   
   

    }
     getBuscaEntrada();

   });
});

$('#buscaEstoque').submit(function(e){
    e.preventDefault()
   var _busca  = $('#buscaInput').val();
   $.ajax({
    url: '../config/selectWhere.php',
    method: 'POST',
    data: {tabela : 'estoque', entradaBusca : _busca},
    dataType: 'json'
   }).done(function(result){
    console.log(result);
        var box = document.querySelector('.estoque-table');
        while(box.firstChild){
            box.firstChild.remove();
        }

        $('#estoque-table').prepend(' <tr class=title>'
        +'<td>Data de Registro</td>'
        +'<td>Produto</td>'
        +'<td>Categoria</td>'
        +'<td>Validade</td>'
        +'<td>Descrição</td>'
        +'<td>Valor(R$)</td>'
        +'<td>Peso(KG)</td>'
        +'<td>Ação</td>'
    +'</tr>');

        for(var j = 0; j < result.length; j++){
            $('#estoque-table').append('<tr>'
            +'<td>'+result[j].data_registro +'</td>'
            +'<td>'+result[j].produto +'</td>'
            +'<td>'+result[j].categoria +'</td>'
            +'<td>'+result[j].validade +'</td>'
            +'<td>'+result[j].descricao +'</td>'
            +'<td>'+result[j].valor +'</td>'
            +'<td>'+result[j].peso +'</td>'
            +'<td>'
            +'<button class="bt-action bt-edit" onclick ="updateEstoque('+result[j].id +')"><i class="bx bxs-edit"></i></button>'
            +'<button class="bt-action bt-del" onclick = "delEstoque('+result[j].id +')"> <i class="bx bxs-trash"></i></button>'
            +'</td></tr>');
        }
     
        
            if(result.length == 0){
                notify('Nenhum Registro Encontrado');
            }
        

   });
});


$('#animalBusca').submit(function(e){
    e.preventDefault()
   var _busca  = $('#buscaInput').val();


   $.ajax({
    url: '../config/selectWhere.php',
    method: 'POST',
    data: {tabela : 'animal', entradaBusca : _busca},
    dataType: 'json'
   }).done(function(result){
    console.log(result);
    var box = document.querySelector('.animal-table');
    while(box.firstChild){
        box.firstChild.remove();
    }

    $('#animal-table').prepend(' <tr class=title>'
    +'<td>Data de Registro</td>'
    +'<td>Apelido</td>'
    +'<td>Nº de Registro</td>'
    +'<td>Categoria</td>'
    +'<td>Sexo</td>'
    +'<td>Raça(R$)</td>'
    +'<td>Ação</td>'
     +'</tr>');

    for(var j = 0; j < result.length; j++){
        $('#animal-table').append('<tr>'
        +'<td>'+result[j].data_registro +'</td>'
        +'<td>'+result[j].apelido +'</td>'
        +'<td>'+result[j].numero_registro +'</td>'
        +'<td>'+result[j].categoria +'</td>'
        +'<td>'+result[j].sexo +'</td>'
        +'<td>'+result[j].raca +'</td>'
        +'<td>'
        +'<button class="bt-action bt-edit" onclick ="updateAnimal('+result[j].id +')"><i class="bx bxs-edit"></i></button>'
        +'<button class="bt-action bt-del" onclick = "delAnimal('+result[j].id +')"> <i class="bx bxs-trash"></i></button>'
        +'</td></tr>');
    }
        
            if(result.length == 0){
                notify('Nenhum Registro Encontrado');
            }
        

   });
   
});




