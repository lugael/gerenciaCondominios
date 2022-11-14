<?

use app\Components\maskComponent;
use yii\helpers\Url;
?>
<center>
  <h3>Editar administradora</h3>
</center>
<form method="post" id="formadm" action="<?=Url::to(['administradoras/realiza-edicao-administradora']);?>">            
    <div class="form-group">
        <label for="nomeAdm">Nome</label>
        <input type="text" name="nomeAdm" class="form-control" value="<?=$edit['nomeAdm']?>" required>        
        <label for="cnpj">CNPJ</label>
        <input type="text" name="cnpj" class="form-control" value="<?=maskComponent::Mask($edit['cnpj'], 'cnpj')?>" required>
        
    </div>
        <input type="hidden" name="id" value="<?=$edit['id']?>">
        <input type="hidden" name="<?=\yii::$app->request->csrfParam;?>" value="<?=\yii::$app->request->csrfToken;?>">
    <button class="btn btn-dark buttonEnviar"type="submit">Enviar</button>
</form>
