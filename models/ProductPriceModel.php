<?php
class productPrice{

public $productprice_id;
public $product_id;
public $productprice_price;
public $productprice_quantity;
public $productprice_screen;


public function __construct($productprice_id,$product_id,$productprice_price,$productprice_quantity,$productprice_screen){
    $this->productprice_id = $productprice_id;
    $this->product_id = $product_id;
    $this->productprice_price = $productprice_price;
    $this->productprice_quantity = $productprice_quantity;
    $this->productprice_screen = $productprice_screen;
}


public static function getAll(){
    $ProductPriceList = [];
    require("connectionConnect.php");
    $sql = "SELECT * FROM ProductPrice";
    $result = $conn->query($sql);
    while($my_row = $result->fetch_assoc()){
        $PP_id = $my_row[PP_id];
        $P_id = $my_row[P_id];
        $PP_price = $my_row[PP_price];
        $PP_qty = $my_row[PP_qty];
        $PP_screen = $my_row[PP_screen];
        //echo $PP_id."-".$P_id."-".$PP_price."-".$PP_qty."-".$PP_screen."<br>";
        $ProductPriceList[] = new productPrice($PP_id,$P_id,$PP_price,$PP_qty,$PP_screen);
    }
    require("connectionClose.php");
    return $ProductPriceList;
}


public static function add($P_id,$PP_id,$PP_qty,$PP_price,$PP_screen){
    require("connectionConnect.php");
    echo $P_id."-".$PP_id."-".$PP_qty."-".$PP_price."-".$PP_screen."<br>";
    $sql = "INSERT INTO ProductPrice(PP_id,P_id,PP_price,PP_qty,PP_screen) VALUES('$PP_id','$P_id','$PP_price','$PP_qty','$PP_screen')";
    $result = $conn->query($sql);
    require("connectionClose.php");
    return "add success $result row";
}


public static function getNewID(){
    require("connectionConnect.php");
    $sql = "SELECT*
    FROM ProductPrice
    WHERE ProductPrice.PP_id = 
    (SELECT MAX(PP_id) AS lastPP_id FROM ProductPrice)";
    $result = $conn->query($sql);
    $my_row = $result->fetch_assoc();
    $PP_id = $my_row[PP_id];
    require("connectionClose.php");
    return $PP_id+1;
}


public static function update($P_id,$PP_id,$PP_qty,$PP_price,$PP_screen){
    require("connectionConnect.php");
    $sql = "UPDATE ProductPrice SET P_id = '$P_id',PP_id = '$PP_id',PP_qty = '$PP_qty',PP_price = '$PP_price',PP_screen = '$PP_screen'
    WHERE PP_id = '$PP_id' ";
    $result = $conn->query($sql);
    require("connectionClose.php");
    return "update success $result row";
}


public static function get($PP_id){
    require("connectionConnect.php");
    $sql = "SELECT * FROM ProductPrice WHERE ProductPrice.PP_id = '$PP_id' ";
    $result = $conn->query($sql);
    $my_row = $result->fetch_assoc();
    $PP_id = $my_row[PP_id];
    $P_id = $my_row[P_id];
    $PP_price = $my_row[PP_price];
    $PP_qty = $my_row[PP_qty];
    $PP_screen = $my_row[PP_screen];
    //echo $PP_id."-".$P_id."-".$PP_price."-".$PP_qty."-".$PP_screen."<br>";
    require("connectionClose.php");
    return new productPrice($PP_id,$P_id,$PP_price,$PP_qty,$PP_screen);
}


public static function delete($PP_id){
    require("connectionConnect.php");
    $sql = "DELETE FROM ProductPrice WHERE ProductPrice.PP_id = '$PP_id' ";
    $result = $conn->query($sql);
    require("connectionClose.php");
    return "delete success $result row";
}




}
?>