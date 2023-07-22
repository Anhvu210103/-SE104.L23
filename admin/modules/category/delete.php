<?php
    $open = "category";
    require_once __DIR__ ."/../../autoload/autoload.php";
    
   $id = intval(getInput('id')); // ep kieu
   
   $EditCategory = $db->fetchID("category", $id);
   //Neu Id khong co thi tra ve index
   if(empty($EditCategory))
   {
       $_SESSION['error']= "Dữ liệu không tồn tại";
       redirectAdmin("category");
   }
   
   $is_product = $db->fetchOne("product","category_id= $id ");
   if($is_product == NULL)
   {
        $num= $db->delete("category",$id);
        if($num > 0)
        {
            $_SESSION['success']= "Xóa thành công!";
                    //Quay tro lai trang category
            redirectAdmin("category");
        }
        else
        {
            $_SESSION['error']= "Xóa dữ diệu thất bại";
            redirectAdmin("category");
        }
   }
   else
   {
         $_SESSION['error']= "Danh mục có sản phẩm, bạn không thể xóa!";
         redirectAdmin("category");
   }
   
  
           
?>