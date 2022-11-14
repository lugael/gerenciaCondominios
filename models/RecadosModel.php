<?
namespace app\models;

use yii\db\ActiveRecord;

class RecadosModel extends ActiveRecord{
    
    public static function tableName(){
        return 'ac_recados';
    }
    public function rules()
    {
        return[
            [['titulo','conteudo', 'dtInicio' ,'dtFim', 'from_bloco', 'from_condominio'], 'required']
        ];
    }
}
?>