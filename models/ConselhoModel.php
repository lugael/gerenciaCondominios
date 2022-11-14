<?
namespace app\models;

use yii\db\ActiveRecord;

class ConselhoModel extends ActiveRecord{
    public static function tableName()
    {
        return 'ac_conselho';
    }
    public function rules(){
        return [[['nomeCons', 'funcao', 'from_condominio'],'required']];
    }
}
?>