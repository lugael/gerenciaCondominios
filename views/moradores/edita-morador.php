<?

use app\components\generoComponent;
use app\Components\maskComponent;
use app\Components\selectedComponent;
use app\controllers\BlocosController;
use app\controllers\CondominiosController;
use app\controllers\UnidadesController;
use kartik\date\DatePicker;
use yii\helpers\Url;


?>
<center>
  <h3>Editar Morador</h3>
</center>
<form action="<?=Url::to(['realiza-edicao-morador'])?>" method="post" id="formCliente" name="formCliente">            
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="nome">Nome do morador</label>
                        <input type="text" name="nome" class="form-control" value="<?=$edit['nome']?>" required>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" class="form-control" value="<?=maskComponent::Mask($edit['cpf'],'cpf')?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="dtnasc">Data de nascimento</label>
                        <input type="date"  value="<?=$edit['dtnasc']?>" class="form-control" name="dtnasc">  
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" value="<?=$edit['email']?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="telefone">Telefone</label>   
                        <input type="text" name="telefone" class="form-control" value="<?=maskComponent::telMask($edit['telefone'], 'telefone')?>">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" class="form-control" value="<?=$edit['senha']?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="from_condominio">Condominio</label><br>
                        <select class="fromCondominio custom-select" name="from_condominio" >
                            <option value="">Selecione o Condominio</option>
                            <?foreach(CondominiosController::listarCondominiosSelect() as $condominio){?>
                                <option value="<?=$condominio['id']?>"  <?=selectedComponent::isSelected($condominio['id'],$edit['from_condominio']);?>><?=$condominio['nomeCond']?></option>
                            <?}?>
                        </select><br>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="from_bloco">Bloco</label><br>
                        <select class="fromBloco custom-select" name="from_bloco" >
                            <option value="">Selecione o Bloco</option>
                            <?foreach(BlocosController::listarEditBlocosSelect($edit['from_condominio']) as $bloco){?>
                                <option value="<?=$bloco['id']?>" <?=selectedComponent::isSelected($bloco['id'],$edit['from_bloco']);?>><?=$bloco['nomeB']?></option>
                            <?}?>
                        </select><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="from_unidade">Unidade</label><br>
                        <select class="custom-select fromUnidade" name="from_unidade" >
                            <option value="">Selecione a Unidade</option>
                            <?foreach(UnidadesController::listarEditUnidadesSelect($edit['from_bloco']) as $unid){?>
                                <option value="<?=$unid['id']?>"  <?=selectedComponent::isSelected($unid['id'],$edit['from_unidade']);?>><?=$unid['numero']?></option>
                            <?}?>
                        </select><br>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="<?=$edit['id']?>">
            <input type="hidden" name="<?=\yii::$app->request->csrfParam;?>" value="<?=\yii::$app->request->csrfToken;?>">
            <button class="btn btn-dark buttonEnviar"type="submit">Enviar</button>
</form>