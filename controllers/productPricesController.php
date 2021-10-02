<?php
class productPriceController
{
    public function index(){
        $productPriceList = productPrice::getAll();
        require_once("views/productPrice/indexProductPrice.php");
    }

    public function search(){
        $key = $_GET['key'];
        $productPriceList = productPrice::search($key);
        require_once("views/productPrice/indexProductPrice.php");
    }


}



?>