<?

use app\Components\modalComponent;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$url_site = Url::base(true);
?>
<div class="container m-3 container listTable mt-3 justify-content-center">
    <table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg" border="1" id="listaUser">
        <thead class="thead-dark">
            <tr>
                <th scope="col" colspan="5"><a href="<?=$url_site?>/index.php?r=usuario%2Fcadastra-usuario" class="text-dark btn btn-light openModal" >Adicionar</a></th>
            </tr>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Usuario</th>
                <th scope="col">Data Atualização</th>
                <th scope="col" colspan="2"></th>
            </tr>
        </thead>
            <?foreach($usuario as $dados){?>
            <tr data-id="<?=$dados['id']?>">
                <td><?= $dados['nomeUser'] ?></td>
                <td><?= $dados['usuario'] ?></td>  
                <td><?= $dados['dataCadastro'] ?></td>
                <td><a href="<?=$url_site?>/index.php?r=usuario%2Fedita-usuario&id=<?=$dados['id']?>" class="text-white btn btn-dark openModal"><i class="bi bi-pencil-square"></i></td>
                <td><a href="<?=$url_site?>/index.php?r=usuario%2Fdeleta-usuario&id=<?=$dados['id']?>" class="text-white btn btn-dark removerUser"><i class="bi bi-trash-fill"></i></a></td>
            </tr>
            <?} ?>
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