<?
namespace app\modules\api\controllers;

use app\models\BlocosModel;
use app\models\CondominiosModel;
use app\models\RecadosModel;
use Exception;
use yii\base\Controller;

class RecadosController extends Controller{
    public function behaviors() {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::class,
                'cors' => [
                    // restrict access to
                    'Origin' => ['http://localhost:8080', 'https://localhost:8080'],
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
    public function actionTodos(){
        $request = \yii::$app->request;
        $query =  (new \yii\db\Query())
        ->select(
            'rec.id
            rec.conteudo,
            rec.dtInicio,
            rec.dtFim,
            rec.from_bloco,
            rec.from_condominio,
            blo.nomeB,
            cond.nomeCond'
        )
        ->from(RecadosModel::tableName().' rec')
        ->leftJoin(CondominiosModel::tableName().' cond', 'rec.from_condominio = cond.id')
        ->leftJoin(BlocosModel::tableName(). ' blo', 'rec.from_bloco = blo.id');
        $data = $query->orderBy('id')->all();
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
    public function actionListarPorBloco(){
        $request = \yii::$app->request;
        $query = RecadosModel::find();
        $data = $query->where(['from_bloco' => $request->get('from_bloco')])->orderBy('dtInicio')->all();
        $dados = [];
        if($query->count() > 0){
            $dados['endPoint']['status'] = 'success';
            $dados['totalResult'] = $query->count();
            $i = 0;
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
    public function actionBuscarUm(){
        $request = \yii::$app->request;
        $query =  (new \yii\db\Query())
        ->select(
            'rec.id,
            rec.titulo,
            rec.conteudo,
            rec.dtInicio,
            rec.dtFim,
            rec.from_bloco,
            rec.from_condominio,
            blo.nomeB,
            cond.nomeCond'
        )
        ->from(RecadosModel::tableName().' rec')
        ->leftJoin(CondominiosModel::tableName().' cond', 'rec.from_condominio = cond.id')
        ->leftJoin(BlocosModel::tableName(). ' blo', 'rec.from_bloco = blo.id');

        $d = $query->where(['rec.id' => $request->get('id')])->one();
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
                $model = new RecadosModel();
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

    public function actionEdit(){
        $request = \yii::$app->request;
        $dados = [];
        try {
            if($request->isPost){
                $model = RecadosModel::findOne($request->post('id'));
                $model->attributes = $request->post();
                $model->update();
                $dados['endPoint']['status'] ='success';
                $dados['endPoint']['msg'] = 'Edicao feita com sucesso';
               
            }
        } catch (Exception $th) {
            $dados['endPoint']['status'] = 'noData';
            $dados['endPoint']['msg'] = $th;
        }
        return json_encode($dados);
    }

    // public function actionDeleta(){
    //     $request = \yii::$app->request;
    //     $dados = [];
    //     try{
    //         if($request->isPost){
    //             $model = BlocosModel::findOne($request->post('id'));
    //             $model->delete();
    //             $dados['endPoint']['status']='success';
    //             $dados['endPoint']['msg'] = 'Registro deletado com sucesso.';
    //             return json_encode($dados);
    //         }
    //     }catch(Exception $th){
    //         $dados['endPoint']['status']='danger';
    //         $dados['endPoint']['msg'] = $th;
    //         return json_encode($dados);
    //     }
    // }
}

?>
