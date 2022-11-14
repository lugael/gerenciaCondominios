<?
use yii\helpers\Url;
?>
<center>
  <h3>Editar usuario</h3>
</center>
<form action="<?=Url::to(['realiza-edicao-usuario'])?>" method="post" id="formUser">
    <div class="form-group">
        <label for="nomeUser">Nome</label>
        <input type="text" name="nomeUser" class="form-control" value="<?=$edit['nomeUser']?>" required>        
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" class="form-control" value="<?=$edit['usuario']?>" required>
    </div>
    <input type="hidden" name="id" value="<?=$edit['id']?>">
    <input type="hidden" name="<?=\yii::$app->request->csrfParam;?>" value="<?=\yii::$app->request->csrfToken;?>">
    <button class="btn btn-dark buttonEnviar"type="submit">Enviar</button>
</form>