<?
namespace app\models;

use yii\db\ActiveRecord;

class UnidadesModel extends ActiveRecord{

    public static function tableName()
    {
        return 'ac_unidade';   
    }
    public function rules()
    {
        return [[['numero', 'metragem', 'qtdVagas', 'from_bloco', 'from_condominio'], 'required']];
    }
}
?>