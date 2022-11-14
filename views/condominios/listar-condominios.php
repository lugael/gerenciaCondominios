<?

use app\Components\alertComponent;
use app\Components\maskComponent;
use app\Components\modalComponent;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$url_site = Url::base(true);
if(isset($_GET['myAlert'])){
    echo alertComponent::myAlert($_GET['myAlert']['type'], $_GET['myAlert']['msg']);
}
?>

<div class="container m-3 listTable">
    <table class="table   table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl " border="1" id="listaCondominio">
        <thead class="thead-dark">
            <tr>
                <th scope="col" colspan="12"><a href="<?=$url_site?>/index.php?r=condominios%2Fcadastra-condominio" class="text-dark openModal btn btn-light" >Adicionar</a></th>
            </tr>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Administradora</th>
                <th scope="col">Quantidade de bloco</th>
                <th scope="col">CEP</th>
                <th scope="col">Logradouro</th>
                <th scope="col">Dt Cadastro</th>
                <th scope="col" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?foreach($condominios as $dados){?>
                <tr data-id="<?=$dados['id']?>">
                    <td><?= $dados['nomeCond'] ?></td>
                    <td><?= $dados['nome'] ?></td>
                    <td><?= $dados['qtdBloco'] ?></td>
                    <td><?= maskComponent::Mask($dados['cep'],'cep') ?></td>
                    <td><?=$dados['logradouro']?>,<?= $dados['numero'] ?> - <?= $dados['bairro'] ?> - <?= $dados['cidade'] ?> - <?= $dados['estado'] ?></td>
                    <td><?=yii::$app->formatter->format($dados['dataCadastro'],'date') ?></td>
                    <td><a href="<?=$url_site?>/index.php?r=condominios%2Fedita-condominio&id=<?=$dados['id']?>" class="openModal btn btn-dark text-white"><i class="bi bi-pencil-square"></i></a></td>
                    <td><a href="<?=$url_site?>/index.php?r=condominios%2Fdeleta-condominio&id=<?=$dados['id']?>" class="removerCondominio btn btn-dark text-white"><i class="bi bi-trash-fill"></i></a></td>
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
    <?=modalComponent::modal()?>