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
        echo "aaa";
        require("connectionConnect.php");
        $sql = "SELECT Quotation.Q_id ,Quotation.Q_date,Customer.C_name,Customer.C_address,Customer.C_phone,Employee.E_name
        FROM Quotation NATURAL JOIN Employee NATURAL JOIN Customer";
        $result= $conn->query($sql);
        echo "ccc";
        while($my_row = $result->fetch_assoc()){
                $Q_id = $my_row[Q_id];
                $Q_date = $my_row[Q_date];
                $C_name = $my_row[C_name];
                $C_address = $my_row[C_address];
                $C_phone = $my_row[C_phone];
                $E_name = $my_row[E_name];

                echo $Q_id."-".$Q_date."-".$C_name."-".$C_address."-".$C_phone."-".$E_name."<br>";
                $quotationxCxEList[] = new quotationxCxE($Q_id,$Q_date,$C_name,$C_address,$C_phone,$E_name);
        }
        require("connectionClose.php");
        return $quotationxCxEList;
}



public static function search($key){
        echo "1111";
        require("connectionConnect.php");
        echo "2222";
        $sql = "SELECT Quotation.Q_id ,Quotation.Q_date,Customer.C_name,Customer.C_address,Customer.C_phone,Employee.E_name
        FROM Quotation NATURAL JOIN Employee NATURAL JOIN Customer
        WHERE Quotation.Q_id like'%$key%' or Quotation.Q_date like'%$key%' or Customer.C_name like'%$key%' or 
        Customer.C_address like'%$key%' or Customer.C_phone like'%$key%' or Employee.E_name like'%$key%' ";
        echo "3333";
        $result = $conn->query($sql);
        echo "4444";

        while($my_row = $result->fetch_assoc()){
            $Q_id = $my_row[Q_id];
            $Q_date = $my_row[Q_date];
            $C_name = $my_row[C_name];
            $C_address = $my_row[C_address];
            $C_phone = $my_row[C_phone];
            $E_name = $my_row[E_name];
            echo $Q_id."-".$Q_date."-".$C_name."-".$C_address."-".$C_phone."-".$E_name."<br>";
            $quotationxCxEList[] = new quotationxCxE($Q_id,$Q_date,$C_name,$C_address,$C_phone,$E_name);
        }
        require("connectionClose.php");
        return $quotationxCxEList;
}

 

}
?>