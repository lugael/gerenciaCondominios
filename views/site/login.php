<?

use app\Components\alertComponent;
use yii\helpers\Url;
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <title>ApControl</title>
</head>
<body style="background-color:#1A3C40">
    <main class="container">
        <center>
            <?=(isset($_GET['myAlert'])) ? alertComponent::myAlert($_GET['myAlert']['type'], $_GET['myAlert']['msg'], $_GET['myAlert']['redir']) : '';?>
            <div class="login">
                <div class="card text-center " id="listaCondEmorad" style="width: 50vh; margin-top:15vh;">
                    <div class="card-body shadow" style="background-color: #fcfbdc;">
                        <form action="<?=Url::to(['site/login']);?>" method="POST" class="form-signin">
                            <img class="mb-4" src="img/logo.png" alt="" width="200" height="150">  
                            <h4 class="display-4 mb-3 font-weight-bold text-dark">Condmino's </h4>
                            <div class="form-group">
                                <input type="text" name="usuario" class="form-control rounded-pill " placeholder="Usuario" required autofocus>
                                <input type="password" name="senha" class="form-control mb-1 rounded-pill" placeholder="Senha" required>
                                <input type="hidden" name="<?=\yii::$app->request->csrfParam;?>" value="<?=\yii::$app->request->csrfToken;?>">
                                <button class="btn btn-lg btn-dark btn-block shadow" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </center>
    </main>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
