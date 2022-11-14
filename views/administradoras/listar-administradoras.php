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
        <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg" border="1" id="listaAdm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" colspan="5"><a href="<?=$url_site?>/index.php?r=administradoras%2Fcadastra-administradora" class="btn btn-light text-dark openModal" >Adicionar</a></th>
                </tr>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Dt de Cadastro</th>
                    <th scope="col" colspan="2"></th>
                </tr>
    <? foreach ($administradoras as $dados) {?>
        <tbody>
            <tr data-id="<?=$dados['id']?>">
                <td><?= $dados['nomeAdm'] ?></td>
                <td><?= maskComponent::Mask($dados['cnpj'],'cnpj') ?></td>
                <td><?=yii::$app->formatter->format($dados['dataCadastro'],'date') ?></td>
                <td><a href="<?=$url_site?>/index.php?r=administradoras%2Fedita-administradora&id=<?=$dados['id']?>" class="btn btn-dark  openModal text-white"><i class="bi bi-pencil-square"></i></a></td>
                <td><a href="<?=$url_site?>/index.php?r=administradoras%2Fdeleta-administradora&id=<?=$dados['id']?>" class="removerCliente text-white btn btn-dark"><i class="bi bi-trash-fill"></i></a></td>
                
            </tr>
            <? } ?>
        </tbody>
        
    </table>
    <div class="container ">
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