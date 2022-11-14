<?
namespace app\modules\api\controllers;

use app\models\AdministradorasModel;
use Exception;
use yii\web\Controller;

class AdministradorasController extends Controller{
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
    public function actionGetAll(){
        $qry = AdministradorasModel::find();
        $data = $qry->orderBy('nomeAdm')->all();
        $dados = [];
        $i = 0;

        if($qry->count() > 0){
            $dados['endPoint']['status'] = 'success';
            $dados['totalResult'] = $qry->count();
            foreach ($data as $d) {
                $dados['resultSet'][$i]['id'] = $d['id'];
                $dados['resultSet'][$i]['nomeAdm'] = $d['nomeAdm'];
                $dados['resultSet'][$i]['cnpj'] = $d['cnpj'];
                $i++;
            }
        }else{
            $dados['endPoint']['status'] = 'noData';
            $dados['endPoint']['msg'] = 'Não existem dados para este consumo.';
        }
        return json_encode($dados);
    }

    public function actionGetOne(){
        $request= \yii::$app->request;
        $qry = AdministradorasModel::find();
        $d = $qry->where(['id' => $request->get('id')])->one();

        if($qry->count() > 0){
            $dados['endPoint']['status'] ='success';
            $dados['resultSet'][0]['id'] = $d['id'];
            $dados['resultSet'][0]['nomeAdm'] = $d['nomeAdm'];
            $dados['resultSet'][0]['cnpj'] = $d['cnpj'];
        }else{
            $dados['endPoint']['status'] = 'noData';
            $dados['endPoint']['msg'] = 'Não existem dados para este consumo.';
        }
        return json_encode($dados);
    }

    

    public function actionRegister(){
        $request = \yii::$app->request;
        $dados = [];
        try {
            if($request->isPost){
                $model = new AdministradorasModel(); 
                $model->attributes = $request->post();
                if($model->save()){
                    $dados['endPoint']['status'] = 'success';
                    $dados['endPoint']['msg'] = 'Registro inserido com sucesso.';
                }else{
                    $dados['endPoint']['status'] = 'noData';
                    $dados['endPoint']['msg'] = 'Não foi possivel editar';
                }            
            }
        } catch (Exception $th) {
            $dados['endPoint']['status'] = 'noData';
            $dados['endPoint']['msg'] = $th;
            
           
        }
        return json_encode($dados);
    }
    public function actionEditOne(){
        $request = \yii::$app->request;
        try{
            if($request->isPost){
                $model = AdministradorasModel::findOne($request->post('id'));
                $model->attributes = $request->post();
                $model->update();
                $dados = [];
                $dados['endPoint']['status'] = 'success';
                $dados['endPoint']['msg'] = 'Registro editado';
                return json_encode($dados);
            }
        }catch(Exception $th){
            $dados['endPoint']['status'] = 'noData';
            $dados['endPoint']['msg'] = $th;
            return json_encode($dados);
        }
    }

    public function actionDel(){
        $request = \yii::$app->request;
        $dados = [];
        try{
            if($request->isPost){
                $model = AdministradorasModel::findOne($request->post('id'));
                $model->delete();
                $dados['endPoint']['status'] = 'success';
                $dados['endPoint']['msg'] = 'Registro deletado sucesso';
                return json_encode($dados);
            }
        }catch(Exception $th){
            $dados['endPoint']['status']='success';
            $dados['endPoint']['msg'] = $th;
            return json_encode($dados);
        }
    }
}

?>