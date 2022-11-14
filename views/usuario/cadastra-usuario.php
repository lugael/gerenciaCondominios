<?
use yii\helpers\Url;
?>
<center>
  <h3>Cadastrar Usuario</h3>
</center>
<form action="<?=Url::to(['realiza-cadastro-usuario'])?>" method="post" id="formUser">
    <div class="form-group">
        <label for="nomeUser">Nome</label>
        <input type="text" name="nomeUser" class="form-control" value="" required>        
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" class="form-control" value="" required>
        <label for="senha">Senha</label>
        <input type="password" name="senha" class="form-control" value="" required>
        <label for="confirmeSenha">Confirme a senha</label>
        <input type="password" name="cSenha"id="confSenha" class="form-control" required>
    </div>
    <input type="hidden" name="<?=\yii::$app->request->csrfParam;?>" value="<?=\yii::$app->request->csrfToken;?>">
    <button class="btn btn-dark buttonEnviar"type="submit">Enviar</button>
</form>