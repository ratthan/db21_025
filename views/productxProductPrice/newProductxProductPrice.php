<form method="get" action="">
<label>product_name<select name="P_id"> 
    <?php foreach($productList as $product){ 
            echo "<option value=$product->product_id >$product->product_name </option>";
    } ?> </select> </label><br><br>
<label>less_product_than<input type="text" name="PP_qty"/></label><br><br>
<label>product_price<input type="text" name="PP_price"/></label><br><br>
<label>product_screenprice<input type="text" name="PP_screen"/></label><br><br>
<input type="hidden" name="controller" value="productxProductPrices"/>
<button type="submit" name="action" value="index">Back</button>
<button type="submit" name="action" value="addProductPrice">Save</button>
</form>

