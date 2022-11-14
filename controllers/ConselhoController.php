<?
namespace app\controllers;

use app\Components\alertComponent;
use app\models\CondominiosModel;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\ConselhoModel;
use Yii;

class ConselhoController extends Controller{
    public function actionListarConselho(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }

        $query =  (new \yii\db\Query())
        ->select('
        cons.id,
        cons.nomeCons,
        cons.funcao,
        cons.dataCadastro,
        cond.nomeCond,
        cons.from_condominio
        ')
        ->from(ConselhoModel::tableName().' cons')
        ->leftJoin(CondominiosModel::tableName().' cond', 'cons.from_condominio = cond.id');

        $paginacao = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $conselho = $query->orderBy('from_condominio')
        ->offset($paginacao->offset)
        ->limit($paginacao->limit)
        ->all();
        
        return $this->render('listar-conselho', [
            'conselho' => $conselho,
            'paginacao' => $paginacao, 
        ]);
    }
    public function actionCadastraConselho(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        return $this->render('cadastra-conselho');
    }
    public function actionRealizaCadastroConselho(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = new ConselhoModel();
            $model->attributes = $request->post();
            $model->save();

             return $this->redirect(['conselho/listar-conselho']);
        
        }
        return $this->render('listar-conselho');
    }
    public function actionEditaConselho(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        $request = \yii::$app->request;
        if($request->isGet){
            $query = ConselhoModel::find();
            $conselho = $query->where(['id' => $request->get()])->one();
        }
        return $this->render('edita-conselho',[
            'edit' => $conselho
        ]);
    }
    public function actionRealizaEdicaoConselho(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = ConselhoModel::findOne($request->post('id'));
            $model->attributes = $request->post();
            
            if($model->update()){
                return $this->redirect(['conselho/listar-conselho']);
            }else{
                alertComponent::myAlert('danger', "Não foi possivel editar");
            }
        }
    } 
    public function actionDeletaConselho(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isGet){
            $model = ConselhoModel::findOne($request->get('id'));
            if($model->delete()){
                return $this->redirect(['conselho/listar-conselho','myAlert' => ['type' =>'success', 'msg' =>'Registro deletado']]);
            }else{
                return $this->redirect(['conselho/listar-conselho', 'myAlert' => ['type' =>'danger', 'msg' =>'Registro não foi deletado']]);
            }
        }
    }
}

?>