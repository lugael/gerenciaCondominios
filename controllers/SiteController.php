<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\User;


class SiteController extends Controller{

    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex(){
        if(yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }        
        return $this->render('home');
    }
    public function actionHome(){
        if(yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }        
        return $this->render('home');
    }

    public function actionLogin(){
        $this->layout = false;
        if(!yii::$app->user->isGuest){
            return $this->goHome();
        }
        
        $request = \yii::$app->request;
        if($request->isPost){
            $identity = User::findOne(['usuario' => $request->post('usuario'), 'senha' => $request->post('senha')]);
            if($identity){
                yii::$app->user->login($identity);
                return $this->redirect(['home']);
            }else{
                return $this->redirect(['login', 'myAlert' => ['type' => 'warning', 'msg' => 'Dados de usuários não conferem', 'redir' => 'index.php?r=site/login']]);
            }
        }
        return $this->render('login');

    }
    public function actionLogout(){
        yii::$app->user->logout();
        return $this->redirect(['site/login']);
    }
    public static function countDashboard(){
        $query = \yii::$app->db->createCommand('
        SELECT
        COUNT(inq.id) AS moradores,
        (SELECT COUNT(unid.id) FROM ac_unidade unid) AS unidades,
        (SELECT COUNT(blo.id) FROM ac_bloco blo) AS blocos,
        (SELECT COUNT(cond.id) FROM ac_condominio cond) AS condominios,
        (SELECT COUNT(cons.id) FROM ac_conselho cons) AS conselho,
        (SELECT COUNT(admins.id) FROM ac_administradora admins) AS administradora
        FROM
        ac_inquilino inq')->queryAll();
        return $query;
    }


}
