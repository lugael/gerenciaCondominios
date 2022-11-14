<?

use app\controllers\CondominiosController;
use yii\helpers\Url;

?>
<center>

    <h1>Cadastro de recado</h1>
</center>
<form action="<?=Url::to([($redirec == 'site/home')?'recados/realiza-cadastro-recado': 'realiza-cadastro-recado-bloco']);?>" method="post">
    <div class="row">
        <div class="col">
            <label for="titulo">Titulo do recado</label>
            <input type="text" class="form-control" name="titulo">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="conteudo">Conteúdo do recado</label>
            <textarea class="form-control" name="conteudo" required></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="dtInicio">Data de inicio</label>
            <input type="date" class="form-control" name="dtInicio">
        </div>
        <div class="col-6">
            <label for="dtFim">Data do Fim</label>
            <input type="date" class="form-control" name="dtFim">
        </div>
    </div>
    <?if(!isset($_GET['from_bloco'])){?>
        <div class="row">
            <div class="col-sm-12 col-md-6">
            <label for="from_condominio">Selecione o Condominio</label><br>
                <select class="fromCondominio custom-select" name="from_condominio" >
                    <option value="">Selecione...</option>
                    <?foreach(CondominiosController::listarCondominiosSelect() as $condominio){?>
                        <option value="<?=$condominio['id']?>" ><?=$condominio['nomeCond']?></option>
                    <?}?>
                </select><br>
            </div>
            <div class="col-sm-12 col-md-6">
                <label for="from_bloco">Selecione o Bloco</label><br>
                <select class="fromBloco custom-select" name="from_bloco" >
                    <option value="">Selecione...</option>
                </select><br>
            </div>
        </div>
        
    <?}else{?>
        <input type="hidden" name="from_condominio" value="<?=$_GET['from_condominio']?>">
        <input type="hidden" name="from_bloco" value="<?=$_GET['from_bloco']?>">
    <?}?>
    <input type="hidden" name="<?=\yii::$app->request->csrfParam;?>" value="<?=\yii::$app->request->csrfToken;?>">
    <button class="btn btn-dark mt-2 buttonEnviar"type="submit">Enviar</button>
</form>