<?
namespace app\models;

use yii\db\ActiveRecord;

class BlocosModel extends ActiveRecord{

    public static function tableName(){
        return 'ac_bloco';
    }
    public function rules()
    {
        return[[['nomeB', 'andares', 'qtdUnid', 'from_condominio'], 'required']];
    }
}
?>