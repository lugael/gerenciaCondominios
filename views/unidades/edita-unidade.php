<?

use app\Components\selectedComponent;
use app\controllers\BlocosController;
use app\controllers\CondominiosController;
use yii\helpers\Url;
?>
<center>
  <h3>Editar Unidade</h3>
</center>
<form action="<?=Url::to(['realiza-edicao-unidade']);?>" method="post" id="formUnidade">            
    <div class="form-group">
        <label for="numero">Numero</label>
        <input type="number" name="numero" class="form-control" value="<?=$edit['numero']?>" required>
        <label for="metragem">Metragem</label>
        <input type="number" step="0.1" name="metragem" class="form-control" value="<?=$edit['metragem']?>" required>
        <label for="qtdVagas">Quantidade de vagas</label>
        <input type="number" name="qtdVagas" class="form-control" value="<?=$edit['qtdVagas']?>" required>
        <label for="from_condominio">Condominio</label><br>
        <select class="fromCondominio custom-select" name="from_condominio" >
                    <option value="">Selecione o Condominio</option>
                    <?foreach(CondominiosController::listarCondominiosSelect() as $condominio){?>
                        <option value="<?=$condominio['id']?>"  <?=selectedComponent::isSelected($condominio['id'],$edit['from_condominio']);?>><?=$condominio['nomeCond']?></option>
                    <?}?>
                </select><br>
        <label for="from_bloco">Bloco</label><br>
        <select class="fromBloco custom-select" name="from_bloco" >
            <option value="">Selecione o Bloco</option>
            <?foreach(BlocosController ::listarEditBlocosSelect($edit['from_condominio']) as $bloco){?>
                <option value="<?=$bloco['id']?>" <?=selectedComponent::isSelected($bloco['id'],$edit['from_bloco']);?>><?=$bloco['nomeB']?></option>
            <?}?>
        </select><br>
    </div>
    <input type="hidden" name="id" value="<?=$edit['id']?>">
    <input type="hidden" name="<?=\yii::$app->request->csrfParam;?>" value="<?=\yii::$app->request->csrfToken;?>">
    <button class="btn btn-dark buttonEnviar"type="submit">Enviar</button>
</form>
