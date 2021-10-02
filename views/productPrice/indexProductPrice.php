<table border=1>
<tr>
    <td>productprice_ID</td>
    <td>product_ID</td>
    <td>price</td>
    <td>quantity</td>
    <td>screenprice</td>
    <td>update</td>
    <td>delete</td>
</tr>
<?php
    foreach($productPriceList as $productprice){
        echo "<tr>
        <td>$productprice->productprice_id</td>
        <td>$productprice->product_id</td>
        <td>$productprice->price</td>
        <td><=$productprice->quantity</td>
        <td>$productprice->screen</td>
        <td>update</td>
        <td>delete</td>
        </tr>";
    }

echo"</table>";
?>