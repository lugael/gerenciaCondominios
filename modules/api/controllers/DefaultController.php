<?
namespace app\modules\api\controllers;

use yii\web\Controller;

class DefaultController extends Controller{
    public function behaviors() {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::class,
                'cors' => [
                    // restrict access to
                    'Origin' => ['http://localhost', 'https://localhost'],
                    // Allow only POST and PUT methods
                    'Access-Control-Request-Method' => ['POST', 'PUT', 'GET'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Request-Headers' => ['*'],
                    // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                    'Access-Control-Allow-Credentials' => true,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 3600,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                ],
    
            ],
        ];
    }
    public function actionIndex(){
        return $this->render('index');
    }
    
    public function actionGetToken(){
        $fieldName = \yii::$app->request->csrfParam;
        $tokenValue = \yii::$app->request->csrfToken;

        if($fieldName && $tokenValue){
            $result = [
                'field' => $fieldName,
                'token' => $tokenValue
            ];
            return json_encode($result);
        }else{
            return false;
        }
    }
}
?>