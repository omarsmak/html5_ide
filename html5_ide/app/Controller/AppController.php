<?

class AppController extends Controller{
    
    //public $helpers = array("Js", "html", "form");
    /*
    no need for it
    //var $components = array('RequestHandler');
    function beforeFilter() {
        //$this->RequestHandler->setContent('json', 'text/x-json');
    }
    */
    
    protected function getJSONData() {
          $rawJSONString = file_get_contents('php://input');
          $obj = json_decode($rawJSONString);
          return $obj;
    }
    
    
    
    
}

?>