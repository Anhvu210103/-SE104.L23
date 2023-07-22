<?php
    $open = "category";
    require_once __DIR__ ."/../../autoload/autoload.php";
    
   $id = intval(getInput('id')); // ep kieu
   
   $DeleteAdmin = $db->fetchID("users", $id);
   //Neu Id khong co thi tra ve index
   if(empty($DeleteAdmin))
   {
       $_SESSION['error']= "Dữ liệu không tồn tại";
       redirectAdmin("user");
   }
   
   $num= $db->delete("users",$id);
   if($num > 0)
   {
       $_SESSION['success']= "Xóa thành công!";
               //Quay tro lai trang product
       redirectAdmin("user");
   }
   else
   {
       $_SESSION['error']= "Xóa dữ diệu thất bại";
       redirectAdmin("user");
   }
           
?>