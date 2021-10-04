new QuotationDetail <a href="?controller=quotationDetailxQxPxPCs&action=new">click</a><br>

<form method = "get" action = "">
    <input type="text" name="key">
    <input type="hidden" name="controller" value="quotationDetailxQxPxPCs">
    <button type="submit" name="action" value="search">SEARCH</button>
</form>


<table border=1>
<tr>
    <td>quotation_id</td>
    <td>product_id</td>
    <td>product_name</td>
    <td>productcolor_color</td>
    <td>quotationdetail_quantity</td>
    <td>quotationdetail_numscreen</td>
    <td>price</td>
    <td>total</td>
    <td>update</td>
    <td>delete</td>

</tr>
<?php
    foreach($quotationDetailxQxPxPCList as $quotationDetailxQxPxPC){
        echo "<tr>
        <td>$quotationDetailxQxPxPC->quotation_id</td>
        <td>$quotationDetailxQxPxPC->product_id</td>
        <td>$quotationDetailxQxPxPC->product_name</td>
        <td>$quotationDetailxQxPxPC->productcolor_color</td>
        <td>$quotationDetailxQxPxPC->quotationdetail_quantity</td>
        <td>$quotationDetailxQxPxPC->quotationdetail_numscreen</td>
        <td>$quotationDetailxQxPxPC->price</td>
        <td>$quotationDetailxQxPxPC->total</td>
        <td><a href=?controller=quotationDetailxQxPxPCs&action=updateForm&QD_id=$quotationDetailxQxPxPCs->quotationdetail_id> update </a></td>
        <td><a href=?controller=quotationDetailxQxPxPCs&action=deleteForm&QD_id=$quotationDetailxQxPxPCs->quotationdetail_id> delete </a></td>
        </tr>";
    }

echo"</table>";
?>