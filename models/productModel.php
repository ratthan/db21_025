<?php
class product{

public $product_id;
public $product_name;
public $product_min;
public $product_description;
public $catagory_id;

public function __construct($product_id,$product_name,$product_min,$product_description,$catagory_id){
    $this->product_id = $product_id;
    $this->product_name = $product_name;
    $this->product_min = $product_min;
    $this->product_description = $product_description;
    $this->catagory_id = $catagory_id;
}

public static function getAll(){
    $productList = [];
    require("connectionConnect.php");
    $sql = "SELECT * FROM Product";
    $result = $conn->query($sql);
    while($my_row = $result->fetch_assoc()){
        $P_id = $my_row[P_id];
        $P_name = $my_row[P_name];
        $P_min = $my_row[P_min];
        $P_description = $my_row[P_description];
        $C_id = $my_row[C_id];
        //echo $P_id."-".$P_name."-".$P_min."-".$P_description."-".$C_id."<br>";
        $productList[] = new product($P_id,$P_name,$P_min,$P_description,$C_id);
    }
    require("connectionClose.php");
    return $productList;
}




}

?>