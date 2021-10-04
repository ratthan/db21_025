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
  public function updateForm(){
    $QD_id = $_GET['QD_id'];
    $quotationDetail = quotationDetail::get($QD_id);
    $quotationList = quotation::getAll();
    require_once("views/quotationDetailxQxPxPC/updateFormQuotationDetailxQxPxPC.php");
}

public function updateQuotationDetail(){
    $QD_id = $_GET['QD_id'];
    $Q_id = $_GET['Q_id'];
    $QD_numscreen = $_GET['QD_numscreen '];
    $QD_qty = $_GET['QD_qty'];
    $PC_id = $_GET['PC_id'];
    quotationDetail::update($QD_id ,$Q_id,$ $QD_numscreen,$QD_qty, $PC_id);
    quotationDetailxQxPxPCsController::index();
}

public function deleteForm(){
    $QD_id = $_GET['$QD_id'];
    $quotationDetail = productPrice::get($QD_id);
    require_once("views/quotationDetailxQxPxPC/deleteFormQuotationDetailxQxPxPC.php");
}

public function deleteQuotationDetail(){
    $QD_id = $_GET['QD_id'];
    quotationDetail::delete($QD_id);
    quotationDetailxQxPxPCsController::index();
}

  








}
?>