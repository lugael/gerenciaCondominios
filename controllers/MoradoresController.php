<?
namespace app\controllers;

use app\Components\alertComponent;
use app\Components\maskComponent;
use app\models\BlocosModel;
use app\models\CondominiosModel;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\MoradoresModel;
use app\models\UnidadesModel;
use Yii;

class MoradoresController extends Controller{
    public function actionListarMoradores(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $query = (new \yii\db\Query())
            ->select(
                'inq.id,
                inq.nome,
                inq.cpf,
                inq.email,
                inq.telefone,
                inq.senha,
                inq.dtnasc,
                inq.datacadastro,
                unid.numero,
                blo.nomeB,
                cond.nomeCond,
                inq.from_unidade,
                inq.from_condominio,
                inq.from_bloco'
            )
            ->from(MoradoresModel::tableName().' inq')
            ->leftJoin(UnidadesModel::tableName().' unid', 'inq.from_unidade = unid.id')
            ->leftJoin(BlocosModel::tableName().' blo', 'inq.from_bloco = blo.id')
            ->leftJoin(CondominiosModel::tableName().' cond', 'inq.from_condominio = cond.id' );
            
        

        $paginacao = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $moradores = $query->orderBy('nome')
        ->offset($paginacao->offset)
        ->limit($paginacao->limit)
        ->all();
        return $this->render('listar-moradores', [
            'moradores' => $moradores,
            'paginacao' => $paginacao,
        ]);
    }
    public function actionCadastraMorador(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        return $this->render('cadastra-morador');
    }
    public function actionRealizaCadastroMorador(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = new MoradoresModel();
            foreach ($request->post() as $ch => $value) {
                if($ch == 'cpf' || $ch == 'telefone'){
                    $arrayModel[$ch] = maskComponent::desmak($value);
                }else{
                    $arrayModel[$ch] = $value;
                }
            }
            $model->attributes = $arrayModel;
            $model->save();
            return $this->redirect(['moradores/listar-moradores']);
        }
        return $this->render('listar-moradores');
    }

    public function actionEditaMorador(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        $request = \yii::$app->request;
        if($request->isGet){
            $query = MoradoresModel::find();
            $moradores = $query->where(['id' => $request->get()])->one();
        }
        return $this->render('edita-morador',[
            'edit' => $moradores
        ]);
    }
    
    public function actionRealizaEdicaoMorador(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = MoradoresModel::findOne($request->post('id'));
            foreach ($request->post() as $ch => $value) {
                if($ch == 'cpf' || $ch == 'telefone'){
                    $arrayModel[$ch] = maskComponent::desmak($value);
                }else{
                    $arrayModel[$ch] = $value;
                }
            }
            $model->attributes = $arrayModel;           
            if($model->update()){
                return $this->redirect(['moradores/listar-moradores']);
            }else{
                alertComponent::myAlert('danger', "Não foi possivel editar");
            }
        }
    }
    public function actionDeletaMorador(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isGet){
            $model = MoradoresModel::findOne($request->get('id'));
            if($model->delete()){
                return $this->redirect(['moradores/listar-moradores','myAlert' => ['type' =>'success', 'msg' =>'Registro deletado']]);
            }else{
                return $this->redirect(['moradores/listar-moradores', 'myAlert' => ['type' =>'danger', 'msg' =>'Registro não foi deletado']]);
            }
        }
    }
}
?>