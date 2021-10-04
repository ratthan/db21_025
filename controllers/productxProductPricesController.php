<?php
class productxProductPriceController
{
    public function index(){
        $productxProductPriceList = productxProductPrice::getAll();
        require_once("views/productxProductPrice/indexProductxProductPrice.php");
    }

    public function search(){
       $key = $_GET['key'];
       $productxProductPriceList = productxProductPrice::search($key);
       require_once("views/productxProductPrice/indexProductxProductPrice.php");
    }

    public function new(){
        $productList = product::getAll();
        require_once("views/productxProductPrice/newProductxProductPrice.php");
    }

    public function addProductPrice(){
        $PP_id = productPrice::getNewID();
        $P_id = $_GET['P_id'];
        $PP_qty = $_GET['PP_qty'];
        $PP_price = $_GET['PP_price'];
        $PP_screen = $_GET['PP_screen'];
        //echo "<br>".$P_id."-".$PP_id."-".$PP_qty."-".$PP_price."-".$PP_screen."<br>";
        productPrice::add($P_id,$PP_id,$PP_qty,$PP_price,$PP_screen);
        productxProductPriceController::index();
    }
    
    public function updateForm(){
        $PP_id = $_GET['PP_id'];
        $productPrice = productPrice::get($PP_id);
        $productList = product::getAll();
        require_once("views/productxProductPrice/updateFormProductxProductPrice.php");
    }
    
    public function updateProductPrice(){
        $PP_id = $_GET['PP_id'];
        $P_id = $_GET['P_id'];
        $PP_qty = $_GET['PP_qty'];
        $PP_price = $_GET['PP_price'];
        $PP_screen = $_GET['PP_screen'];
        productPrice::update($P_id,$PP_id,$PP_qty,$PP_price,$PP_screen);
        productxProductPriceController::index();
    }

    public function deleteForm(){
        $PP_id = $_GET['PP_id'];
        $productPrice = productPrice::get($PP_id);
        require_once("views/productxProductPrice/deleteFormProductxProductPrice.php");
    }

    public function deleteProductPrice(){
        $PP_id = $_GET['PP_id'];
        productPrice::delete($PP_id);
        productxProductPriceController::index();
    }


}



?>