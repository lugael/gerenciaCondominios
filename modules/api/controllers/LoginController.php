<?
namespace app\modules\api\controllers;

use Exception;
use app\models\User;
use Yii;
use yii\base\Controller;

class LoginController extends Controller{
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
        $request = \yii::$app->request;

        try{
            if($request->isPost){
                $identity = User::findOne(['usuario' => $request->post('usuario'),'senha' => $request->post('senha')]);
                if($identity){
                    yii::$app->user->login($identity);
                    $dados['endPoint']['status'] ='success';
                    return json_encode($dados);
                }else{
                    $dados['endPoint']['staus'] = 'noLogin';
                    $dados['endPoin']['msg'] = 'dados não conferem';
                    return json_encode($dados);
                }
            }
        }catch(Exception $th){

            $dados['endPoint']['status'] = 'noLogin';
            $dados['endPoint']['msg'] = $th;
            return json_encode($dados);
        }
    }
}
?>