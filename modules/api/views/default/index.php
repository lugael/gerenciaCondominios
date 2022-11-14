<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-dark btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Busca de administradoras
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <kbd>A API foi feita para que você busque todas as administradoras cadastradas em nosso sitemas, Ela será utilizada por GET</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/administradoras/get-all)</span></p><br>
        <kbd>A API foi feita para que você busque um adiministradora em especifico cadastrada em nosso sitemas, Ela será utilizada por GET</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/administradoras/get-one&id="ID da administradora buscada" )</span></p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-dark btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Manipulação de administradora
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <kbd>Para uso de qualquer API enviada via POST é necessário o uso desta API via GET para gerar um token necessário no envio dos dados</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/default/get-token)</span></p><br>
        <kbd>A API foi feita para que você registre uma nova adiministradora em nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber Dados Nome da administradora, CNPJ e o Token gerado da seguinte forma "nomeAdm=Exemplo&cnpj=11000111000011&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/administradoras/register)</span></p>
        <kbd>A API foi feita para que você edite uma adiministradora de nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber Dados ID da administradora, Nome da administradora, CNPJ e o Token gerado da seguinte forma "id=00&nomeAdm=Exemplo&cnpj=11000111000011&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/administradoras/edit-one)</span></p>
        <kbd>A API foi feita para que você deletar uma adiministradora de nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber somente o ID da administradora e o Token gerado da seguinte forma "id=00&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/administradoras/del)</span></p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-info btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          Busca de condominios                                                                     
        </button>
      </h2>
    </div>

    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        <kbd>A API foi feita para que você busque todos condominios cadastrados em nosso sitemas, Ela será utilizada por GET</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/condominios/get-all)</span></p><br>
        <kbd>A API foi feita para que você busque um condominio em especifico cadastrado em nosso sitemas, Ela será utilizada por GET</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/condominios/get-one&id="ID do condominio buscado" )</span></p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFour">
      <h2 class="mb-0">
        <button class="btn btn-info btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Manipulação de condominio
        </button>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample"> 
      <div class="card-body">
        <kbd>Para uso de qualquer API enviada via POST é necessário o uso desta API via GET para gerar um token necessário no envio dos dados</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/default/get-token)</span></p><br>
        <kbd>A API foi feita para que você registre um novo condominio em nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber Dados Nome do condominio, Quantidade de bloco, CEP, Logradouro, Numero, Bairro, Cidade, Estado, Sindico responsável, Administradora do condominio e o Token gerado da seguinte forma "nomeCond=Exemplo&qtdBloco=0&cep=11111000&logradouro=Rua de exemplo&numero=0&bairro=Bairro exemplo&cidade=Cidade de exemplo&estado=UF&from_sindico=ID do sindico responsável&from_adm=ID da Administradora&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/condominios/register)</span></p>
        <kbd>A API foi feita para que você edite um condominio de nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber Dados ID do condominio, Nome do condominio, Quantidade de bloco, CEP, Logradouro, Numero, Bairro, Cidade, Estado, Sindico responsável, Administradora do condominio e o Token gerado da seguinte forma "id=ID do condominio&nomeCond=Exemplo&qtdBloco=0&cep=11111000&logradouro=Rua de exemplo&numero=0&bairro=Bairro exemplo&cidade=Cidade de exemplo&estado=UF&from_sindico=ID do sindico responsável&from_adm=ID da Administradora&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/condominios/edit-one)</span></p>
        <kbd>A API foi feita para que você deletar um condominio de nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber somente o ID do condominio e o Token gerado da seguinte forma "id=00&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/condominios/del)</span></p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFive">
      <h2 class="mb-0">
        <button class="btn btn-warning btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
          Busca de blocos                                                                     
        </button>
      </h2>
    </div>

    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
        <kbd>A API foi feita para que você busque todos blocos cadastrados em nosso sitemas, Ela será utilizada por GET</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/blocos/get-all)</span></p><br>
        <kbd>A API foi feita para que você busque um bloco em especifico cadastrado em nosso sitemas, Ela será utilizada por GET</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/blocos/get-one&id="ID do bloco buscado" )</span></p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingSix">
      <h2 class="mb-0">
        <button class="btn btn-warning btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
            Manipulação de bloco
        </button>
      </h2>
    </div>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample"> 
      <div class="card-body">
        <kbd>Para uso de qualquer API enviada via POST é necessário o uso desta API via GET para gerar um token necessário no envio dos dados</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/default/get-token)</span></p><br>
        <kbd>A API foi feita para que você registre um novo bloco em nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber Dados Nome do bloco, Quantidade de andares, Quantidade de unidade, Condominio do bloco e o Token gerado da seguinte forma "nomeB=Exemplo&andares=0&qtdUnid=12&from_condominio=ID do condominio&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/blocos/register)</span></p>
        <kbd>A API foi feita para que você edite um bloco de nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber Dados ID do bloco, Nome do bloco, Quantidade de andares, Quantidade de unidade, Condominio do bloco e o Token gerado da seguinte forma "id=ID do bloco&nomeB=Exemplo&andares=0&qtdUnid=12&from_condominio=ID do condominio&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/blocos/edit-one)</span></p>
        <kbd>A API foi feita para que você deletar um bloco de nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber somente o ID do bloco e o Token gerado da seguinte forma "id=00&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/blocos/del)</span></p>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingFive">
      <h2 class="mb-0">
        <button class="btn btn-success btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
          Busca de unidades                                                                     
        </button>
      </h2>
    </div>

    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
        <kbd>A API foi feita para que você busque todas unidades cadastradas em nosso sitemas, Ela será utilizada por GET</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/unidades/get-all)</span></p><br>
        <kbd>A API foi feita para que você busque uma unidade em especifica cadastrada em nosso sitemas, Ela será utilizada por GET</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/unidades/get-one&id="ID da unidade buscado" )</span></p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingSix">
      <h2 class="mb-0">
        <button class="btn btn-success btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
            Manipulação de unidade
        </button>
      </h2>
    </div>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample"> 
      <div class="card-body">
        <kbd>Para uso de qualquer API enviada via POST é necessário o uso desta API via GET para gerar um token necessário no envio dos dados</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/default/get-token)</span></p><br>
        <kbd>A API foi feita para que você registre uma nova unidade em nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber Dados Numero da unidade, Quantidade de Vagas de garagem, Metragem da unidade, Condominio da unidade, Bloco da unidade e o Token gerado da seguinte forma "numero=00&metragem=11&qtdVagas=1&from_bloco= ID do bloco&from_condominio=ID da condominio&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/unidades/register)</span></p>
        <kbd>A API foi feita para que você edite uma unidade de nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber Dados ID da unidade, Numero da unidade, Nome do unidade, Quantidade de Vagas de garagem, Metragem da unidade, Condominio da unidade, Bloco da unidade e o Token gerado da seguinte forma "id=ID da unidade&numero=00&metragem=11&qtdVagas=1&from_bloco= ID do bloco&from_condominio=ID da condominio&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/unidades/edit-one)</span></p>
        <kbd>A API foi feita para que você deletar uma unidade de nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber somente o ID da unidade e o Token gerado da seguinte forma "id=00&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/unidades/del)</span></p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingSeven">
      <h2 class="mb-0">
        <button class="btn btn-primary btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
          Busca de Moradores                                                                     
        </button>
      </h2>
    </div>

    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
      <div class="card-body">
        <kbd>A API foi feita para que você busque todos moradores cadastrados em nosso sitemas, Ela será utilizada por GET</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/moradores/get-all)</span></p><br>
        <kbd>A API foi feita para que você busque um morador em especifico cadastrado em nosso sitemas, Ela será utilizada por GET</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/moradores/get-one&id="ID do morador buscado" )</span></p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingEight">
      <h2 class="mb-0">
        <button class="btn btn-primary btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
            Manipulação de morador
        </button>
      </h2>
    </div>
    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample"> 
      <div class="card-body">
        <kbd>Para uso de qualquer API enviada via POST é necessário o uso desta API via GET para gerar um token necessário no envio dos dados</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/default/get-token)</span></p><br>
        <kbd>A API foi feita para que você registre um novo morador em nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber Dados Nome do morador, CPF, Data de nascimento, email, Telefone, Senha, Condominio do morador, Bloco do morador, Unidade do morador e o Token gerado da seguinte forma "nome=Exemplo&cpf=00011100011&dtnasc=2000-00-00&email=exemplo@exemplo&telefone=00111110000&senha=1234&from_unidade= ID da unidade&from_bloco= ID do bloco&from_condominio=ID da condominio&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/moradores/register)</span></p>
        <kbd>A API foi feita para que você edite um morador de nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber Dados ID da morador, Nome do morador, Nome do morador, CPF, Data de nascimento, email, Telefone, Senha, Condominio do morador, Bloco do morador, Unidade do morador e o Token gerado da seguinte forma "id=ID da morador&nome=Exemplo&cpf=00011100011&dtnasc=2000-00-00&email=exemplo@exemplo&telefone=00111110000&senha=1234&from_unidade= ID da unidade&from_bloco= ID do bloco&from_condominio=ID da condominio&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/moradores/edit-one)</span></p>
        <kbd>A API foi feita para que você deletar um morador de nosso sitemas, Ela será utilizada por POST</kbd><br>
        <kbd>Essa ai espere receber somente o ID da morador e o Token gerado da seguinte forma "id=00&_csrf=TokenGerado"</kbd>
        <p class="font-weight-bolder">Link para uso<span class="font-weight-normal">(http://localhost/luisGabriel_yii/web/index.php?r=api/moradores/del)</span></p>
      </div>
    </div>
  </div>
  
  
</div>