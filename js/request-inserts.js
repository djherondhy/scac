

//
//
//
//-------------FUNÇÕES INSERTS---------------------
//
//
//

$('#formAtividade').submit(function(e){

    e.preventDefault();

    var _desc = $('#descricao_atividade').val();
  

    $.ajax({
         url : '../config/insert-atividade.php',
         method: 'POST',
         data: {descricao_atividade: _desc},
         dataType: 'json'
    }).done(function(result){
        $('#descricao_atividade').val('');
       
        notify(result);
        getAtividades();
        countAtividades();
    });

});

$('#formMaquina').submit(function(e){
    e.preventDefault();

    var _item = $('#item').val();
    var _valor = $('#valor').val();
    var _vida_util = $('#vida_util').val();
    var _ano_compra = $('#ano_compra').val();

    $.ajax({
        url: '../config/insert.php',
        method: 'POST',
        data: {tabela : 'maquinas', item: _item, valor: _valor, vida_util: _vida_util, ano_compra: _ano_compra},
        dataType: 'json'
    }).done(function(result){
        
        notify(result);
        countMaquinas();
        getMaquinas();
    });
});

$('#entradaForm').submit(function(e){
    e.preventDefault();
    var _animal = $('#animal').val();
    var _movimentacao = $('#movimentacao').val();
    var _data = $('#data').val();
    var _obs = $('#observacao').val();
   
    $.ajax({
        url: '../config/insert.php',
        method: 'POST',
        data:{tabela : 'entrada_saida',animal: _animal, movimentacao: _movimentacao, data: _data, observacao: _obs},
        dataType: 'json'
    }).done(function(result){
        console.log(result);
        notify(result);
        getEntrada();
    });
});


$('#formEstoque').submit(function(e){
    e.preventDefault();
   var _produto = $('#produto').val();
   var _categoria = $('#categoria').val();
   var _validade = $('#validade').val();
   var _descricao = $('#descricao').val();
   var _valor = $('#valor').val();
   var _peso = $('#peso').val();

   $.ajax({
    url: '../config/insert.php',
    method: 'POST',
    data: {tabela: 'estoque', produto: _produto, categoria: _categoria, validade: _validade, descricao: _descricao, valor: _valor, peso: _peso},
    dataType: 'json'
   }).done(function(result){
    console.log(result);
    notify(result);
    getEstoque();
    countVacina();
    countRacao();
    countInsumo();
   });
});

$('#formAnimal').submit(function(e){
    e.preventDefault();
    var _apelido = $('#apelido').val();
    var _nome_registro = $('#nome_registro').val();
    var _numero_registro = $('#numero_registro').val();
    var _sexo = $('#sexo').val();
    var _categoria = $('#categoria').val();
    var _raca  = $('#raca').val();
    var _nome_pai  = $('#nome_pai').val();
    var _nome_mae = $('#nome_mae').val();
    var _data_entrada  = $('#data_entrada').val();
    var _peso_entrada  = $('#peso_entrada').val();
    var _peso_atual = $('#peso_atual').val();
    var _nascimento = $('#nascimento').val();
    var _idade_entrada = $('#idade_entrada').val();
    var _idade_atual = $('#idade_atual').val();
    var _valor_entrada = $('#valor_entrada').val();
    var _valor_atual = $('#valor_atual').val();
    var _observacao = $('#observacao').val();


    $.ajax({
        url: '../config/insert.php',
        method: 'POST',
        data:{tabela: 'animal',
            apelido : _apelido,
            nome_registro: _nome_registro,
            numero_registro: _numero_registro,
            sexo: _sexo,
            categoria: _categoria,
            raca: _raca,
            nome_pai :_nome_pai,
            nome_mae : _nome_mae,
            data_entrada: _data_entrada,
            peso_entrada: _peso_entrada,
            peso_atual: _peso_atual,
            nascimento: _nascimento,
            idade_entrada: _idade_entrada,
            idade_atual: _idade_atual,
            valor_entrada: _valor_entrada,
            valor_atual: _valor_atual,
            observacao: _observacao
            },
        dataType: 'json',

    }).done(function(result){
        console.log(result);
       notify(result);
       getsAnimal();
       countAnimal();
    });
  
    
});