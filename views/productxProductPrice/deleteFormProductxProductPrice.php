
<?php echo "<br> Are your sure to DELETE this Productprice <br>
            <br>ID:$productPrice->productprice_id     PRICE:$productPrice->productprice_price 
                 QUANTITY:$productPrice->productprice_quantity     SCREEN PRICE:$productPrice->productprice_screen <br>"
?>

<form method="get" action="">
<input type="hidden" name="controller" value="productxProductPrices"/>
<input type="hidden" name="PP_id" value="<?php echo $productPrice->productprice_id ; ?>"/>
<button type="submit" name="action" value="index">Cancel</button>
<button type="submit" name="action" value="deleteProductPrice">Delete</button>
</form>
