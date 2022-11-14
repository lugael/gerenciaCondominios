$(function(){
    //Envio de post com API
    postApi = function (url,dados){
        $.ajax({
            url: 'http://localhost/luisGabriel_yii/web/index.php?r=api/default/get-token',
            method: 'GET',
            dataType: 'json',
            success: function(tk){
                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'json',
                    data: dados+'&_csrf='+tk.token,                    
                    success: function(data){
                        if(data.endPoint.status == 'success'){
                            
                        }
                    }
                })
            }
        })
        
       
    }
    //modal
    $(document).on('click','.openModal', function(){
        caminho = $(this).attr('href');
        $(".modal-body").load(caminho, function(response,status){
            if(status === "success"){
                $('#modalqui').modal({show: true});
            }
        });
        return false;
    })
    //Collapse Home
    $('#buttonCollapse').click(function(){
        $('.todosRecados').load('http://localhost:8080/index.php?r=recados%2Flistar-recados', function(status){
            if(status === "success"){
                return true;
            }
        });
        
    })
    // Condominio
    $(document).on('change','.fromCondominio', function(){
        selecionado = $(this).val();
        $.ajax({
            url: '?r=blocos/listar-blocos-api',
            dataType: 'json',
            type: 'POST',
            data : { id: selecionado},
            success : function(data){
               selectPopulation('.fromBloco', data,'nomeB');
            
        }
        });
       
    });
    $(document).on('change','.fromBloco', function(){
        selecionado = $(this).val();
        $.ajax({
            url: '?r=unidades/listar-unidades-api',
            dataType: 'json',
            type: 'POST',
            data: { id: selecionado},
            success: function(data){
                selectPopulation('.fromUnidade', data, 'numero')
            }
        })
    })
    //Genero
    $(document).on('change','.actionGenero',function(){
        var gen = $(this).val();
        var name = $(this).attr('id');
        if(gen == 'O'){
            $(this).attr('name','');
            $(this).parent().append('<input class="form-control outroGenero" type="text" name="'+name+'">');
        }else{
            $('.outroGenero').remove();
            $(this).attr('name', name);
        }
    })
    
    function selectPopulation(seletor, dados, field){
        estrutura = '<option value="">Selecione...</option>';

        for (let i = 0; i < dados.length; i++) {

            estrutura += '<option value="'+dados[i].id+'">'+dados[i][field]+'</option>';

        }
        $(seletor).html(estrutura);
    }
    //Recados por bloco
    $(document).on('click','.edit', function(){
        idRegistro = $(this).attr('data-id');
        link = $(this);
        $.ajax({
            url: 'http://localhost/luisGabriel_yii/web/index.php?r=api/recados/buscar-um&id='+idRegistro,
            method: 'GET',
            dataType: 'json',
            success: function(data){
                titulo = data.resultSet.titulo
                $(link).parent().parent().parent().find('#titulo').html(`<div class="input-group input-group-sm ">               
                <input type="text" class="form-control" aria-describedby="inputGroup-sizing-sm" name="titulo" value="${titulo}">
                </div>`);
                conteudo = data.resultSet.conteudo
                $(link).parent().parent().parent().find('#conteudo').html(`<div class="input-group input-group-sm "> <textarea class="form-control" name="conteudo" required>${conteudo}</textarea></div>`);
                dtInicio = data.resultSet.dtInicio
                $(link).parent().parent().parent().find('#dtInicio').html(`<div class="input-group input-group-sm "> <input type="date" class="form-control" name="dtInicio" value="${dtInicio}"></div>`);
                dtFim = data.resultSet.dtFim
                $(link).parent().parent().parent().find('#dtFim').html(`<div class="input-group input-group-sm "> <input type="date" class="form-control" name="dtFim" value="${dtFim}"></div>`);
                fromCond = data.resultSet.from_condominio
                $(link).parent().parent().parent().find('#cond').html(` <div class="input-group input-group-sm "> <input type="hidden" name="from_condominio" value="${fromCond}"></div>`);
                fromBloco = data.resultSet.from_bloco
                $(link).parent().parent().parent().find('#bloco').html(` <div class="input-group input-group-sm "> <input type="hidden" name="from_bloco" value="${fromBloco}"></div>`);
                id = data.resultSet.id
                $(link).parent().parent().parent().find('#id').html(`<div class="input-group input-group-sm "> <input type="hidden" name="id" value="${id}"></div>`);
                
                
            }
        })
        $(link).find('.bi').toggleClass(['bi bi-pencil-square','bi bi-check2-square']);
        $(link).toggleClass(['edit','salvar']);
        $(`button[data-id !=${idRegistro}].btnEdi`).removeClass('edit');
        $(link).parent().find('#iconDel').toggleClass(['bi bi-trash-fill','bi bi-x-circle-fill']);
        $(link).parent().find('#delRecado').toggleClass(['excluir','cancelar']);
    })

    $(document).on('click', '.salvar', function(){
        id = $(this).attr('data-id');
        titulo = $('input[name="titulo"]').val();
        conteudo = $('textarea[name="conteudo"]').val();
        dtInicio = $('input[name="dtInicio"]').val();
        dtFim = $('input[name="dtFim"]').val();
        from_bloco = $('input[name="from_bloco"]').val();
        from_condominio = $('input[name="from_condominio"]').val();
        dados = `id=${id}&titulo=${titulo}&conteudo=${conteudo}&dtInicio=${dtInicio}&dtFim=${dtFim}&from_bloco=${from_bloco}&from_condominio=${from_condominio}`;
        $(this).parent().parent().parent().find('#titulo').html(titulo);
        $(this).parent().parent().parent().find('#conteudo').html(conteudo);
        $(this).parent().parent().parent().find('#dtInicio').html(`Inicio:` + dtInicio);
        $(this).parent().parent().parent().find('#dtFim').html(`Fim:` + dtFim);
        $(this).find('.bi').toggleClass(['bi bi-pencil-square','bi bi-check2-square']);
        $(this).toggleClass(['edit','salvar']);
        $(this).parent().find('#delRecado').toggleClass(['excluir','cancelar']); 
        $(this).parent().find('#iconDel').toggleClass(['bi bi-trash-fill','bi bi-x-circle-fill']);
        $(`button[data-id !=${id}].btnEdi`).addClass('edit');
    
        postApi('http://localhost/luisGabriel_yii/web/index.php?r=api/recados/edit', dados);
        
    })

    autocomplete = function(cep){

        $.ajax({
            url: `https://viacep.com.br/ws/${cep}/json/`,
            method: 'GET',
            dataType: 'json',
            success: function(data){
                $('.logradouro').val(data.logradouro)
                $('.bairro').val(data.bairro)
                $('.cidades').val(data.localidade)
                $('.fromEstados').val(data.uf)               
            }
        })
    }
    $(document).on('keyup','.cep',function(){
        let cep = $(this).val();
        if(cep.length == 9){
            autocomplete(cep)
        }
        
    })
     //popular cidade com base nos estados
     $(document).on('change','.fromEstados',function(selected){
        let options = `<option value="">Selecione...</option>`
        let estado = $(this).val()
        let estadoSelecionado = $(this).find(`option[value="${estado}"]`).attr('data-uf')
        $.ajax({
            url: `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoSelecionado}/municipios`,
            method: 'GET',
            dataType: 'json',
            success: function(data){
                for(let key in data){
                    options += `<option value="${data[key].nome}">${data[key].nome}</option>`
                }
                $('.cidades').html(options)
            }
        })
    })
    // Não sei meu CEP
    $(document).on('click','.naoSeiCep', function(){
        $(this).parent().parent().parent().find('.viacep').toggleClass('d-none'); 
    })  
    //popular select do cep (caso nao saiba)
    $(document).on('keyup','.logradouroColapse',function(){
        let options = `<option value="">Selecione...</option>`
        let logradouro = $(this).val()
        let estado = $(this).parent().parent().find('.fromEstados').val()
        let cidade = $(this).parent().parent().find('.cidades').val()
        let estadoSelecionado = $(this).parent().parent().find(`option[value="${estado}"]`).val()
        if(logradouro.length >= 3){
            $.ajax({
                url: `https://viacep.com.br/ws/${estadoSelecionado}/${cidade}/${logradouro}/json/`,
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    for(let key in data){
                        options += `<option value="${data[key].cep}">${data[key].cep} ${data[key].logradouro} ${data[key].bairro} ${data[key].complemento}</option>`
                    }
                    $('.cepColapse').html(options)             
                }
            })
        }
    })

    //autocomplete pelo não sei meu cep
    $(document).on('change','.cepColapse',function(){
        let cep = $(this).val();
        $(this).parent().parent().parent().parent().parent().parent().parent().find('.viacep').toggleClass('d-none');

        $.ajax({
            url: `https://viacep.com.br/ws/${cep}/json/`,
            method: 'GET',
            dataType: 'json',
            success: function(data){
                $('.cep').val(data.cep)      
                $('.logradouro').val(data.logradouro)
                $('.bairro').val(data.bairro)
                $('.cidades').val(data.localidade)
                $('.fromEstados').val(data.uf)      
            }
        })
        $('#collapseExample').removeClass('show')
    })

    // mascaras input
    //CPF
    maskCpf = function() { $('input[name="cpf"]').mask('999.9999.999-99', {reverse:true})}
    $(document).on('click , focus','input[name="cpf"]', function(){maskCpf()})
    //CNPJ
    maskCnpj = function() {$('input[name="cnpj"]').mask('99.9999.999/9999-99', {reverse:true})}
    $(document).on('click , focus','input[name="cnpj"]', function(){maskCnpj()})
    //Telefone
    masktelefone = function() {
        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
      
    $('input[name="telefone"]').mask(SPMaskBehavior, spOptions);}
    $(document).on('click , focus','input[name="telefone"]', function(){masktelefone()})
    //CEP
    maskCEP = function(){$('input[name="cep"]').mask('99999-999', {reserve:true})}
    $(document).on('click , focus','input[name="cep"]', function(){maskCEP()})
    
});
