<?
namespace app\modules\api\controllers;

use app\models\BlocosModel;
use app\models\CondominiosModel;
use app\models\MoradoresModel;
use app\models\UnidadesModel;
use Exception;
use yii\web\Controller;

class MoradoresController extends Controller{
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
            'mor.id,
            mor.nome,
            mor.cpf,
            mor.email,
            mor.telefone,
            mor.dtnasc,
            unid.numero,
            blo.nomeB,
            cond.nomeCond,
            cond.cep,
            cond.logradouro,
            cond.numero,
            cond.cidade,
            cond.estado')
        ->from(MoradoresModel::tableName().' mor')
        ->leftJoin(UnidadesModel::tableName().' unid' , ' mor.from_unidade = unid.id')
        ->leftJoin(BlocosModel::tableName().' blo','  mor.from_bloco = blo.id ')
        ->leftJoin(CondominiosModel::tableName().' cond',' mor.from_bloco = cond.id');
        $data = $qry->orderBy('nome')->all();
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
            'mor.id,
            mor.nome,
            mor.cpf,
            mor.email,
            mor.telefone,
            mor.dtnasc,
            unid.numero,
            blo.nomeB,
            cond.nomeCond,
            cond.cep,
            cond.logradouro,
            cond.numero,
            cond.cidade,
            cond.estado')
        ->from(MoradoresModel::tableName().' mor')
        ->leftJoin(UnidadesModel::tableName().' unid' , ' mor.from_unidade = unid.id')
        ->leftJoin(BlocosModel::tableName().' blo','  mor.from_bloco = blo.id ')
        ->leftJoin(CondominiosModel::tableName().' cond',' mor.from_bloco = cond.id');
        $d = $qry->where(['mor.id' => $request->get('id')])->one();
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

    public function actionRegister(){
        $request = \yii::$app->request;
        $dados =[];
        try {
            if($request->isPost){
                $model = new MoradoresModel();
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
                $model = MoradoresModel::findOne($request->post('id'));
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
                $model = MoradoresModel::findOne($request->post('id'));
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