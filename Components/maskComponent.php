<?
namespace app\Components;

use yii\base\Component;
class maskComponent extends Component{


    public static function Mask($val,$format){
        $maskared = '';
        $k = 0;
        switch ($format) {
            case 'cnpj':
                $mask = '##.###.###/####-##';
                break;
            case 'cpf':
                $mask = '###.###.###-##';
                break;
            case 'cep':
                $mask = '#####-###';
                break;
            default:
                
                break;
        }
        for ($i=0; $i <=strlen($mask) -1 ; $i++) { 
            if ($mask[$i] == '#') {
                if (isset($val[$k])) {
                    $maskared .= $val[$k++];
                }
            }else  if(isset($mask[$i])){
                    $maskared .= $mask[$i];
            }
            
        }
        return $maskared;
    }
    public static function desmak($val){
        $val = str_replace('-','',$val);
        $val = str_replace('/','',$val);
        $val = str_replace('.','',$val);
        $val = str_replace(' ','',$val);
        $val = str_replace('(','',$val);
        $val = str_replace(')','',$val);
        return $val;
    }
    public static function telMask($d){
       if(strlen($d) == 11){
        $str1 = '('.substr($d,0,2).') ';
        $str2 = substr($d,2,5).'-';
        $str3 = substr($d,7,4);
        return $str1.$str2.$str3;
       }else{
        $str1 = '('.substr($d,0,2).') ';
        $str2 = substr($d,2,4).'-';
        $str3 = substr($d,6,4);
        return $str1.$str2.$str3;
       }
        
    }

}
?>