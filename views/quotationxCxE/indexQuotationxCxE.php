new quotation <a href="?controller=quotationxCxEs&action=new">click</a><br>

<form method = "get" action = "">
    <input type="text" name="key">
    <input type="hidden" name="controller" value="quotationxCxEs">
    <button type="submit" name="action" value="search">SEARCH</button>
</form>


<table border=1>
<tr>
    <td>quotation_id</td>
    <td>quotation_date</td>
    <td>customer_name</td>
    <td>customer_address</td>
    <td>customer_phone</td>
    <td>employee_name</td>

    <td>update</td>
    <td>delete</td>

</tr>
<?php
    foreach($quotationxCxEList as $quotationxCxE){
        echo "<tr>
        <td>$quotationxCxE->quotation_id</td>
        <td>$quotationxCxE->quotation_date</td>
        <td>$quotationxCxE->customer_name</td>
        <td>$quotationxCxE->customer_address</td>
        <td>$quotationxCxE->customer_phone</td>
        <td>$quotationxCxE->employee_name</td>
        <td><a href=?controller=quotationxCxEs&action=updateForm&PP_id=$quotationxCxE->quotation_id> update </a></td>
        <td><a href=?controller=quotationxCxEs&action=deleteForm&PP_id=$quotationxCxE->quotation_id> delete </a></td>
        </tr>";
    }

echo"</table>";
?>