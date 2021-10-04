<?php
class quotationDetail{

public $quotationdetail_id;
public $quotation_id;
public $quotationdetail_numscreen;
public $quotationdetail_quantity;
public $productcolor_id;


public function __construct($quotationdetail_id,$quotation_id,$quotationdetail_numscreen,$quotationdetail_quantity,$productcolor_id){
    $this->quotationdetail_id = $quotationdetail_id;
    $this->quotation_id = $quotation_id;
    $this->quotationdetail_numscreen = $quotationdetail_numscreen;
    $this->quotationdetail_quantity = $quotationdetail_quantity;
    $this->productcolor_id = $productcolor_id;
}


public static function getAll(){
    $quotationDetailList = [];
    require("connectionConnect.php");
    $sql = "SELECT * FROM QuotationDetail";
    $result = $conn->query($sql);
    while($my_row = $result->fetch_assoc()){
        $QD_id = $my_row[QD_id];
        $Q_id = $my_row[Q_id];
        $QD_numscreen = $my_row[QD_numscreen];
        $QD_qty = $my_row[QD_qty];
        $PC_id = $my_row[PC_id];
        //echo $QD_id."-".$Q_id."-".$QD_numscreen."-".$QD_qty."-".$PC_id."<br>";
        $quotationDetailList[] = new quotationDetail($QD_id,$Q_id,$QD_numscreen,$QD_qty,$PC_id);
    }
    require("connectionClose.php");
    return $quotationDetailList;
}

public static function getNewID(){
    require("connectionConnect.php");
    $sql = "SELECT*
    FROM QuotationDetail
    WHERE QuotationDetail.QD_id= 
    (SELECT MAX(QD_id) AS lastQD_id FROM QuotationDetail)";
    $result = $conn->query($sql);
    $my_row = $result->fetch_assoc();
    $QD_id = $my_row[QD_id];
    require("connectionClose.php");
    return $QD_id+1;
}


public function addQuotationDetail($QD_id,$Q_id,$PC_id,$QD_qty,$QD_numscreen){
    require("connectionConnect.php");
    //echo $P_id."-".$PP_id."-".$PP_qty."-".$PP_price."-".$PP_screen."<br>";
    $sql = "INSERT INTO QuotationDetail(QD_id,Q_id,PC_id,QD_qty,QD_numscreen) VALUES('$QD_id','$Q_id','$PC_id','$QD_qty','$QD_numscreen')";
    $result = $conn->query($sql);
    require("connectionClose.php");
    return "add success $result row";

    
}

}
?>