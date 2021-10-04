<?php
class quotation{

    public $quotation_id;
    public $customer_id;
    public $employee_id;
    public $quotation_date;
    public $quotation_percent;
    public $quotation_dayperiod;
    public $quotation_allowperson;
    public $quotation_allowdate;
    public $quotation_percentsupport;
    public $quotation_successdate;
    public $quotation_deliverystatus;


    public function __construct($quotation_id,$customer_id,$employee_id,$quotation_date,$quotation_percent,$quotation_dayperiod,$quotation_allowperson,$quotation_allowdate,$quotation_percentsupport,$quotation_successdate,$quotation_deliverystatus){
        $this->quotation_id = $quotation_id;
        $this->customer_id = $customer_id;
        $this->employee_id = $employee_id;
        $this->quotation_date = $quotation_date;
        $this->quotation_percent = $quotation_percent;
        $this->quotation_dayperiod = $quotation_dayperiod;
        $this->quotation_allowperson = $quotation_allowperson;
        $this->quotation_percentsupport = $quotation_percentsupport;
        $this->quotation_successdate = $quotation_successdate;
        $this->quotation_deliverystatus = $quotation_deliverystatus;
    }
    
    public static function getAll(){
        echo "yes";
        $quotationList = [];
        require("connectionConnect.php");
        $sql = "SELECT * FROM Quotation";
        $result = $conn->query($sql);
        while($my_row = $result->fetch_assoc()){
            $Q_id = $my_row[Q_id];
            $C_id = $my_row[C_id];
            $E_id = $my_row[E_id];
            $Q_date = $my_row[Q_date];
            $Q_percent = $my_row[Q_percent];
            $Q_dayperiod = $my_row[Q_dayperiod];
            $Q_allowperson = $my_row[Q_allowperson];
            $Q_allowdate = $my_row[Q_allowdate];
            $Q_percentsupport = $my_row[Q_percentsupport];
            $Q_successdate = $my_row[Q_successdate];
            $Q_deliverystatus = $my_row[Q_deliverystatus];
            //echo $Q_id."-".$C_id."-".$E_id."-".$Q_date."-".$Q_percent."-".$Q_dayperiod."-".$Q_allowperson."-".$Q_allowdate."-".$Q_percentsupport."-".$Q_successdate."-".$Q_deliverystatus."<br>";
            $quotationList[] = new quotation($Q_id,$C_id,$E_id,$Q_date,$Q_percent,$Q_dayperiod,$Q_allowperson,$Q_allowdate,$Q_percentsupport,$Q_successdate,$Q_deliverystatus);
        }
        require("connectionClose.php");
        return $quotationList;
    }
    
}

?>