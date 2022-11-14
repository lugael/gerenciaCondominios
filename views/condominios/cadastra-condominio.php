<?

use app\Components\estadosComponent;
use app\controllers\AdministradorasController;
use yii\helpers\Url;
use app\controllers\CondominiosController;


?>
<center>
  <h3>Cadastrar Condominio</h3>
</center>
<form action="<?=Url::to(['condominios/realiza-cadastro-condominio']);?>" method="post" id="formCondominio">            
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                <label for="nomeCond">Nome do condominio</label>
                <input type="text" name="nomeCond"  class="form-control" value="" required>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <label for="qtdBloco">Quantidade de blocos</label>
                <input type="number" name="qtdBloco"  class="form-control" value="" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                <label for="cep">CEP</label>
                <input type="text" name="cep" class="form-control cep" value="" required>
                <a class="naoSeiCep" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Não sei meu CEP<i class="icofont-google-map"></i>
                </a>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <label for="estado">Estado</label><br>
                <select name="estado" class="custom-select fromEstados">
                    <option value="">Selecione o Estado:</option>
                    <?foreach(estadosComponent::estados() as $sig=>$uf){?>
                        <option value="<?=$uf?>" data-uf="<?=$sig?>"><?=$uf?></option>
                    <?}?>
                </select><br>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <div class="collapse" id="collapseExample">
                    <div class="card bg-cep card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="estado">Estado</label>
                                <select id="inputState" class="form-control fromEstados">
                                    <option value="">selecione...</option>
                                    <? foreach (estadosComponent::estados() as $sig => $uf) { ?>
                                        <option value="<?= $uf ?>" data-uf="<?= $sig ?>"><?= $uf ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="cidade">Cidade</label>
                                <select id="inputState" class="form-control cidades">
                                    <option value="">Carregando...</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-62 mb-12">
                                <label for="logradouroColapse">Logradouro</label>
                                <input type="text" class="form-control logradouroColapse" id="logradouroColapse"value="" placeholder="Logradouro">
                            </div>
                            <div class="col-12 col-md-62 mb-3">
                                <label for="inputState">CEP</label>
                                <select id="inputState" class="form-control cepColapse">
                                    <option value="">Carregando...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                <label class="viacep" for="logradouro">Logradouro</label>
                <input type="text" name="logradouro" class="form-control logradouro viacep" value="" required>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <label class="viacep" for="numero">Numero</label>
                <input type="text" name="numero" class="form-control viacep" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                <label class="viacep" for="bairro">Bairro</label>
                <input type="text" name="bairro" class="form-control bairro viacep" value="" required>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <label class="viacep" for="cidade">Cidade</label>
                <input type="text" name="cidade" class="form-control cidades viacep" value="" required>        
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                <label class="viacep"for="from_adm">Administradora</label><br>
                 <select name="from_adm"  class="custom-select viacep">
                     <option value="">Selecione a Administradora:</option>
                     <?foreach(AdministradorasController::listarAdministradorasSelect() as $administradora){?>
                         <option value="<?=$administradora['id']?>"><?=$administradora['nomeAdm']?></option>
                     <?}?>
                 </select><br>
            </div>
        </div>
    </div>
        <input type="hidden" name="<?=\yii::$app->request->csrfParam;?>" value="<?=\yii::$app->request->csrfToken;?>">
    <button class="btn btn-dark buttonEnviar viacep"type="submit">Enviar</button>
</form>
