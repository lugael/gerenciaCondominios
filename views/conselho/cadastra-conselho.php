<?

use app\controllers\CondominiosController;
use yii\helpers\Url;
$funcoes = array(
    1 =>"Sindico",
    2 =>"Subsindico",
    3 =>"Conselheiro"
);
?>
<center>
  <h3>Cadastrar Conselho</h3>
</center>
<form action="<?=Url::to(['realiza-cadastro-conselho'])?>" method="post" id="formConselho">            
    <div class="form-group">
        
             
        <label for="nomeCons">Nome do funcionário</label>
        <input type="text" name="nomeCons"  class="form-control" value="" required>
        <label for="funcao">Função</label><br>
        <select name="funcao" class="custom-select">
            <option value="">Selecione a Função</option>
            <?foreach($funcoes as $ch =>$fun){?>
                <option value="<?=$fun?>"><?=$fun?></option>
            <?}?>
        </select><br>
        <label for="from_condominio">Condominio</label><br>
        <select name="from_condominio" class="custom-select" >
            <option value="">Selecione o Condominio </option>
            <?foreach(CondominiosController::listarCondominiosSelect() as $condominio){?>
                <option value="<?=$condominio['id']?>"><?=$condominio['nomeCond']?></option>
            <?}?>
        </select><br>
    </div>
    <input type="hidden" name="<?=\yii::$app->request->csrfParam;?>" value="<?=\yii::$app->request->csrfToken;?>">
    <button class="btn btn-dark buttonEnviar"type="submit">Enviar</button>
</form>