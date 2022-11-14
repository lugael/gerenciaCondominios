<?
namespace app\controllers;

use app\Components\alertComponent;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\User;
use Yii;

class UsuarioController extends Controller{
    public function actionListarUsuario(){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }   
        $query = User::find();

        $paginacao = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $usuario = $query->orderBy('nomeUser')
        ->offset($paginacao->offset)
        ->limit($paginacao->limit)
        ->all();
        
        return $this->render('listar-usuario', [
            'usuario' => $usuario,
            'paginacao' => $paginacao, 
        ]);
    }
    public function actionCadastraUsuario(){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        return $this->render('cadastra-usuario');
    }
    public function actionRealizaCadastroUsuario(){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = new User();
            $model->attributes = $request->post();
            $model->save();

             return $this->redirect(['usuarios/listar-usuario']);
        
        }
        return $this->render('listar-usuario');
    }
    public function actionEditaUsuario(){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        $request = \yii::$app->request;
        if($request->isGet){
            $query = User::find();
            $usuario = $query->where(['id' => $request->get()])->one();
        }
        return $this->render('edita-usuario',[
            'edit'=> $usuario
        ]);
    }
    public function actionRealizaEdicaoUsuario(){
        if(Yii::$app->user->isGuest){
           return $this->redirect(['site/login']);
       }
       $request = \yii::$app->request;
       if($request->isPost){
           $model = User::findOne($request->post('id'));
           $model->attributes = $request->post();
           
           if($model->update()){
               return $this->redirect(['usuario/listar-usuario']);
           }else{
               alertComponent::myAlert('danger', "Não foi possivel editar");
           }
       }
       
    }
    public function actionDeletaUsuario(){
        if(Yii::$app->user->isGuest){
           return $this->redirect(['site/login']);
       }
       $request = \yii::$app->request;
       if($request->isGet){
           $model = user::findOne($request->get('id'));
           if($model->delete()){
               return $this->redirect(['usuario/listar-usuario','myAlert' => ['type' =>'success', 'msg' =>'Registro deletado']]);
           }else{
               return $this->redirect(['usuario/listar-usuario', 'myAlert' => ['type' =>'danger', 'msg' =>'Registro não foi deletado']]);
           }
       }
   }
}
?>