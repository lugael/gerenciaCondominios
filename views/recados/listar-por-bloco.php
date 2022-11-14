<?
use yii\helpers\Url;

$url_site = Url::base(true);
?>

<center>
  <h3>Recados do Bloco</h3>
</center>
<div class="row">
  <?foreach($list as $dados){
    if( date('Y-m-d') <= $dados['dtFim']){
    ?>
  
  <div class="col-12 col-sm-6 col-md-4 ">
    <div class="card recados-bloco border-dark " >
      <div class="card-header bg-info">
        <div class="float-right">
            <button class="btn btn-outline-ligth btn-sm btnEdi edit text-dark"  data-id="<?=$dados['id']?>" id="editRecado"><i class="bi bi-pencil-square"></i></button>
            <a class="text-dark btn btn-outline-ligth btn-sm" id="delRecado" href="<?=$url_site?>/index.php?r=recados%2Fdeleta-recado&id=<?=$dados['id']?>&redir=blocos/listar-blocos"><i id="iconDel" class="bi bi-trash-fill"></i></a>
        </div>
      </div>
      <div class="card-body text-center" style="height: 220px;">
            <h5 class="card-title font-weight-bold border-bottom border-dark" id="titulo"><?=$dados['titulo']?></h5>
            <p class="card-text font-weight-normal" id="conteudo"><?=$dados['conteudo']?></p>
            <p class="font-weight-lighter" id="dtInicio">Inicio  <?=$dados['dtInicio']?>
            <p class="font-weight-lighter" id="dtFim">Fim  <?=$dados['dtFim']?></p>
            <p class="d-none" id="bloco"><?=$dados['from_bloco']?></p>
            <p class="d-none" id="cond"><?=$dados['from_condominio']?></p>
      </div>
    </div>
  </div>
   <?   
   }}?>
</div>
