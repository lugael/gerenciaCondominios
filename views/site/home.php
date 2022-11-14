<?

use app\Components\modalComponent;
use app\controllers\SiteController;
use yii\helpers\Html;

$this->title = "Página Home";
use yii\helpers\Url;

$url_site = Url::base(true);
?>

  <div class="card principal col-12">
    <div class="col-12 text-center text-white">
      <h1 class="display-4">Recados de bloco</h1>
    </div>
    <div class="card-body ">
      <div class= "row" >
          <a href="<?=$url_site?>/index.php?r=recados%2Fcadastra-recado&redir=site/home" class="btn btn-dark openModal text-light"><i class="bi bi-plus-circle-dotted"></i></a>
        <button class="btn btn-dark ml-1" type="button" data-toggle="collapse" data-target="#recadosGerais" aria-expanded="false" aria-controls="collapseExample" id="buttonCollapse">
          Lista
        </button>
      </div>
      
    </div>
    <div class="row">
    <div class="collapse listaRecados  modal-dialog-scrollable " id="recadosGerais">
        <div class="todosRecados ">
        
        </div>
    </div>
</div>
  </div>


<div class="row d-flex justify-content-center">
  <div class="col-12 ">
    <div class="card mt-3 principal  text-center " id="contador">
        <div class="col-12 text-center text-white ">
            <h1 class="display-4">Cadastros no sistema</h1>
        </div>
      <div class="card-body">
        <div  class="row">
          <div class="container">
            <canvas id="myChart" class="chart "></canvas>
            <?foreach(SiteController::countDashboard()  as $ch => $value){?>
            <script>       
                var yValues =[ <?=$value['administradora']?>,<?=$value['condominios']?>,<?=$value['blocos']?>,<?=$value['unidades']?>,<?=$value['moradores']?>,<?=$value['conselho'] ?>]; 
                <?}?>
                var xValues = ["Administradora", "Condominios", "Blocos", "Unidades", "Moradores","Conselho"];
                var barColors = [
                    "#b91d47",
                    "#00aba9",
                    "#2b5797",
                    "#e8c3b9",
                    "#1e7145",
                    "black"
                  ];
                new Chart("myChart", {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                      backgroundColor: barColors,
                      data: yValues
                    }]
                  },
                });       
            </script>
          </div> 
        </div>
      </div>
    </div>

</div>

<?=modalComponent::modal()?>