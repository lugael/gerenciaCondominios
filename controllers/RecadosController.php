<?
namespace app\controllers;

use app\Components\alertComponent;
use app\models\BlocosModel;
use app\models\CondominiosModel;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\RecadosModel;
use Yii;

class RecadosController extends Controller {
    public function actionListarRecados(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        $query = (new \yii\db\Query())
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

        $recados = $query->orderBy('rec.id')->all();          
        return $this->render('listar-recados', [
            'recados' => $recados,
        ]);
    }
    public function actionListarPorBloco(){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        $request = \yii::$app->request;
        if($request->isGet){
            $query = RecadosModel::find();
            $recados = $query->where(['from_bloco' => $request->get()])->all();
        }
        return $this->render('listar-por-bloco',[
            'list' => $recados
        ]);
        
    }

    public function actionCadastraRecado(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        $request = \yii::$app->request;
        if($request->isGet){
           $redirSite = $request->get('redir');
        }
        return $this->render('cadastra-recado',['redirec' => $redirSite]);
    }

    public function actionRealizaCadastroRecado(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = new RecadosModel();
            $model->attributes = $request->post();
            $model->save();
            return $this->redirect(['site/home']);
        }
        return $this->render('site/home');
    }

    public function actionRealizaCadastroRecadoBloco(){
        if(Yii::$app->user->isGuest){
           return $this->redirect(['site/login']);
       }
       $request = \yii::$app->request;
       if($request->isPost){
           $model = new RecadosModel();
           $model->attributes = $request->post();
           $model->save();
           return $this->redirect(['blocos/listar-blocos']);
       }
       return $this->render('blocos/listar-blocos');
   }

    public function actionEditaRecado(){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        $request = \yii::$app->request;
        if($request->isGet){
            $query = RecadosModel::find();
            $recados = $query->where(['id' => $request->get()])->one();
        }
        return $this->render('edita-recado',[
            'edit' => $recados
        ]);
    }
    public function actionRealizaEdicaoRecado(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = RecadosModel::findOne($request->post('id'));
            $model->attributes = $request->post();
            
            if($model->update()){
                return $this->redirect(['site/home']);
            }else{
                alertComponent::myAlert('danger', "Não foi possivel editar");
            }
        }
        
    } 
    public function actionDeletaRecado(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isGet){
            $model = RecadosModel::findOne($request->get('id'));
            if($model->delete()){
                $redir = $request->get('redir');
                return $this->redirect([$redir,'myAlert' => ['type' =>'success', 'msg' =>'Registro deletado']]);
            }else{
                return $this->redirect([$redir, 'myAlert' => ['type' =>'danger', 'msg' =>'Registro não foi deletado']]);
            }
        }
    }
}
?>