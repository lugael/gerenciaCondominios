<?
namespace app\controllers;

use yii;
use yii\base\Controller;

class userLogado extends Controller{
    public static function isLogado(){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
    }
}
?>