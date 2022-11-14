<?
namespace app\components;

use yii\base\Component;

class generoComponent extends Component{
    public static function genero(){
        return array(
           '1' =>'Masc', 
           '2' =>'Fem', 
           '3' =>'Outro');
    }
    public static function genSelect($field,$default = 'a'){
        $list = array(
            "M" => "Masculino",
            "F" => "Feminino",
            "O" => "Outros"
        );
        
        $estrutura = "<label for=\"{$field}\"></label>";
        
        if($default != 'M' && $default != 'F' && $default){
            $defaultx = 'O';
            $estrutura .= "<select name=\"{$field}\" id=\"{$field}\" class=\"custom-select actionGenero\">
            <option value=\"\">Selecione seu gênero</option>";
            foreach($list as $ch=>$g){
                $estrutura .= "<option value=\"{$ch}\"".($ch == $defaultx ? ' selected' : '').">{$g}</option>";
            }
        
            $estrutura .= "</select>";
            if($default){
                $estrutura .= "<input class=\"form-control outroGenero\" type=\"text\" name=\"{$field}\" value=\"{$default}\">";
            }
            
            return $estrutura;
        }
        else {          
            $estrutura .= "<select name=\"{$field}\" id=\"{$field}\" class=\"custom-select actionGenero\">
                <option value=\"\">Selecione seu gênero</option>";
                foreach($list as $ch=>$g){
                    $estrutura .= "<option value=\"{$ch}\"".($ch == $default ? ' selected' : '').">{$g}</option>";
                }
            
            $estrutura .= "</select>";
            return $estrutura;
        }
    }
}
?>