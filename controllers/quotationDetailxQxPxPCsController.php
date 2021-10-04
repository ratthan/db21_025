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

  public function new(){
    //echo "aaaa";
    $quotationList = quotation::getAll();//1
    //echo "bbbb";
    $productxProductColorList = productxProductColor::getAll();//2
    //echo "cccc";
    $quotationDetailList = quotationDetail::getAll();//3
    //echo "dddd";
    require_once("views/quotationDetailxQxPxPC/newQuotationDetailxQxPxPC.php");
  }

  public function addQuotationDetail(){
    echo "mmm";
    $QD_id = quotationDetail::getNewID();
    echo "oooo";
    $Q_id = $_GET['Q_id'];
    $PC_id = $_GET['PC_id'];
    $QD_qty = $_GET['QD_qty'];
    echo "ppppp";
    $QD_numscreen = $_GET['QD_numscreen'];
    echo "$QD_id,$Q_id,$PC_id,$QD_qty,$QD_numscreen<br>";
    quotationDetail::addQuotationDetail($QD_id,$Q_id,$PC_id,$QD_qty,$QD_numscreen);
    quotationDetailxQxPxPCController::index();
  }

  








}
?>