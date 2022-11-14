<?
namespace app\controllers;

use app\Components\alertComponent;
use app\Components\maskComponent;
use app\models\AdministradorasModel;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\CondominiosModel;
use app\models\ConselhoModel;
use Yii;

class CondominiosController extends Controller{
    public function actionListarCondominios(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $tabelaCond = CondominiosModel::tableName();
        $query = (new \yii\db\Query())
        ->select( 
            'cond.id,
            cond.nomeCond,
            cond.qtdBloco,
            cond.cep,
            cond.logradouro,
            cond.numero,
            cond.bairro,
            cond.cidade,
            cond.estado,
            cond.from_sindico,
            cond.dataCadastro,
            cons.nomeCons,
            adm.nomeAdm AS nome,
            cond.from_adm')
        ->from(CondominiosModel::tableName().' cond')
        ->leftJoin(ConselhoModel::tableName().' cons',' cond.from_sindico = cons.id')
        ->leftJoin (AdministradorasModel::tableName().' adm','  cond.from_adm = adm.id ');
        

        $paginacao = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $condominios = $query->orderBy('nomeCond')
        ->offset($paginacao->offset)
        ->limit($paginacao->limit)
        ->all();
        return $this->render('listar-condominios',[
            'condominios' => $condominios,
            'paginacao' => $paginacao,
        ]);
    }
    
    public static function listarCondominiosSelect(){
        $query = CondominiosModel::find();
        return $query->orderBy('nomeCond')->all();
    }

    public function actionCadastraCondominio(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        return $this->render('cadastra-condominio');
    }

    public function actionRealizaCadastroCondominio(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = new CondominiosModel();
            foreach ($request->post() as $ch => $value) {
                if($ch == 'cep'){
                    $arrayModel[$ch] = maskComponent::desmak($value);
                }else{
                    $arrayModel[$ch] = $value;
                }
            }
            $model->attributes = $arrayModel;
            $model->save();
            return $this->redirect(['condominios/listar-condominios']);
        }
        return $this->render('listar-condominios');
    }
    public function actionEditaCondominio(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $this->layout = false;
        $request = \yii::$app->request;
        if($request->isGet){
            $query = CondominiosModel::find();
            $condominio = $query->where(['id' => $request->get()])->one();
        }
        return $this->render('edita-condominio',[
            'edit' => $condominio
        ]);
    }
    public function actionRealizaEdicaoCondominio(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isPost){
            $model = CondominiosModel::findOne($request->post('id'));
            foreach ($request->post() as $ch => $value) {
                if($ch == 'cep'){
                    $arrayModel[$ch] = maskComponent::desmak($value);
                }else{
                    $arrayModel[$ch] = $value;
                }
            }
            $model->attributes = $arrayModel;
            
            if($model->update()){
                return $this->redirect(['condominios/listar-condominios']);
            }else{
                alertComponent::myAlert('danger', "Não foi possivel editar");
            }
        }
        
    } 
    public function actionDeletaCondominio(){
         if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $request = \yii::$app->request;
        if($request->isGet){
            $model = CondominiosModel::findOne($request->get('id'));
            if($model->delete()){
                return $this->redirect(['condominios/listar-condominios','myAlert' => ['type' =>'success', 'msg' =>'Registro deletado']]);
            }else{
                return $this->redirect(['condominios/listar-condominios', 'myAlert' => ['type' =>'danger', 'msg' =>'Registro não foi deletado']]);
            }
        }
    }
}

?>
