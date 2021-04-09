function countAnimal(){

    var box = document.querySelector('.number-animal');
    while(box.firstChild){
        box.firstChild.remove();
    }
    $.ajax({
        url: '../config/count.php',
        method: 'POST',
        data: {tabela : 'animal'},
        dataType: 'json'
    }).done(function(result){
        console.log(result);
        $('#number-animal').append(result);
    });
}

function countEntrada(){

    var box = document.querySelector('.number-entrada');
    while(box.firstChild){
        box.firstChild.remove();
    }
    $.ajax({
        url: '../config/count.php',
        method: 'POST',
        data: {tabela : 'entrada'},
        dataType: 'json'
    }).done(function(result){
        console.log(result);
        $('#number-entrada').append(result);
    });
}

function countSaida(){

    var box = document.querySelector('.number-saida');
    while(box.firstChild){
        box.firstChild.remove();
    }
    $.ajax({
        url: '../config/count.php',
        method: 'POST',
        data: {tabela : 'saida'},
        dataType: 'json'
    }).done(function(result){
        console.log(result);
        $('#number-saida').append(result);
    });
}
function countMaquinas(){
   

    $.ajax({
        url: '../config/count.php',
        method: 'POST',
        data: {tabela : 'maquinas'},
        dataType: 'json'
    }).done(function(result){
     
        var box = document.querySelector('.number-maquinas');
        while(box.firstChild){
            box.firstChild.remove();
        }
        $('#number-maquinas').append(result);
    });
}

function countAtividades(){

    var box = document.querySelector('.number-atv');
        while(box.firstChild){
            box.firstChild.remove();
        }

    $.ajax({
        url: '../config/count.php',
        method: 'POST',
        data: {tabela : 'atividades'},
        dataType: 'json'
    }).done(function(result){
     
        $('#number-atv').append(result);

    });
}

function countRacao(){
    
    var box = document.querySelector('.number-racao');
        while(box.firstChild){
            box.firstChild.remove();
        }


    $.ajax({
        url: '../config/count.php',
        method: 'POST',
        data: {tabela : 'racao'},
        dataType: 'json'
    }).done(function(result){
        console.log(result);
        $('#number-racao').append(result);
    });
}

function countVacina(){
    var box = document.querySelector('.number-vacina');
    while(box.firstChild){
        box.firstChild.remove();
    }
    $.ajax({
        url: '../config/count.php',
        method: 'POST',
        data: {tabela : 'vacina'},
        dataType: 'json'
    }).done(function(result){
        console.log(result);
        $('#number-vacina').append(result);
    });
}

function countInsumo(){

    var box = document.querySelector('.number-insumo');
    while(box.firstChild){
        box.firstChild.remove();
    }
    $.ajax({
        url: '../config/count.php',
        method: 'POST',
        data: {tabela : 'insumo'},
        dataType: 'json'
    }).done(function(result){
        console.log(result);
        $('#number-insumo').append(result);
    });
}

