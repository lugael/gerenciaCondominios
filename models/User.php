<?
namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface{
    public static function tableName()
    {
        return 'ac_usuarios';
    }
     /**
     * Este método procura por uma instância da classe de identidade usando o ID de usuário especificado. 
     * Este método é usado quando você precisa manter o status de login via sessão
     * @param [type] $id
     * @return void
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    /**
     * ele procura por uma instância da classe de identidade usando o token de acesso informado. 
     * Este método é usado quando você precisa autenticar um usuário por um único token secreto (exemplo: em uma aplicação stateless RESTful);
     *
     * @param [type] $token
     * @param [type] $type
     * @return void
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;//static::findOne(['token' => $token]);
    }
    /**
     * retorna o ID do usuário representado por essa instância da classe de identidade
     *
     * @return void
     */
    public function getId(){
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }
    public function validateAuthKey($authKey)
    {
        return null;
    }
    public function rules(){
        return [[['nomeUser', 'usuario', 'senha'],'required']];
    }
}
?>