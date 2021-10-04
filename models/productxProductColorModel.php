<?php

class productxProductColor{

public $product_id;
public $product_name;
public $product_min;
public $product_description;
public $catagory_id;
public $productcolor_id;
public $productcolor_color;

    
public function __construct($product_id,$product_name,$product_min,$product_description,$catagory_id,$productcolor_id,$productcolor_color){
    $this->product_id = $product_id;
    $this->product_name = $product_name;
    $this->product_min = $product_min;
    $this->product_description = $product_description;
    $this->catagory_id = $catagory_id;
    $this->productcolor_id = $productcolor_id;
    $this->productcolor_color = $productcolor_color;

}
     

public static function getAll(){
    $productxProductColorList = [];
    require("connectionConnect.php");
    $sql = "SELECT* FROM Product NATURAL JOIN ProductColor";
    $result = $conn->query($sql);
    while($my_row = $result->fetch_assoc()){
        $P_id = $my_row[P_id];
        $P_name = $my_row[P_name];
        $P_min = $my_row[P_min];
        $P_description = $my_row[P_description];
        $C_id = $my_row[C_id];
        $PC_id = $my_row[PC_id];
        $PC_color = $my_row[PC_color];
        //echo $P_id."-".$P_name."-".$P_min."-".$P_description."-".$C_id."-".$PC_id."-".$PC_color."<br>";
        $productxProductColorList[] = new productxProductColor($P_id,$P_name,$P_min,$P_description,$C_id,$PC_id,$PC_color);
    }
    require("connectionClose.php");
    return $productxProductColorList;


}


}
?>