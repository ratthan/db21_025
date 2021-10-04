<?php 
$controllers=array('pages'=>['home','error'],
'productxProductPrices'=>['index','search','new','addProductPrice','updateForm','updateProductPrice','deleteForm','deleteProductPrice'],
'quotationDetailxQxPxPCs'=>['index','search','new']);
function call($controller,$action){
   require_once("controllers/".$controller."Controller.php");//เปิดไฟล์controller
   switch($controller)
   {
        case "pages": $controller = new pagesController();
        break;

        case "productxProductPrices": require_once("models/productxProductPriceModel.php");
                                      require_once("models/productModel.php");
                                      require_once("models/productPriceModel.php");                                  
                                      $controller = new productxProductPriceController();      
        break;

        case "quotationDetailxQxPxPCs": echo "111";
                                        require_once("models/quotationDetailxQxPxPCModel.php");
                                        //require_once("models/quotationDetailModel.php");
                                        echo "222";
                                        $controller = new quotationDetailxQxPxPCController();
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