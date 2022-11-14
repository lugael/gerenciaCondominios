<?
namespace app\components;
use yii\base\Component;

class selectedComponent extends Component{

    public static function isSelected($id,$from){
        return ($id == $from) ? ' selected' :'';
    }

}
?>