<?

use app\Components\selectedComponent;
use yii\helpers\Url;
use app\controllers\CondominiosController;
?>
<center>
  <h3>Edita Bloco</h3>
</center>
<form action="<?=Url::to(['blocos/realiza-edicao-bloco']);?>" method="post" id="formBloco">            
    <div class="form-group">
        <label for="nomeB">Nome do bloco</label>
        <input type="text" name="nomeB" class="form-control"  value="<?=$edit['nomeB']?>" required>
        <label for="andares">Quantidade de andares</label>
        <input type="number" name="andares" class="form-control" value="<?=$edit['andares']?>" required>
        <label for="qtdUnid">Quantidade de unidades</label>
        <input type="number" name="qtdUnid" class="form-control" value="<?=$edit['qtdUnid']?>" required>
        <label for="from_condominio">Condominio</label><br>
        <select class="fromCondominio custom-select" name="from_condominio" >
            <option value="">Selecione o Condominio</option>
            <?foreach(CondominiosController::listarCondominiosSelect() as $condominio){?>
                <option value="<?=$condominio['id']?>"  <?=selectedComponent::isSelected($condominio['id'],$edit['from_condominio']);?>><?=$condominio['nomeCond']?></option>
            <?}?>
        </select><br>
    </div>
        <input type="hidden" name="id" value="<?=$edit['id']?>">
        <input type="hidden" name="<?=\yii::$app->request->csrfParam;?>" value="<?=\yii::$app->request->csrfToken;?>">
    <button class="btn btn-dark buttonEnviar"type="submit">Enviar</button>
</form>
