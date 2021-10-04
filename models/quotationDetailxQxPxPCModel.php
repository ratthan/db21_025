<?php
class quotationDetailxQxPxPC {

public $quotation_id;
public $product_id;
public $product_name;
public $productcolor_color;
public $quotationdetail_quantity;
public $quotationdetail_numscreen;
public $price;
public $total;


public function __construct($quotation_id, $product_id, $product_name, $productcolor_color , $quotationdetail_quantity,$quotationdetail_numscreen,$price,$total)
{
        $this->quotation_id = $quotation_id;
        $this->product_id =  $product_id;
        $this->product_name = $product_name;
        $this->productcolor_color = $productcolor_color;
        $this->quotationdetail_quantity =  $quotationdetail_quantity;
        $this->quotationdetail_numscreen =  $quotationdetail_numscreen;
        $this->price = $price;
        $this->total = $total;
}


public static function getTable(){
        $quotationDetailxQxPxPCList = [];
        echo "aaa";
        require("connectionConnect.php");
        $sql = "SELECT A.Q_id , A.P_id ,Product.P_name, A.PC_color , A.QD_qty, A.QD_numscreen , (ProductPrice.PP_price +
        ProductPrice.PP_screen*(A.QD_numscreen-1)) AS price ,((ProductPrice.PP_price +
        ProductPrice.PP_screen*(A.QD_numscreen-1))*A.QD_qty) AS total
        FROM ProductPrice NATURAL JOIN Product NATURAL JOIN ProductColor 
        INNER JOIN
        (SELECT QD.Q_id,PC.P_id, QD.QD_id ,PC.PC_id , PC.PC_color , QD.QD_qty 
        ,MIN(PP.PP_qty) AS min ,QD.QD_numscreen
        FROM ProductColor AS PC NATURAL JOIN ProductPrice AS PP NATURAL JOIN
        QuotationDetail AS QD
        WHERE PP.PP_qty >= QD.QD_qty
        GROUP BY QD.QD_id , PC.PC_id
        ORDER BY `QD`.`Q_id` ASC) AS A ON ProductColor.PC_id = A.PC_id AND A.min =
        ProductPrice.PP_qty
        ORDER BY A.Q_id";
        $result= $conn->query($sql);
        echo "ccc";
        while($my_row = $result->fetch_assoc()){
                $Q_id = $my_row[Q_id];
                $P_id = $my_row[P_id];
                $P_name = $my_row[P_name];
                $PC_color = $my_row[PC_color];
                $QD_qty = $my_row[QD_qty];
                $QD_numscreen = $my_row[QD_numscreen];
                $price = $my_row[price];
                $total = $my_row[total];
                echo $Q_id."-".$P_id."-".$P_name."-".$PC_color."-".$QD_qty."-".$QD_numscreen."-".$price."-".$total."<br>";
                $quotationDetailxQxPxPCList[] = new quotationDetailxQxPxPC($Q_id,$P_id,$P_name,$PC_color,$QD_qty,$QD_numscreen,$price,$total);
        }
        require("connectionClose.php");
        return $quotationDetailxQxPxPCList;
}


public static function search($key){
        echo "1111";
        require("connectionConnect.php");
        echo "2222";
        $sql = "SELECT A.Q_id , A.P_id ,Product.P_name, A.PC_color , A.QD_qty, A.QD_numscreen , (ProductPrice.PP_price +
        ProductPrice.PP_screen*(A.QD_numscreen-1)) AS price ,((ProductPrice.PP_price +
        ProductPrice.PP_screen*(A.QD_numscreen-1))*A.QD_qty) AS total
        FROM ProductPrice NATURAL JOIN Product NATURAL JOIN ProductColor 
        INNER JOIN
        (SELECT QD.Q_id,PC.P_id, QD.QD_id ,PC.PC_id , PC.PC_color , QD.QD_qty 
        ,MIN(PP.PP_qty) AS min ,QD.QD_numscreen
        FROM ProductColor AS PC NATURAL JOIN ProductPrice AS PP NATURAL JOIN
        QuotationDetail AS QD
        WHERE PP.PP_qty >= QD.QD_qty
        GROUP BY QD.QD_id , PC.PC_id
        ) AS A ON ProductColor.PC_id = A.PC_id AND A.min =
        ProductPrice.PP_qty
        WHERE A.Q_id like'%$key%' or A.P_id like'%$key%' or Product.P_name like'%$key%' or A.PC_color like'%$key%' 
        or A.QD_qty like'%$key%' or A.QD_numscreen like'%$key%' or (ProductPrice.PP_price +
        ProductPrice.PP_screen*(A.QD_numscreen-1)) like'%$key%' or ((ProductPrice.PP_price +
        ProductPrice.PP_screen*(A.QD_numscreen-1))*A.QD_qty) like'%$key%' ";
        echo "3333";
        $result = $conn->query($sql);
        echo "4444";


        while($my_row = $result->fetch_assoc()){
                echo "ei";
                $Q_id = $my_row[Q_id];
                echo $Q_id;
                $P_id = $my_row[P_id];
                $P_name = $my_row[P_name];
                $PC_color = $my_row[PC_color];
                $QD_qty = $my_row[QD_qty];
                $QD_numscreen = $my_row[QD_numscreen];
                $price = $my_row[price];
                $total = $my_row[total];
                echo $Q_id."-".$P_id."-".$P_name."-".$PC_color."-".$QD_qty."-".$QD_numscreen."-".$price."-".$total."<br>";
                $quotationDetailxQxPxPCList[] = new quotationDetailxQxPxPC($Q_id,$P_id,$P_name,$PC_color,$QD_qty,$QD_numscreen,$price,$total);
        }
        require("connectionClose.php");
        return $quotationDetailxQxPxPCList;
}

 

}
?>