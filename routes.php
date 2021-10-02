<?php 
$controllers=array('pages'=>['home','error'],'productPrices'=>['index','search'],'quotationDetails'=>['index']);
function call($controller,$action){
    echo "aaa";
   require_once("controllers/".$controller."Controller.php");
   echo "bbb";
   switch($controller)
   {
        case "pages": $controller = new pagesController();
        break;

        case "productPrices": require_once("models/productPriceModel.php");
                              $controller = new productPriceController();      
        break;

        case "quotationDetails": echo "111";
                                 require_once("models/quotationDetailModel.php");
                                 echo "222";
                                 $controller = new quotationDetailController();
                                 echo "333";      
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