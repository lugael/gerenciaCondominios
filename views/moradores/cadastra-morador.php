<?

use app\controllers\CondominiosController;
use yii\helpers\Url;


?>
<center>
  <h3>Cadastrar Morador</h3>
</center>
<form action="<?=Url::to(['realiza-cadastro-morador'])?>" method="post" id="formCliente" name="formCliente">            
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="nome">Nome do morador</label>
                        <input type="text" name="nome" placeholder="Nome" class="form-control" value="" required>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" placeholder="CPF" class="form-control" value="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="dtnasc">Data de nascimento</label>
                        <input type="date" name="dtnasc"  class="form-control" placeholder="00/00/0000">              
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" placeholder="E-mail" class="form-control" value="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" placeholder="Telefone" class="form-control" value="">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" class="form-control" value="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="from_condominio">Condominio</label><br>
                        <select class="fromCondominio custom-select" name="from_condominio" >
                            <option value="">Selecione o Condominio</option>
                            <?foreach(CondominiosController::listarCondominiosSelect() as $condominio){?>
                                <option value="<?=$condominio['id']?>" ><?=$condominio['nomeCond']?></option>
                            <?}?>
                        </select><br>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="from_bloco">Bloco</label><br>
                        <select class="fromBloco custom-select" name="from_bloco" >
                            <option value="">Selecione o Bloco</option>
                        </select><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="from_unidade">Unidade</label><br>
                        <select class="custom-select fromUnidade" name="from_unidade" >
                            <option value="">Selecione a Unidade</option>
                        </select><br>
                    </div>
                </div>
            </div>
            <input type="hidden" name="<?=\yii::$app->request->csrfParam;?>" value="<?=\yii::$app->request->csrfToken;?>">
            <button class="btn btn-dark buttonEnviar"type="submit">Enviar</button>
</form>