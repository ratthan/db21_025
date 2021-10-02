<?php
class productPriceController
{
    public function index(){
        $productPriceList = productPrice::getAll();
        require_once("views/productPrice/indexProductPrice.php");
    }


}



?>