<?
use app\Components\modalComponent;
use yii\helpers\Url;

$url_site = Url::base(true);
?>

  <?foreach($recados as $dados){?>
  
  <div class="mt-2 d-inline-block " >
    <div class="card card-recados border-dark " >
      <div class="card-header bg-info">
        <div class="float-right">
            <a class="openModal text-dark btn btn-outline-ligth btn-sm" href="<?=$url_site?>/index.php?r=recados%2Fedita-recado&id=<?=$dados['id']?>" ><i class="bi bi-pencil-square"></i></a>
            <a class="text-dark btn btn-outline-ligth btn-sm" id="delRecado" href="<?=$url_site?>/index.php?r=recados%2Fdeleta-recado&id=<?=$dados['id']?>&redir=site/home"><i id="iconDel" class="bi bi-trash-fill"></i></a>
        </div>
      </div>
      <div class="card-body card-recados-body text-center input-group-sm" >
          <div class="container justify-content-center">
            <h5 class="card-title font-weight-bold border-bottom border-dark" id="titulo"><?=$dados['titulo']?></h5>
          </div>
            <p class="card-text font-weight-normal" id="conteudo"><?=$dados['conteudo']?></p>
            <h7 class="card-title" id="bloco"><?=$dados['nomeB']?></h7>
            <h7 class="card-subtitle mb-2 text-muted" id="cond"><?=$dados['nomeCond']?></h7>
            <p class="font-weight-lighter" id="dtInicio">Inicio  <?=$dados['dtInicio']?>
            <p class="font-weight-lighter" id="dtFim">Fim  <?=$dados['dtFim']?></p>
      </div>
    </div>
  </div>
   <?}?>

<?=modalcomponent::modal();?>