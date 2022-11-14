<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script><?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<i class="icofont-ui-edit"></i>
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="img/logo.png" width="80px" style="border-radius: 55%;"/>',
        'brandUrl' => 'http://localhost/luisgabriel_yii/web/index.php?r=site%2Fhome',
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark text-light fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            [
                'label' => 'Home',
                'url' => ['site/home']
            ],
            [
                'label'=>'Administradoras',
                'url' =>['administradoras/listar-administradoras']

            ],
            [
                'label'=>'Condominios',
                'url' => ['condominios/listar-condominios']
                
            ],
            [
                'label'=>'Blocos',
                'url' => ['blocos/listar-blocos']
                  
            ],
            [
                'label'=>'Unidades', 
                'url' => ['unidades/listar-unidades']
                   
            ],
            [
                'label'=>'Moradores',
                'url' => ['moradores/listar-moradores']

            ],
            [
                'label'=>'Conselho',
                'url' => ['conselho/listar-conselho']
                   
            ],
            [
                'label'=>'Usuário',
                'url' => ['usuario/listar-usuario']
               
            ],
            yii::$app->user->isGuest ? (
                ['label' => 'login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'from-inline'])
                . Html::submitButton(
                    'Logout(' . yii::$app->user->identity->usuario . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
            
            
            
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0 my-5 ">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<footer class="footer mt-auto py-3 bg-dark text-light">
    <div class="container">
        <p class="float-left">&copy; Condmino's <?= date('Y') ?></p>
        <p class="float-right">Contato com suporte <a href="https://wa.me/message/45ZUL7O4TC3JO1">(47)9 9214-8270</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
