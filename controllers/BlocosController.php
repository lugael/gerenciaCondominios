<?
namespace app\controllers;

use app\Components\alertComponent;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\BlocosModel;
use app\models\CondominiosModel;
use Yii;

class BlocosController extends Controller{
    public function actionListarBlocos(){
            if(Yii::$app->user->isGuest){
                return $this->redirect(['site/login']);
            }

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

        $paginacao = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $blocos = $query->orderBy('cond.nomeCond')
        ->offset($paginacao->offset)
        ->limit($paginacao->limit)
        ->all();
        return $this->render('listar-blocos',[
            'blocos' => $blocos,
            'paginacao' => $paginacao,
        ]);
    }

    public static function listarBlocosSelect(){
        $query = BlocosModel::find();
        return $query->orderBy('nomeB')->all();
    }

    public static function listarEditBlocosSelect($from){
        $query = BlocosModel::find();
        $data = $query->where(['from_condominio' => $from])->orderBy('nomeB')->all();
        return $data;
    }

    public function actionListarBlocosApi(){
            if(Yii::$app->user->isGuest){
                return $this->redirect(['site/login']);
            }
        $request = \yii::$app->request;
        $query = BlocosModel::find();
        $data = $query->where(['from_condominio' => $request->post()])->orderBy('nomeB')->all();
        $dados = array();
        $i = 0;
        foreach($data as $d){
            $dados[$i]['id'] = $d['id'];
            $dados[$i]['nomeB'] = $d['nomeB'];
            $i++;
        }
        return json_encode($dados);
    }
    
    public function actionCadastraBloco(){
            if(Yii::$app->user->isGuest){
                return $this->redirect(['site/login']);
            }
        $this->layout = false;
        return $this->render('cadastra-bloco');
    }
    
    public function actionRealizaCadastroBloco(){
            if(Yii::$app->user->isGuest){
                return $this->redirect(['site/login']);
            }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = new BlocosModel();
            $model->attributes = $request->post();
            $model->save();
            return $this->redirect(['blocos/listar-blocos']);
        }
        return $this->render('listar-blocos');
    }
    public function actionEditaBloco(){
            if(Yii::$app->user->isGuest){
                return $this->redirect(['site/login']);
            }
        $this->layout = false;
        $request = \yii::$app->request;
        if($request->isGet){
            $query = BlocosModel::find();
            $bloco = $query->where(['id'=> $request->get()])->one();
        }
        return $this->render('edita-bloco',[
            'edit' => $bloco
        ]);
    }
    public function actionRealizaEdicaoBloco(){
            if(Yii::$app->user->isGuest){
                return $this->redirect(['site/login']);
            }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = BlocosModel::findOne($request->post('id'));
            $model->attributes = $request->post();
            
            if($model->update()){
                return $this->redirect(['blocos/listar-blocos']);
            }else{
                alertComponent::myAlert('danger', "Não foi possivel editar");
            }
        }
        
    } 
    public function actionDeletaBloco(){
            if(Yii::$app->user->isGuest){
                return $this->redirect(['site/login']);
            }
        $request = \yii::$app->request;
        if($request->isGet){
            $model = BlocosModel::findOne($request->get('id'));
            if($model->delete()){
                return $this->redirect(['blocos/listar-blocos','myAlert' => ['type' =>'success', 'msg' =>'Registro deletado']]);
            }else{
                return $this->redirect(['blocos/listar-blocos', 'myAlert' => ['type' =>'danger', 'msg' =>'Registro não foi deletado']]);
            }
        }
    }
}
?>
