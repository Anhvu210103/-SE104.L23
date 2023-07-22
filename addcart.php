<?php
    
     require_once __DIR__ ."/autoload/autoload.php";
    if(!isset($_SESSION['name_id']))
    {
        echo "<script> alert('Bạn phải đăng nhập mới thực hiện được chức năng này!'); location.href='index.php' </script>";
    }
    //Lay id cua sp
    $id = intval(getInput('id'));
   
    //chi tiet san pham
    $product = $db->fetchID("product", $id);
    
    //neu ton tai gio hang thi cap nhat gio hang
    
    //nguoc lai thi tao moi
    if(!isset($_SESSION['cart'][$id]))
    {
        //Tao moi gio hang
        $_SESSION['cart'][$id]['name']    = $product['name'];
        $_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
        $_SESSION['cart'][$id]['price'] = ((100 - $product['sale']) * $product['price']) / 100;
        $_SESSION['cart'][$id]['qty']     = 1;
    }
    else
    {
        // cap nhat lai gio hang
          $_SESSION['cart'][$id]['qty']     += 1;
    }
    echo "<script> alert('Thêm sản phẩm thành công!'); location.href='gio-hang.php' </script>";
?>