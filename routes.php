<?php 
$controllers=array('pages'=>['home','error'],'productPrices'=>['index']);
function call($controller,$action){
   require_once("controllers/".$controller."Controller.php");
   switch($controller)
   {
        case "pages": $controller = new pagesController();
        break;

        case "productPrices": require_once("models/productPriceModel.php");
                              $controller = new productPriceController();                    
        break;

   }
   $controller->{$action}();

}


if(array_key_exists($controller,$controllers)){
    if(in_array($action,$controllers[$controller] )){
        call($controller,$action);
    }
    else{
        call('pages','error');
    }
}
else{
    call('pages','error');
}

?>