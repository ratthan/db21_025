<form method = "get" action = "">
    <input type="text" name="key">
    <input type="hidden" name="controller" value="productPrices">
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
    foreach($productPriceList as $productprice){
        echo "<tr>
        <td>$productprice->product_id</td>
        <td>$productprice->product_name</td>
        <td><=$productprice->productprice_quantity</td>
        <td>$productprice->productprice_price</td>
        <td>$productprice->productprice_screen</td>
        <td>update</td>
        <td>delete</td>
        </tr>";
    }

echo"</table>";
?>