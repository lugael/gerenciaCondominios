<?
namespace app\components;

use yii\base\Component;

class legivelComponent extends Component{
    public function legivel($var){
        echo '<pre>';
        if(is_array($var)){
            print_r($var);
        }else{
            print($var);
        }
        echo '</pre>';
    }
}
?>