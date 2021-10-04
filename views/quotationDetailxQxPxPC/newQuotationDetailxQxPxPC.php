<form method="get" action="">
<label>quotation_id<select name="Q_id"> 
    <?php foreach($quotationList as $quotation){ 
            echo "<option value=$quotation->quotation_id >$quotation->quotation_id </option>";
    } ?> </select> </label><br><br>

<label>product<select name="PC_id"> 
    <?php foreach($productxProductColorList as $productxProductColor){ 
            echo "<option value=$productxProductColor->productcolor_id >$productxProductColor->product_name  $productxProductColor->productcolor_color  </option>";
    } ?> </select> </label><br><br>

<label>QD_quantity<input type="text" name="QD_qty"/></label><br><br>
<label>QD_numscreen<input type="text" name="QD_numscreen"/></label><br><br>
<input type="hidden" name="controller" value="quotationDetailxQxPxPCs"/>
<button type="submit" name="action" value="index">Back</button>
<button type="submit" name="action" value="addQuotationDetail">Save</button>
</form>

