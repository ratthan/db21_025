<?php
class quotationxCxEController
{
    public function index(){
        $quotationxCxEList = quotationxCxE::getTable();
        require_once('views/quotationxCxE/indexQuotationxCxE.php');
    }

    /*
    public function newQuotation()
    {
        $quotation_list = Quotation::getAll();
        $customer_list = Customer::getAll();
        $employee_list = Employee::getAll();
        require_once("./views/quotation/newQuotation.php");
    }

    public function searchQuotation()
    {
        $key = $_GET['key'];
        $quotation_list = Quotation::search($key);
        // echo "search";
        require_once("./views/quotation/index_quotation.php");
    }

    public function addQuotation()
    {
        $Q_ID = $_GET['Q_id'];
        $Q_Date = $_GET['Q_date'];
        $C_ID = $_GET['C_id'];
        $E_ID = $_GET['E_id'];

        Quotation::add($Q_id, $C_id, $E_id, $Q_date);
        QuotationController::index();
    }

    public function updateFormQuotation()
    {
        $Q_ID = $_GET['Q_id'];
        $quotation = Quotation::get($Q_id);
        $customer_list = Customer::getAll();
        $employee_list = Employee::getAll();
        require_once("./views/quotation/updateFormQuotation.php");
    }

    public function updateQuotation()
    {
        $Q_ID = $_GET['Q_id'];
        $Q_Date = $_GET['Q_date'];
        $C_ID = $_GET['C_id'];
        $E_ID = $_GET['E_id'];

        Quotation::update($Q_id, $Q_date, $C_id, $E_id);
        QuotationController::index();
    }

    public function deleteConfirmQuotation()
    {
        $Q_id = $_GET['Q_id'];
        $quotation = Quotation::get($Q_id);
        echo "<br>1<br>";
        require_once("./views/quotation/deleteConfirmQuotation.php");
    }

    public function deleteQuotation()
    {
        $Q_id = $_GET['Q_id'];
        
        Quotation::delete($Q_id);
        QuotationController::index();
    }

    */
    public function deleteForm()
    {
        
        $Q_id = $_GET['Q_id'];
        $quotation = quotation::get($Q_id);
        echo "f";
        require_once("views/quotationxCxE/deleteFormQuotation.php");
    }
}
