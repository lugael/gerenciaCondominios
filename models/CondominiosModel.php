<?
namespace app\models;

use yii\db\ActiveRecord;

class CondominiosModel extends ActiveRecord{

    public static function tableName(){
        return 'ac_condominio';
    }
    public function rules()
    {
        return [[['nomeCond','qtdBloco', 'cep','logradouro','numero', 'bairro','cidade', 'estado', 'from_adm'], 'required' ],
        [['from_sindico'], 'default'] ];
    }
}
?>