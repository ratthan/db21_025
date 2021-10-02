<?php
class productPrice{

public $product_id;
public $product_name;
public $productprice_quantity;
public $productprice_price;
public $productprice_screen;

public function __construct($product_id,$product_name,$productprice_quantity,$productprice_price,$productprice_screen){
    $this->product_id = $product_id;
    $this->product_name = $product_name;
    $this->productprice_quantity = $productprice_quantity;
    $this->productprice_price = $productprice_price;
    $this->productprice_screen = $productprice_screen;
}

public static function getAll(){
    $productPriceList = [];
    require("connectionConnect.php");
    $sql = "SELECT * FROM Product NATURAL JOIN ProductPrice";
    $result = $conn->query($sql);
    while($my_row = $result->fetch_assoc()){
        $P_id = $my_row[P_id];
        $P_name = $my_row[P_name];
        $PP_qty = $my_row[PP_qty];
        $PP_price = $my_row[PP_price];
        $PP_screen = $my_row[PP_screen];
        $productPriceList[] = new productPrice($P_id,$P_name,$PP_qty,$PP_price,$PP_screen);
    }
    require("connectionClose.php");
    return $productPriceList;
}

public static function get($id){
    require("connectionConnect.php");
    $sql = "SELECT * FROM ProductPrice WHERE PP_id = $id";
    $result = $conn->query($sql);
    $my_row = $result->fetch_assoc()
    $PP_id = $my_row[PP_id];
    $P_id = $my_row[P_id];
    $PP_price = $my_row[PP_price];
    $PP_qty = $my_row[PP_qty];
    $PP_sreen = $my_row[PP_screen];
    require("connectionClose.php");
    return new productPrice($PP_id,$P_id,$PP_price,$PP_qty,$PP_sreen);
}

public static function search($key){
    require("connectionConnect.php");
    $sql = "SELECT * FROM ProductPrice,Product 
    WHERE (Product.P_id like'%$key%' or ProductPrice.PP_price like'%$key%' or Product.P_name like'%$key%' or Product.P_description like'%$key%' ) 
    AND ProductPrice.P_id = Product.P_id"; 
    $result = $conn->query($sql);
    while($my_row = $result->fetch_assoc()){
        $P_id = $my_row[P_id];
        $P_name = $my_row[P_name];
        $PP_qty = $my_row[PP_qty];
        $PP_price = $my_row[PP_price];
        $PP_screen = $my_row[PP_screen];
        $productPriceList[] = new productPrice($P_id,$P_name,$PP_qty,$PP_price,$PP_screen);
    }
    require("connectionClose.php");
    return $productPriceList;
}

}
?>