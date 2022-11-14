<?
use app\Components\selectedComponent;
use app\controllers\BlocosController;
use app\controllers\CondominiosController;
use yii\helpers\Url;

?>
<h1>Edita o recado</h1>
<form action="<?=Url::to(['recados/realiza-edicao-recado']);?>" method="post">
    <div class="row">
        <div class="col">
            <label for="titulo">Titulo do recado</label>
            <input type="text" class="form-control" name="titulo" value="<?=$edit['titulo']?>" required>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="conteudo">Conteúdo do recado</label>
            <textarea class="form-control" name="conteudo" required><?=$edit['conteudo']?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="dtInicio">Data de inicio</label>
            <input type="date" class="form-control" name="dtInicio" value="<?=$edit['dtInicio']?>" required>
        </div>
        <div class="col-6">
            <label for="dtFim">Data do Fim</label>
            <input type="date" class="form-control" name="dtFim" value="<?=$edit['dtFim']?>" required>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-12 col-md-6">
            <label for="from_condominio">Selecione o Condominio</label><br>
                <select class="fromCondominio custom-select" name="from_condominio" >
                    <option value="">Selecione...</option>
                    <?foreach(CondominiosController::listarCondominiosSelect() as $condominio){?>
                        <option value="<?=$condominio['id']?>"  <?=selectedComponent::isSelected($condominio['id'],$edit['from_condominio']);?>><?=$condominio['nomeCond']?></option>
                    <?}?>
                </select><br>
            </div>
            <div class="col-sm-12 col-md-6">
                <label for="from_bloco">Selecione o Bloco</label><br>
                <select class="fromBloco custom-select" name="from_bloco" >
                    <option value="">Selecione...</option>
                    <?foreach(BlocosController::listarEditBlocosSelect($edit['from_condominio']) as $bloco){?>
                                <option value="<?=$bloco['id']?>" <?=selectedComponent::isSelected($bloco['id'],$edit['from_bloco']);?>><?=$bloco['nomeB']?></option>
                    <?}?>
                </select><br>
            </div>
    </div>
    <input type="hidden" name="id" value="<?=$edit['id']?>">
    <input type="hidden" name="<?=\yii::$app->request->csrfParam;?>" value="<?=\yii::$app->request->csrfToken;?>">
    <button class="btn mt-2 btn-dark buttonEnviar"type="submit">Enviar</button>
</form>
