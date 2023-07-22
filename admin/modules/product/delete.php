<?php
    $open = "category";
    require_once __DIR__ ."/../../autoload/autoload.php";
    
   $id = intval(getInput('id')); // ep kieu
   
   $EditProduct = $db->fetchID("product", $id);
   //Neu Id khong co thi tra ve index
   if(empty($EditProduct))
   {
       $_SESSION['error']= "Dữ liệu không tồn tại";
       redirectAdmin("product");
   }
   
   $num= $db->delete("product",$id);
   if($num > 0)
   {
       $_SESSION['success']= "Xóa thành công!";
               //Quay tro lai trang product
       redirectAdmin("product");
   }
   else
   {
       $_SESSION['error']= "Xóa dữ diệu thất bại";
       redirectAdmin("product");
   }
           
?>