<?
namespace app\components;

use yii\base\Component;

class alertComponent extends Component{

    public static function myAlert($tipo, $mensagem, $url = ''){
        $component = "<div class=\"alert alert-{$tipo}\" role=\"alert\">{$mensagem}</div>";
        $componentParent = "
        <script type=\"text/javascript\">
            url = '{$url}';
            tipo = '{$tipo}';
            setTimeout(function(){
                $('main').find('div.alert').remove();
                //vai redirecionar?
                if(url){
                    setTimeout(function(){
                        window.location.href = url;
                    },500);
                }
            },5000)
        </script>
        ";

        return $component.$componentParent;
    }
}
?>