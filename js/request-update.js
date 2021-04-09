
//
//
//
//-------------FUNÇÕES UPDADE---------------------
//
//
//
$('#formProp').submit(function(e){

    e.preventDefault();

    var _nome = $('#nome').val();
    var _avaliacao_inicial = $('#avaliacao_inicial').val();
    var _avaliacao_final = $('#avaliacao_final').val();
    var _area = $('#area').val();
    var _valor= $('#valor').val();




    $.ajax({
        url: '../config/update.php',
        method: 'POST',
        data:{tabela: 'propriedade', nome: _nome, avaliacao_inicial: _avaliacao_inicial, avaliacao_final: _avaliacao_final, area: _area, valor: _valor},
        dataType: 'json'
    }).done(function(result){
       
        notify(result);
        getPropriedade();
    });

});

//
//
//
//
function updateMaquinas(id){

    onModal('modal-editMaquinas','sub-editMaquinas');
    
    $.ajax({
        url: '../config/selectId.php',
        method: 'POST',
        data: {tabela: 'maquinas', id: id},
        dataType: 'json'
    }).done(function(result){
       
        $('#maquina_id').val(result[0].id);
        $('#edit_item').val(result[0].item);
        $('#edit_valor').val(result[0].valor);
        $('#edit_vida_util').val(result[0].vida_util);
        $('#edit_ano_compra').val(result[0].ano_compra);     
    });
}

$('#editMaquinas').submit(function(e){
    e.preventDefault();
    var _id =  $('#maquina_id').val();;
    var _item = $('#edit_item').val();
    var _valor = $('#edit_valor').val();
    var _vida_util = $('#edit_vida_util').val();
    var _ano_compra = $('#edit_ano_compra').val();

    $.ajax({
        url: '../config/update.php',
        method: 'POST',
        data: {tabela : 'maquinas', item: _item, valor: _valor, vida_util: _vida_util, ano_compra: _ano_compra, id :_id},
        dataType: 'json'
    }).done(function(result){
       
        notify(result);
       getMaquinas();
    });


});

function updateEstoque(id){

    onModal('modal-editestoque','sub-editestoque');
    
    $.ajax({
        url: '../config/selectId.php',
        method: 'POST',
        data: {tabela: 'estoque', id: id},
        dataType: 'json'
    }).done(function(result){
       
        $('#idEdit').val(result[0].id);
        $('#produtoEdit').val(result[0].produto);
        $('#categoriaoEdit').val(result[0].categoria);
        $('#validadeEdit').val(result[0].validade);
        $('#descricaoEdit').val(result[0].descricao);
        $('#valorEdit').val(result[0].valor);
        $('#pesoEdit').val(result[0].peso);
    });
}

$('#editEstoque').submit(function(e){
    e.preventDefault();
    var _id = $('#idEdit').val();
    var _produto = $('#produtoEdit').val();
    var _categoria = $('#categoriaoEdit').val();
    var _validade = $('#validadeEdit').val();
    var _descricao = $('#descricaoEdit').val();
    var _valor = $('#valorEdit').val();
    var _peso = $('#pesoEdit').val();
    
 

    $.ajax({
        url: '../config/update.php',
        method: 'POST',
        data: {tabela: 'estoque',id: _id, produto: _produto, categoria: _categoria, validade: _validade, descricao:_descricao, valor: _valor, peso:_peso },
        dataType: 'json'
    }).done(function(result){
        console.log('oi');
        notify(result);
        getEstoque();
    });


});


function updateAnimal(id){

    onModal('modal-editanimal','sub-editanimal');
    
    $.ajax({
        url: '../config/selectId.php',
        method: 'POST',
        data: {tabela: 'animal', id: id},
        dataType: 'json'
    }).done(function(result){
       
        $('#editId').val(result[0].id);
        $('#eapelido').val(result[0].apelido);
        $('#enome_registro').val(result[0].nome_registro);
        $('#enumero_registro').val(result[0].numero_registro);
        $('#esexo').val(result[0].sexo);
        $('#ecategoria').val(result[0].categoria);
        $('#eraca').val(result[0].raca);
        $('#enome_pai').val(result[0].nome_pai);
        $('#enome_mae').val(result[0].nome_mae);
        $('#edata_entrada').val(result[0].data_entrada);
        $('#epeso_entrada').val(result[0].peso_entrada);
        $('#epeso_atual').val(result[0].peso_atual);
        $('#enascimento').val(result[0].nascimento);
        $('#eidade_entrada').val(result[0].idade_entrada);
        $('#eidade_atual').val(result[0].idade_atual);
        $('#evalor_entrada').val(result[0].valor_entrada);
        $('#evalor_atual').val(result[0].valor_atual);
        

    });
}

$('#editAnimal').submit(function(e){
    e.preventDefault();
    var _id = $('#editId').val();
    var _apelido = $('#eapelido').val();
    var _nome_registro = $('#enome_registro').val();
    var _numero_registro = $('#enumero_registro').val();
    var _sexo = $('#esexo').val();
    var _categoria = $('#ecategoria').val();
    var _raca  = $('#eraca').val();
    var _nome_pai  = $('#enome_pai').val();
    var _nome_mae = $('#enome_mae').val();
    var _data_entrada  = $('#edata_entrada').val();
    var _peso_entrada  = $('#epeso_entrada').val();
    var _peso_atual = $('#epeso_atual').val();
    var _nascimento = $('#enascimento').val();
    var _idade_entrada = $('#eidade_entrada').val();
    var _idade_atual = $('#eidade_atual').val();
    var _valor_entrada = $('#evalor_entrada').val();
    var _valor_atual = $('#evalor_atual').val();
   
    $.ajax({
        url: '../config/update.php',
        method: 'POST',
        data:{tabela: 'animal',
            id: _id,
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
          
            },
        dataType: 'json'
    }).done(function(result){
        console.log('oi');
        notify(result);
        getsAnimal();
    });


});

function updatePerfil(id){

    onModal('modal-perfil','sub-perfil');
    
    $.ajax({
        url: '../config/selectId.php',
        method: 'POST',
        data: {tabela: 'login', id: id},
        dataType: 'json'
    }).done(function(result){
       
        $('#id').val(result[0].id);
        $('#username').val(result[0].username);
        $('#email').val(result[0].email);
        $('#telefone').val(result[0].telefone);
        $('#nasc').val(result[0].nasc);
    });
}

$('#perfilForm').submit(function(e){
    e.preventDefault();
    var _id = $('#id').val();
    var _username = $('#username').val();
    var _email =  $('#email').val();
    var _telefone = $('#telefone').val();
    var _nasc = $('#nasc').val();
 

    $.ajax({
        url: '../config/update.php',
        method: 'POST',
        data: {tabela: 'login',id: _id, username: _username, email : _email, telefone : _telefone, nasc: _nasc},
        dataType: 'json'
    }).done(function(result){
        console.log('oi');
        notify(result);
        getPerfil();
    });


});

function updateSenha(id){

    onModal('modal-senha','sub-senha');
    
    $.ajax({
        url: '../config/selectId.php',
        method: 'POST',
        data: {tabela: 'login', id: id},
        dataType: 'json'
    }).done(function(result){
       
        $('#idSenha').val(result[0].id);
        
    });
}

$('#senhaForm').submit(function(e){
    e.preventDefault();
    var _id = $('#idSenha').val();
    var _atual = $('#atual').val();
    var _nova =  $('#nova').val();
   

    $.ajax({
        url: '../config/update.php',
        method: 'POST',
        data: {tabela: 'senha',id: _id, atual : _atual, nova: _nova},
        dataType: 'json'
    }).done(function(result){
        console.log('oi');
        notify(result);
       

    });


});
