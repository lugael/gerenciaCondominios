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
<div class="container my-2 listTable" >
    <div class="row">
        <div class="col-12 ">
            <table class="table table-hover table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" border="1" id="listaClientes">
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col" colspan="8"><a href="<?=$url_site?>/index.php?r=moradores%2Fcadastra-morador" class="text-dark btn btn-light openModal" >Adicionar</a></th>
                    </tr>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Bloco</th>
                        <th scope="col">CPF</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Data de nascimento</th>
                        <th scope="col" colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?foreach( $moradores as $dados){?>
                        <tr data-id="<?=$dados['id']?>">
                            <td><?= $dados['nome'] ?></td>
                            <td><?= $dados['nomeB'] ?></td>
                            <td><?=maskComponent::Mask($dados['cpf'],'cpf') ?></td>
                            <td><?= $dados['email'] ?></td>
                            <td><?=maskComponent::telMask( $dados['telefone']) ?></td>
                            <td><?=yii::$app->formatter->format($dados['dtnasc'],'date') ?></td>
                            <td><a href="<?=$url_site?>/index.php?r=moradores%2Fedita-morador&id=<?=$dados['id']?> " class="openModal btn btn-dark text-white"><i class="bi bi-pencil-square"></i></td>
                            <td><a href="<?=$url_site?>/index.php?r=moradores%2Fdeleta-morador&id=<?=$dados['id']?>" class="removerCliente btn btn-dark text-white"><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                    <?} ?>
                </tbody> 
            </table>
        </div>
    </div>
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