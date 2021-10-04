new productprice <a href="?controller=productxProductPrices&action=new">click</a><br>

<form method = "get" action = "">
    <input type="text" name="key">
    <input type="hidden" name="controller" value="productxProductPrices">
    <button type="submit" name="action" value="search">SEARCH</button>
</form>

<table border=1>
<tr>
    <td>product_id</td>
    <td>product_name</td>
    <td>productprice_quantity</td>
    <td>productprice_price</td>
    <td>productprice_screen</td>
    <td>update</td>
    <td>delete</td>
</tr>

<?php
    foreach($productxProductPriceList as $productxProductPrice){
        echo "<tr>
        <td>$productxProductPrice->product_id</td>
        <td>$productxProductPrice->product_name</td>
        <td><=$productxProductPrice->productprice_quantity</td>
        <td>$productxProductPrice->productprice_price</td>
        <td>$productxProductPrice->productprice_screen</td>
        <td><a href=?controller=productxProductPrices&action=updateForm&PP_id=$productxProductPrice->productprice_id> update </a></td>
        <td><a href=?controller=productxProductPrices&action=deleteForm&PP_id=$productxProductPrice->productprice_id> delete </a></td>
        </tr>";
    }

echo"</table>";
?>