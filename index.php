<?php
if(isset($_GET['controller'])&&isset($_GET['action'])){
    $controller = $_GET['controller'];
    $action = $_GET['action'];
}else{
    $controller = 'pages';
    $action = 'home';
}?>
<html>
<head></head>
<body>
    <?php echo "controller = ".$controller.", action = ".$action;  ?>
    <br>[<a href="">HOME</a>]<br>
    [<a href="?controller=productPrices&action=index">PRODUCTPRICE</a>]<br>
    [<a href="?controller=quotationDetails&action=index">QUOTATIONDETAIL</a>]<br>
    <?php require_once("routes.php");?>
</body>
</html>

