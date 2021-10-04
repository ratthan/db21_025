<?php
class quotationxCxE {

public $quotation_id;
public $quotation_date;
public $customer_name;
public $customer_address;
public $customer_phone;
public $employee_name;


public function __construct($quotation_id, $quotation_date, $customer_name, $customer_address , $customer_phone,$employee_name)
{
        $this->quotation_id = $quotation_id;
        $this->quotation_date =  $quotation_date;
        $this->customer_name = $customer_name;
        $this->customer_address = $customer_address;
        $this->customer_phone =  $customer_phone;
        $this->employee_name =  $employee_name;

}


public static function getTable(){
        $quotationxCxEList = [];
        
        require("connectionConnect.php");
        $sql = "SELECT Quotation.Q_id ,Quotation.Q_date,Customer.C_name,Customer.C_address,Customer.C_phone,Employee.E_name
        FROM Quotation NATURAL JOIN Employee NATURAL JOIN Customer";
        $result= $conn->query($sql);
        
        while($my_row = $result->fetch_assoc()){
                $Q_id = $my_row[Q_id];
                $Q_date = $my_row[Q_date];
                $C_name = $my_row[C_name];
                $C_address = $my_row[C_address];
                $C_phone = $my_row[C_phone];
                $E_name = $my_row[E_name];
                
               // echo $Q_id."-".$Q_date."-".$C_name."-".$C_address."-".$C_phone."-".$E_name."<br>";
                $quotationxCxEList[] = new quotationxCxE($Q_id,$Q_date,$C_name,$C_address,$C_phone,$E_name);
        }
        echo "นายเพชรกล้า กมลสุขยืนยง 6220504721<br>";
        require("connectionClose.php");
        return $quotationxCxEList;
}



public static function search($key){
       // echo "1111";
        require("connectionConnect.php");
       // echo "2222";
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
       // echo "3333";
        $result = $conn->query($sql);
      //  echo "4444";

        while($my_row = $result->fetch_assoc()){
                //echo "ei";
                $Q_id = $my_row[Q_id];
                //echo $Q_id;
                $P_id = $my_row[P_id];
                $P_name = $my_row[P_name];
                $PC_color = $my_row[PC_color];
                $QD_qty = $my_row[QD_qty];
                $QD_numscreen = $my_row[QD_numscreen];
                $price = $my_row[price];
                $total = $my_row[total];
               // echo $Q_id."-".$P_id."-".$P_name."-".$PC_color."-".$QD_qty."-".$QD_numscreen."-".$price."-".$total."<br>";
                $quotationDetailxQxPxPCList[] = new quotationxCxE($Q_id,$P_id,$P_name,$PC_color,$QD_qty,$QD_numscreen,$price,$total);
        }
        require("connectionClose.php");
        return $quotationDetailxQxPxPCList;
}

 

}
?>