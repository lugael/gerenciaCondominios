<?
namespace app\controllers;

use app\Components\alertComponent;
use app\models\BlocosModel;
use app\models\CondominiosModel;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\UnidadesModel;
use Yii;

class UnidadesController extends Controller{
    public function actionListarUnidades(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        
        $query =  (new \yii\db\Query())
        ->select('unid.id,
        unid.numero,
        unid.metragem,
        unid.qtdVagas,
        unid.dataCadastro,
        cond.nomeCond,
        blo.nomeB,
        unid.from_bloco,
        unid.from_condominio')
        ->from(UnidadesModel::tableName().' unid')
        ->leftJoin(CondominiosModel::tableName().' cond', 'unid.from_condominio = cond.id')
        ->leftJoin(BlocosModel::tableName().' blo', 'unid.from_bloco = blo.id');

        $paginacao = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $unidades = $query->orderBy('nomeB')
        ->offset($paginacao->offset)
        ->limit($paginacao->limit)
        ->all();

        return $this->render('listar-unidades', [
            'unidades' => $unidades,
            'paginacao' => $paginacao,
        ]);
    }
    public static function listarUnidadesSelect(){
        $query = UnidadesModel::find();
        return  $query->orderBy('numero')->all();
    }
    public static function listarEditUnidadesSelect($from){
        $query = UnidadesModel::find();
        $data = $query->where(['from_bloco' => $from])->orderBy('numero')->all();
        return $data;
    }
    public function actionListarUnidadesApi(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        $query = UnidadesModel::find();
        $data = $query->where(['from_bloco' => $request->post()])->orderBy('numero')->all();
        $dados = array();
        $i = 0;
        foreach($data as $d){
            $dados[$i]['id'] = $d['id'];
            $dados[$i]['numero'] = $d['numero'];
            $i++;
        }
        return json_encode($dados);
    }

    public function actionCadastraUnidade(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        return $this->render('cadastra-unidade');
    }

    public function actionRealizaCadastroUnidade(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = new UnidadesModel();
            $model->attributes = $request->post();
            $model->save();
            return $this->redirect(['unidades/listar-unidades']);
        }
        return $this->render('listar-unidades');
    }

    public function actionEditaUnidade(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        $request = \yii::$app->request;
        if($request->isGet){
            $query = UnidadesModel::find();
            $unidades = $query->where(['id' => $request->get()])->one();
        }
        return $this->render('edita-unidade',[
            'edit' => $unidades
        ]);
    }
    public function actionRealizaEdicaoUnidade(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = UnidadesModel::findOne($request->post('id'));
            $model->attributes = $request->post();
            
            if($model->update()){
                return $this->redirect(['unidades/listar-unidades']);
            }else{
                alertComponent::myAlert('danger', "Não foi possivel editar");
            }
        }
        
    }
    public function actionDeletaUnidade(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isGet){
            $model = UnidadesModel::findOne($request->get('id'));
            if($model->delete()){
                return $this->redirect(['unidades/listar-unidades','myAlert' => ['type' =>'success', 'msg' =>'Registro deletado']]);
            }else{
                return $this->redirect(['unidades/listar-unidades', 'myAlert' => ['type' =>'danger', 'msg' =>'Registro não foi deletado']]);
            }
        }
    }
}
?>