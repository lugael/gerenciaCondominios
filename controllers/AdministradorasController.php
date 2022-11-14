<?
namespace app\controllers;

use app\Components\alertComponent;
use app\Components\maskComponent;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\AdministradorasModel;
use Yii;

class AdministradorasController extends Controller {
    public function actionListarAdministradoras(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
       
        $query = AdministradorasModel::find();

        $paginacao = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $administradoras = $query->orderBy('nomeAdm')
            ->offset($paginacao->offset)
            ->limit($paginacao->limit)
            ->all();

        return $this->render('listar-administradoras', [
            'administradoras' => $administradoras,
            'paginacao' => $paginacao,
        ]);
    }

    public static function listarAdministradorasSelect(){
        $query = AdministradorasModel::find();

        return $query->orderBy('nomeAdm')->all();
    }

    public function actionCadastraAdministradora(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        return $this->render('cadastra-administradora');
    }

    public function actionRealizaCadastroAdministradora(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = new AdministradorasModel();
            foreach ($request->post() as $ch => $value) {
                if($ch == 'cnpj'){
                    $arrayModel[$ch] = maskComponent::desmak($value);
                }else{
                    $arrayModel[$ch] = $value;
                }
            }
            $model->attributes = $arrayModel;
            $model->save();
            return $this->redirect(['administradoras/listar-administradoras']);
        }
        return $this->render('cadastra-administradora');
    }
    public function actionEditaAdministradora(){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        $request = \yii::$app->request;
        if($request->isGet){
            $query = AdministradorasModel::find();
            $administradora = $query->where(['id' => $request->get()])->one();
        }
        return $this->render('edita-administradora',[
            'edit' => $administradora
        ]);
    }
    public function actionRealizaEdicaoAdministradora(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = AdministradorasModel::findOne($request->post('id'));
            foreach ($request->post() as $ch => $value) {
                if($ch == 'cnpj'){
                    $arrayModel[$ch] = maskComponent::desmak($value);
                }else{
                    $arrayModel[$ch] = $value;
                }
            }
            $model->attributes = $arrayModel;            
            if($model->update()){
                return $this->redirect(['administradoras/listar-administradoras']);
            }else{
                alertComponent::myAlert('danger', "Não foi possivel editar");
            }
        }
        
    } 
    public function actionDeletaAdministradora(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isGet){
            $model = AdministradorasModel::findOne($request->get('id'));
            if($model->delete()){
                return $this->redirect(['administradoras/listar-administradoras','myAlert' => ['type' =>'success', 'msg' =>'Registro deletado']]);
            }else{
                return $this->redirect(['administradoras/listar-administradoras', 'myAlert' => ['type' =>'danger', 'msg' =>'Registro não foi deletado']]);
            }
        }
    }
}
?>