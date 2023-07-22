<?php 
	require_once __DIR__ ."/autoload/autoload.php";
	$key = intval(getInput('key'));

	unset($_SESSION['cart'][$key]);
	$_SESSION['success']="xóa sản phẩm trong giỏ hàng thàng công";
	header("location:gio-hang.php");



?>	