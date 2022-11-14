<?
namespace app\models;

use yii\db\ActiveRecord;

class MoradoresModel extends ActiveRecord{
    public static function tableName()
    {
        return 'ac_inquilino';
    }
    public function rules(){
        return [[['nome','cpf', 'email','telefone','senha','from_unidade','from_condominio','dtnasc','from_bloco'],'required'], ];
    }
}
?>