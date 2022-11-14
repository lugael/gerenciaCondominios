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
        <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg" border="1" id="listaUnid">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" colspan="7"><a href="<?=$url_site?>/index.php?r=unidades%2Fcadastra-unidade" class="text-dark btn btn-light openModal" >Adicionar</a></th>
                </tr>   
                <tr>    
                    <th scope="col">Numero</th>
                    <th scope="col">Bloco</th>
                    <th scope="col">Metragem</th>
                    <th scope="col">Quantidade de vagas</th>
                    <th scope="col">DT de cadastro</th>
                    <th scope="col" colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <?foreach($unidades as $dados){?>
                    <tr data-id="<?=$dados['id']?>">
                        <td><?= $dados['numero'] ?></td>
                        <td><?= $dados['nomeB'] ?></td>
                        <td><?= $dados['metragem']?>m²</td>
                        <td><?= $dados['qtdVagas'] ?></td>
                        <td><?=yii::$app->formatter->format($dados['dataCadastro'],'date') ?></td>
                        <td><a href="<?=$url_site?>/index.php?r=unidades%2Fedita-unidade&id=<?=$dados['id']?>" class="openModal btn btn-dark text-white"><i class="bi bi-pencil-square"></i></td>
                        <td><a href="<?=$url_site?>/index.php?r=unidades%2Fdeleta-unidade&id=<?=$dados['id']?>" class="removerunidade btn btn-dark text-white"><i class="bi bi-trash-fill"></i></a></td>
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
    <?=modalComponent::modal();?>