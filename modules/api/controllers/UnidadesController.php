<?
namespace app\modules\api\controllers;

use app\models\BlocosModel;
use app\models\CondominiosModel;
use app\models\UnidadesModel;
use Exception;
use yii\web\Controller;

class UnidadesController extends Controller{
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
        $qry = (new \yii\db\Query())
        ->select( 
            'unid.id,
            unid.numero,
            unid.metragem,
            unid.qtdVagas,
            blo.nomeB,
            cond.nomeCond')
        ->from(UnidadesModel::tableName().' unid')
        ->leftJoin(BlocosModel::tableName().' blo','  unid.from_bloco = blo.id ')
        ->leftJoin(CondominiosModel::tableName().' cond',' unid.from_bloco = cond.id');
        $data = $qry->orderBy('numero')->all();
        $dados=[];
        $i = 0;
        if($qry->count() > 0){
            $dados['endPoint']['status'] = 'success';
            $dados['totalResult'] = $qry->count();
            foreach ($data as $d) {
                foreach ($d as $ch1 => $da){
                    $dados['resultSet'][$i][$ch1] = $da; 
                }
                $i++;
            }
        }else{
                $dados['endPoint']['status'] = 'noData';
                $dados['endPoint']['msg'] = 'Não existem dados para esta consulta';
        }
        return json_encode($dados);
     
    }
    public function actionGetOne(){
        $request = \yii::$app->request;
        $qry = (new \yii\db\Query())
        ->select( 
            'unid.id,
            unid.numero,
            unid.metragem,
            unid.qtdVagas,
            blo.nomeB,
            cond.nomeCond')
        ->from(UnidadesModel::tableName().' unid')
        ->leftJoin(BlocosModel::tableName().' blo','  unid.from_bloco = blo.id ')
        ->leftJoin(CondominiosModel::tableName().' cond',' unid.from_bloco = cond.id');
        $d = $qry->where(['unid.id' => $request->get('id')])->one();
        if($qry->count() > 0){
            $dados['endPoint']['status'] = 'success';
            foreach($d as $ch => $r){
                $dados['resultSet'][$ch] = [$r];
            }
        }else{
            $dados['endPoint']['status'] ='noData';
            $dados['endPoint']['msg'] = 'Não exite dado para consulta';
        }
        return json_encode($dados);
    }
    public function actionUnidPorBloco(){
        $request = \yii::$app->request;
        $query = UnidadesModel::find();
        $data = $query->where(['from_bloco' => $request->get('from_bloco')])->orderBy('numero')->all();
        $dados = [];
        if($query->count() > 0){
            $dados['endPoint']['status'] = 'success';
            $dados['totalResult'] = $query->count();
            $i = 0;
            foreach($data as $d){
                $dados['resultSet'][$i]['id'] = $d['id'];
                $dados['resultSet'][$i]['numero'] =$d['numero'];
                $i++;
            }
        }else{
            $dados['endPoint']['status'] = 'noData';
            $dados['endPoint']['msg'] ='Não existem dados para esta consulta';
        }
        return json_encode($dados);
    }

    public function actionRegister(){
        $request = \yii::$app->request;
        $dados =[];
        try {
            if($request->isPost){
                $model = new UnidadesModel();
                $model->attributes = $request->post();
                $model->save();
                $dados['endPoint']['status'] = 'success';
                $dados['endPoint']['msg'] = 'Novo registro cadastrado';
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
        try{
            if($request->isPost){
                $model = UnidadesModel::findOne($request->post('id'));
                $model->attributes = $request->post();
                $model->update();
                $dados['endPoint']['status'] = 'success';
                $dados['endPoint']['msg'] = 'Edição feita com sucesso';
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
                $model = UnidadesModel::findOne($request->post('id'));
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