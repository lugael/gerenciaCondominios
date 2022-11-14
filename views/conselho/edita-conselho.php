<?

use app\Components\selectedComponent;
use app\controllers\CondominiosController;
use yii\helpers\Url;
$funcoes = array(
    1 =>"Sindico",
    2 =>"Subsindico",
    3 =>"Conselheiro"
);
?>
<center>
  <h3>Editar Conselho</h3>
</center>
<form action="<?=Url::to(['realiza-edicao-conselho'])?>" method="post" id="formConselho">            
    <div class="form-group">
        
             
        <label for="nomeCons">Nome do funcionário</label>
        <input type="text" name="nomeCons" class="form-control" value="<?=$edit['nomeCons']?>" required>
        <label for="funcao">Função</label><br>
        <select name="funcao" class="custom-select">
            <option value="">Selecione a Função</option>
            <?foreach($funcoes as $ch =>$fun){?>
                <option value="<?=$fun?>"  <?=selectedComponent::isSelected($fun,$edit['funcao']);?>><?=$fun?></option>
            <?}?>
        </select><br>
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