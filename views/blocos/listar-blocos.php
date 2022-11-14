<?

use app\Components\alertComponent;
use app\Components\modalComponent;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$url_site = Url::base(true);
if(isset($_GET['myAlert'])){
    echo alertComponent::myAlert($_GET['myAlert']['type'], $_GET['myAlert']['msg']);
}
?>
<div class="container m-3 listTable">
    <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg" border="1" id="listaBloco">
        <thead class="thead-dark">
            <tr>
                <th scope="col" colspan="9"><a href="<?=$url_site?>/index.php?r=blocos%2Fcadastra-bloco" class="btn btn-light text-dark openModal" >Adicionar</a></th>
            </tr>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Condominio</th>
                <th scope="col">Quantidade de andares</th>
                <th scope="col">Quantidade de unidades</th>
                <th scope="col">Dt de Cadastro</th>
                <th scope="col" colspan="2">Recados</th>
                <th scope="col" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?foreach($blocos as $dados){?>
                <tr data-id="<?=$dados['id']?>">
                    <td><?= $dados['nomeB'] ?></td>
                    <td><?= $dados['nomeCond'] ?></td>
                    <td><?= $dados['andares'] ?></td>
                    <td><?= $dados['qtdUnid'] ?></td>
                    <td><?=yii::$app->formatter->format($dados['dataCadastro'],'date') ?></td>
                    <td><a href="<?=$url_site?>/index.php?r=recados%2Flistar-por-bloco&from_bloco=<?=$dados['id']?>" class="openModal btn btn-dark text-white"><i class="bi bi-chat-square-text-fill"></i></a></td>
                    <td><a href="<?=$url_site?>/index.php?r=recados%2Fcadastra-recado&from_bloco=<?=$dados['id']?>&from_condominio=<?=$dados['from_condominio']?>&redir=blocos/listar-blocos" class="openModal btn btn-dark text-white"><i class="bi bi-plus-circle-dotted"></i></a></td>
                    <td><a href="<?=$url_site?>/index.php?r=blocos%2Fedita-bloco&id=<?=$dados['id']?>" class="openModal btn btn-dark text-white"><i class="bi bi-pencil-square"></i></a></td>
                    <td><a href="<?=$url_site?>/index.php?r=blocos%2Fdeleta-bloco&id=<?=$dados['id']?>" class="removerbloco btn btn-dark text-white"><i class="bi bi-trash-fill"></i></a></td>
                </tr>
            <?} ?>
        </tbody>
    </table>
    <div class="container">
        <div class="row">
            <?= LinkPager::widget(
                [
                    'pagination' => $paginacao, 
                    'linkContainerOptions' => [
                        'class' => 'page-item'
                        ]
                    , 'linkOptions' => [
                        'class' => 'page-link'
                    ],
                    'disabledListItemSubTagOptions' => [
                        'class' => 'page-link'
                    ]
                ]
                ) ?>
           <div class="totalRegistros col-sm-6"><h5>Total Registros<span class="badge"><?=$paginacao->totalCount?></span> </h5></div>
        </div>
    </div>
</div>
    <?=modalComponent::modal();?>