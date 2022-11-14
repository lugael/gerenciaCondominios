<?

use app\controllers\BlocosController;
use app\controllers\CondominiosController;
use yii\helpers\Url;
?>
<center>
  <h3>Cadastrar Unidade</h3>
</center>
<form action="<?=Url::to(['realiza-cadastro-unidade']);?>" method="post" id="formUnidade">            
<div class="form-group">
        <label for="numero">Numero</label>
        <input type="number" name="numero" class="form-control" value="" required>
        <label for="metragem">Metragem</label>
        <input type="number" name="metragem" class="form-control" value="" required>
        <label for="qtdVagas">Quantidade de vagas</label>
        <input type="number" name="qtdVagas" class="form-control" value="" required>
        <label for="from_condominio">Condominio</label><br>
                <select class="fromCondominio custom-select" name="from_condominio" >
            <option value="">Selecione o Condominio</option>
            <?foreach(CondominiosController::listarCondominiosSelect() as $condominio){?>
                <option value="<?=$condominio['id']?>"><?=$condominio['nomeCond']?></option>
                <?}?>
        </select><br>
        <label for="from_bloco">Bloco</label>
        <select class="fromBloco custom-select" name="from_bloco" > 
            <option value="">Selecione o Bloco</option>
        </select><br>
    </div>
    <input type="hidden" name="<?=\yii::$app->request->csrfParam;?>" value="<?=\yii::$app->request->csrfToken;?>">
    <button class="btn btn-dark buttonEnviar"type="submit">Enviar</button>
</form>
