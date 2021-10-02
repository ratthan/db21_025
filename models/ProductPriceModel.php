<?php
class productPrice{

public $productprice_id;
public $product_id;
public $price;
public $quantity;
public $screen;

public function __construct($productprice_id,$product_id,$price,$quantity,$screen){
    $this->productprice_id = $productprice_id;
    $this->product_id = $product_id;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->screen = $screen;
}

public static function getAll(){
    $productPriceList = [];
    require("connectionConnect.php");
    $sql = "select * from ProductPrice";
    $result = $conn->query($sql);
    while($my_row = $result->fetch_assoc()){
        $PP_id = $my_row[PP_id];
        $P_id = $my_row[P_id];
        $PP_price = $my_row[PP_price];
        $PP_qty = $my_row[PP_qty];
        $PP_sreen = $my_row[PP_screen];
        $productPriceList[] = new productPrice($PP_id,$P_id,$PP_price,$PP_qty,$PP_sreen);
    }
    require("connectionClose.php");
    return $productPriceList;
}


}
?>