<form method="get" action="">
<label>product_name<select name="P_id"> 
    <?php   foreach($productList as $product){ 
                echo "<option value=$product->product_id "; 
                if($product->product_id == $productPrice->product_id){echo " selected='selected' "; }  
                echo " >$product->product_name </option>";
            } ?> </select> </label><br><br>
<label>less_product_than<input type="text" name="PP_qty" value="<?php echo $productPrice->productprice_quantity; ?>"/></label><br><br>
<label>product_price<input type="text" name="PP_price" value="<?php echo $productPrice->productprice_price; ?>"/></label><br><br>
<label>product_screenprice<input type="text" name="PP_screen" value="<?php echo $productPrice->productprice_screen; ?>"/></label><br><br>
<input type="hidden" name="PP_id" value="<?php echo $productPrice->productprice_id; ?>"/>
<input type="hidden" name="controller" value="productxProductPrices"/>
<button type="submit" name="action" value="index">Back</button>
<button type="submit" name="action" value="updateProductPrice">Save</button>
</form>

