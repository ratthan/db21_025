<?php 
$controllers=array('pages'=>['home','error'],
'productxProductPrices'=>['index','search','new','addProductPrice','updateForm','updateProductPrice','deleteForm','deleteProductPrice'],
'quotationDetailxQxPxPCs'=>['index','search','new','addQuotationDetail'] ,
'quotationxCxEs'=>['index','newQuotation','search'] );
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
                                        echo "222";
                                        require_once("models/quotationDetailModel.php");
                                        echo "333";
                                        require_once("models/quotationModel.php");
                                        echo "444";
                                        require_once("models/productxProductColorModel.php");
                                        $controller = new quotationDetailxQxPxPCController();
                                        echo "555";      
        break;

        case "quotationxCxEs" : echo "sssss"; 
                                require_once("models/quotationxCxEModel.php");
                                //require_once("./models/customerModel.php");
                                //require_once("./models/employeeModel.php");
                                echo "rrrr"; 
                                $controller = new quotationxCxEController();
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