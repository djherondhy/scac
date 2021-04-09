//
//
//
//-------------FUNÇÕES DELETE---------------------
//
//
//

function delAtividades(id){
    var _id = id;
    $.ajax({
        url: '../config/delete.php',
        method: 'POST',
        data: {tabela: 'atividades', id : id},
        dataType: 'json'
    }).done(function(result){
        
        notify(result);
        getAtividades();
        countAtividades();
    });
}

function delMaquinas(id){
    var _id = id;
    $.ajax({
        url: '../config/delete.php',
        method: 'POST',
        data: {tabela: 'maquinas', id : id},
        dataType: 'json'
    }).done(function(result){
      
        notify(result);
        getMaquinas();
        countMaquinas();
    });
}

function delEntrada(id){
    var _id = id;
    $.ajax({
        url: '../config/delete.php',
        method: 'POST',
        data: {tabela: 'entrada_saida', id : id},
        dataType: 'json'
    }).done(function(result){
      
        notify(result);
        getEntrada();
        
    });
}

function delEstoque(id){
    var _id = id;
    $.ajax({
        url: '../config/delete.php',
        method: 'POST',
        data: {tabela: 'estoque', id : id},
        dataType: 'json'
    }).done(function(result){
      
        notify(result);
        getEstoque();
        countVacina();
        countRacao();
        countInsumo();

        
    });
}

function delAnimal(id){
    var _id = id;
    $.ajax({
        url: '../config/delete.php',
        method: 'POST',
        data: {tabela: 'animal', id : id},
        dataType: 'json'
    }).done(function(result){
      
        notify(result);
        getsAnimal();
        countAnimal();
        
    });
}