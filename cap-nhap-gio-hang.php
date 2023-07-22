<?php 

 	    require_once __DIR__ ."/autoload/autoload.php";

 	    $key=intval(getInput("key")); //id sản phẩm
 	    $qty=intval(getInput("qty"));

 	    $_SESSION['cart'][$key]['qty']=$qty;

 	    echo 1;



 ?>