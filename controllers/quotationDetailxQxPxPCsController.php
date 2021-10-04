<?php
class quotationDetailxQxPxPCController{   
  
  public function index(){
    $quotationDetailxQxPxPCList = quotationDetailxQxPxPC::getTable();
    require_once('views/quotationDetailxQxPxPC/indexQuotationDetailxQxPxPC.php');
  }

  public function search(){
    $key = $_GET['key'];
    $quotationDetailxQxPxPCList = quotationDetailxQxPxPC::search($key);
    require_once('views/quotationDetailxQxPxPC/indexQuotationDetailxQxPxPC.php');

  }
/*
  public function new(){
    $quotationDetailList = quotationDetail::getAll();
    require_once("views/productxProductPrice/newProductxProductPrice.php");
  }
*/




}
?>