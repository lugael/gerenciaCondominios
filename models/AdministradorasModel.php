<?
namespace app\models;

use yii\db\ActiveRecord;

class AdministradorasModel extends ActiveRecord{
    
    public static function tableName(){
        return 'ac_administradora';
    }
    public function rules()
    {
        return[
            [['nomeAdm', 'cnpj'], 'required']
        ];
    }
}
?>