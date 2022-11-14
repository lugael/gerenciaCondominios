<?
use yii\helpers\Url;
use app\controllers\CondominiosController;
?>
<center>
  <h3>cadastrar Bloco</h3>
</center>
<form action="<?=Url::to(['blocos/realiza-cadastro-bloco']);?>" method="post" id="formBloco">            
    <div class="form-group">
        <label for="nomeB">Nome do bloco</label>
        <input type="text" name="nomeB" class="form-control"  value="" required>
        <label for="andares">Quantidade de andares</label>
        <input type="number" name="andares" class="form-control" value="" required>
        <label for="qtdUnid">Quantidade de unidades</label>
        <input type="number" name="qtdUnid" class="form-control" value="" required>
        <label for="from_condominio">Condominio</label><br>
        <select name="from_condominio" class="custom-select" >
            <option value="">Selecione o Condominio</option>
            <?foreach(CondominiosController::listarCondominiosSelect() as $condominio){?>
                <option value="<?=$condominio['id']?>" ><?=$condominio['nomeCond']?></option>
            <?}?>
        </select><br>
    </div>
        <input type="hidden" name="<?=\yii::$app->request->csrfParam;?>" value="<?=\yii::$app->request->csrfToken;?>">
    <button class="btn btn-dark buttonEnviar"type="submit">Enviar</button>
</form>
