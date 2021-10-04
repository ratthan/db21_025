<?php
class productxProductPrice{

public $product_id;
public $product_name;
public $product_min;
public $product_description;
public $catagory_id;
public $productprice_id;
public $productprice_price;
public $productprice_quantity;
public $productprice_screen;

public function __construct($product_id,$product_name,$product_min,$product_description,$catagory_id,$productprice_id,$productprice_price,$productprice_quantity,$productprice_screen){
    $this->product_id = $product_id;
    $this->product_name = $product_name;
    $this->product_min = $product_min;
    $this->product_description = $product_description;
    $this->catagory_id = $catagory_id;
    $this->productprice_id = $productprice_id;
    $this->productprice_price = $productprice_price;
    $this->productprice_quantity = $productprice_quantity;
    $this->productprice_screen = $productprice_screen;
}


public static function getAll(){
    $productxProductPriceList = [];
    require("connectionConnect.php");
    $sql = "SELECT * FROM Product NATURAL JOIN ProductPrice";
    $result = $conn->query($sql);
    while($my_row = $result->fetch_assoc()){
        $P_id = $my_row[P_id];
        $P_name = $my_row[P_name];
        $P_min = $my_row[P_min];
        $P_description = $my_row[P_description];
        $C_id = $my_row[C_id];
        $PP_id = $my_row[PP_id];
        $PP_price = $my_row[PP_price];
        $PP_qty = $my_row[PP_qty];
        $PP_screen = $my_row[PP_screen];
        //echo $P_id."-".$P_name."-".$P_min."-".$P_description."-".$C_id."-".$PP_id."-".$PP_price."-".$PP_qty."-".$PP_screen."<br>";
        $productxProductPriceList[] = new productxProductPrice($P_id,$P_name,$P_min,$P_description,$C_id,$PP_id,$PP_price,$PP_qty,$PP_screen);
    }
    require("connectionClose.php");
    return $productxProductPriceList;
}


public static function search($key){
    require("connectionConnect.php");
    $sql = "SELECT * FROM ProductPrice NATURAL JOIN Product 
    WHERE Product.P_id like'%$key%' or Product.P_name like'%$key%' or ProductPrice.PP_qty like'%$key%' or ProductPrice.PP_price like'%$key%' or ProductPrice.PP_screen like'%$key%' ";
    $result = $conn->query($sql);
    while($my_row = $result->fetch_assoc()){
        $P_id = $my_row[P_id];
        $P_name = $my_row[P_name];
        $P_min = $my_row[P_min];
        $P_description = $my_row[P_description];
        $C_id = $my_row[C_id];
        $PP_id = $my_row[PP_id];
        $PP_price = $my_row[PP_price];
        $PP_qty = $my_row[PP_qty];
        $PP_screen = $my_row[PP_screen];
        $productxProductPriceList[] = new productxProductPrice($P_id,$P_name,$P_min,$P_description,$C_id,$PP_id,$PP_price,$PP_qty,$PP_screen);
    }
    require("connectionClose.php");
    return $productxProductPriceList;
}



}
?>