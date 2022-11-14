<?

use app\Components\alertComponent;
use app\Components\modalComponent;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$url_site = Url::base(true);
if(isset($_GET['myAlert'])){
    echo alertComponent::myAlert($_GET['myAlert']['type'], $_GET['myAlert']['msg']);
}
?>
<div class="container m-3 listTable">
    <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg" border="1" id="listaConselho">
        <thead class="thead-dark ">
            <tr>
                <th scope="col" colspan="6"><a href="<?=$url_site?>/index.php?r=conselho%2Fcadastra-conselho" class="text-dark btn btn-light openModal" >Adicionar</a></th>
            </tr>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Fução</th>
                <th scope="col">Condominio</th>
                <th scope="col">Dt de cadastro</th>
                <th scope="col" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?foreach( $conselho as $dados){?>
                <tr data-id="<?=$dados['id']?>">
                    <td><?= $dados['nomeCons'] ?></td>
                    <td><?= $dados['funcao'] ?></td>
                    <td><?= $dados['nomeCond'] ?></td>
                    <td><?=yii::$app->formatter->format($dados['dataCadastro'],'date') ?></td>
                    <td><a href="<?=$url_site?>/index.php?r=conselho%2Fedita-conselho&id=<?=$dados['id']?>" class="openModal btn btn-dark text-white"><i class="bi bi-pencil-square"></i></td>
                    <td><a href="<?=$url_site?>/index.php?r=conselho%2Fdeleta-conselho&id=<?=$dados['id']?>" class="removerConselho btn btn-dark text-white"><i class="bi bi-trash-fill"></i></a></td>
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
    <?=modalComponent::modal()?>