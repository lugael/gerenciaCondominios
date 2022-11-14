<?
namespace app\modules\api\controllers;

use app\models\BlocosModel;
use app\models\CondominiosModel;
use Exception;
use yii\base\Controller;

class BlocosController extends Controller{
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
        $request = \yii::$app->request;
        $query =  (new \yii\db\Query())
        ->select(
        'blo.id,
        blo.nomeB,
        blo.andares,
        blo.qtdUnid,
        blo.dataCadastro,
        cond.nomeCond,
        blo.from_condominio')
        ->from(BlocosModel::tableName().' blo')
        ->leftJoin(CondominiosModel::tableName().' cond','blo.from_condominio = cond.id');
        $data = $query->orderBy('nomeB')->all();
        $dados = [];
        $i = 0;
        if($query->count() > 0){
            $dados['endPoint']['status'] = 'success';
            $dados['totalResult'] = $query->count();
            foreach($data as $d){
                foreach($d as $ch => $da){
                    $dados['resultSet'][$i][$ch] = $da;
                }
                $i++;
            }
        }else{
            $dados['endPoint']['status'] = 'noData';
            $dados['endPoint']['msg'] ='Não existem dados para esta consulta';
        }
        return json_encode($dados);
    }
    public function actionBlocosPorCond(){
        $request = \yii::$app->request;
        $query = BlocosModel::find();
        $data = $query->where(['from_condominio' => $request->get('from_condominio')])->orderBy('nomeB')->all();
        $dados = [];
        if($query->count() > 0){
            $dados['endPoint']['status'] = 'success';
            $dados['totalResult'] = $query->count();
            $i = 0;
            foreach($data as $d){
                $dados['resultSet'][$i]['id'] = $d['id'];
                $dados['resultSet'][$i]['nomeB'] =$d['nomeB'];
                $i++;
            }
        }else{
            $dados['endPoint']['status'] = 'noData';
            $dados['endPoint']['msg'] ='Não existem dados para esta consulta';
        }
        return json_encode($dados);
    }
    public function actionGetOne(){
        $request = \yii::$app->request;
        $query =  (new \yii\db\Query())
        ->select(
        'blo.id,
        blo.nomeB,
        blo.andares,
        blo.qtdUnid,
        blo.dataCadastro,
        cond.nomeCond,
        blo.from_condominio')
        ->from(BlocosModel::tableName().' blo')
        ->leftJoin(CondominiosModel::tableName().' cond','blo.from_condominio = cond.id');
        $d = $query->where(['blo.id' => $request->get('id')])->one();
        if($query->count() > 0){
            $dados['endPoint']['status'] = 'success';
            foreach ($d as $ch => $r) {
                $dados['resultSet'][$ch]=[$r];
            }
        }else{
            $dados['endPoint']['status'] ='noData';
            $dados['endPoint']['msg'] = 'não exite dados para consulta';
        }
        return json_encode($dados);
    }
    
    public function actionRegister(){
        $request = \yii::$app->request;
        $dados =[];
        try {
            if($request->isPost){
                $model = new BlocosModel();
                $model->attributes = $request->post();
                $model->save();
                $dados['endPoint']['status'] = 'success';
                $dados['endPoint']['msg'] = 'Novo registro cadastro';
                return json_encode($dados);
            }
        } catch (Exception $th) {
            $dados['endPoint']['status'] = 'noData';
            $dados['endPoint']['msg'] = $th;
            return json_encode($dados);
        }
    }

    public function actionEditOne(){
        $request = \yii::$app->request;
        $dados = [];
        try {
            if($request->isPost){
                $model = Blocosmodel::findOne($request->post('id'));
                $model->attributes = $request->post();
                $model->update();
                $dados['endPoint']['status'] ='success';
                $dados['endPoint']['msg'] = 'Edicao feita com sucesso';
                return json_encode($dados);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function actionDel(){
        $request = \yii::$app->request;
        $dados = [];
        try{
            if($request->isPost){
                $model = BlocosModel::findOne($request->post('id'));
                $model->delete();
                $dados['endPoint']['status']='success';
                $dados['endPoint']['msg'] = 'Registro deletado com sucesso.';
                return json_encode($dados);
            }
        }catch(Exception $th){
            $dados['endPoint']['status']='danger';
            $dados['endPoint']['msg'] = $th;
            return json_encode($dados);
        }
    }
}

?>
