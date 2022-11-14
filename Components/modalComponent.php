<?
namespace app\Components;

use yii\base\Component;

class modalComponent extends Component{
    public static function modal($title = ''){
        
        $estrutura = "<div class=\"modal fade \" id=\"modalqui\" data-backdrop=\"static\" data-keyboard=\"false\" tabindex=\"-1\" aria-labelledby=\"staticBackdropLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg\">
          <div class=\"modal-content \">
            <div class=\"float-rigth mr-2 \">
              <button type=\"button\" class=\"close text-dark\" data-dismiss=\"modal\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
              </button>
            </div>
            <div class=\"modal-body\">
             
            </div>         
          </div>
        </div>
      </div>";
      return $estrutura;
    }
}

?>