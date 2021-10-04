
<?php echo "<br> Are your sure to DELETE this Quotationdetail <br>
            <br>QID:$quotationDetail->quotation_id     Produtname:$quotationDetail->$product_name
                 QD_qty:$quotationDetail->$quotationdetail_quantity     Numscreen:$quotationDetail->$quotationdetail_numscreen <br>"
?>

<form method="get" action="">
<input type="hidden" name="controller" value="quotationDetail"/>
<input type="hidden" name="QD_id" value="<?php echo $quotationDetail->$quotationdetail_id ; ?>"/>
<button type="submit" name="action" value="index">Cancel</button>
<button type="submit" name="action" value="deleteQuotationDetail">Delete</button>

</form>
