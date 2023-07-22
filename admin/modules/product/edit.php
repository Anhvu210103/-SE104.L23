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
    
    $category=$db->fetchAll("category");
   if($_SERVER["REQUEST_METHOD"]== "POST")
   {  
       $data =
       [
           "name"        =>  postInput('name'),
           //Chuyen thanh khong dau , cach thanh -
           "slug"        =>  to_slug(postInput("name")),
           "category_id" =>  postInput("category_id"),
           "price"       =>  postInput("price"),
           "content"     =>  postInput("content"),
           "number"      =>  postInput("number"),
           "sale"        =>  postInput("sale")
       ];
       
       $error = [];
       if(postInput('category_id') == '')
       {
           $error['category_id'] = "Mời bạn chọn danh mục sản phẩm!";
       }
       if(postInput('name') == '')
       {
           $error['name'] = "Mời bạn nhập đầy đủ tên sản phẩm!";
       }
       if(postInput('price') == '')
       {
           $error['price'] = "Mời bạn nhập giá sản phẩm!";
       }
       if(postInput('content') == '')
       {
           $error['content'] = "Mời bạn nhập nội dung sản phẩm!";
       }
        if(postInput('number') == '')
       {
           $error['number'] = "Mời bạn số lượng sản phẩm!";
       }
       
       
       // Trống có nghĩa là không có lỗi
       if(empty($error))
       {
           if( isset($_FILES['thunbar']))
           {
               $file_name = $_FILES['thunbar']['name'];
               $file_tmp = $_FILES['thunbar']['tmp_name'];
               $file_type = $_FILES['thunbar']['type'];
               $file_error =$_FILES['thunbar']['error'];
               
               if($file_error == 0)
               { 
                   //duong dan
                   $part = ROOT ."product/";
                   $data['thunbar'] = $file_name;
               }
            }
            
            $update = $db->update("product", $data,array("id"=>$id));
            if($update >0 )
            {
               move_uploaded_file($file_tmp, $part.$file_name);
               $_SESSION['success']=" Cập nhật thành công!";
               redirectAdmin("product");
            }
            else
            {
                $_SESSION['error']=" Cập nhật thất bại!";
                redirectAdmin("product");
            }
        }   
   }
    
?>

<?php require_once __DIR__ ."/../../layouts/header.php"; ?>
                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Thêm mới Sản phẩm
                                <small>Subheading</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                </li>
                                <li>
                                    <i></i> <a href="">Sản phẩm</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Thêm mới
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                            <!-- Thong bao loi -->
                            <?php require_once __DIR__ ."/../../../partials/notification.php"; ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Danh mục SP</label>
                              <div class="col-sm-8">
                                  <select class="form-control col-md-8" name="category_id">
                                      <option values="">---Mời bạn chọn danh mục sản phẩm--- </option>
                                      <?php foreach($category as $item): ?>
                                      <option value="<?php echo $item['id']?>" <?php echo $EditProduct['category_id'] == $item['id'] 
                                              ? "selected = 'selected'" : '' ?>> <?php echo $item['name']?></option>
                                      <?php endforeach;?>
                                  </select>
                                  <?php if (isset($error['category'])): ?>
                                  <p class="text-danger"><?php echo $error['category']; ?></p> 
                                  <?php endif ?>                               
                              </div>    
                            </div> 
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" id="inputEmail3" placeholder="Tên danh mục" name="name" value="<?php echo $EditProduct['name']?>">
                                  <?php if (isset($error['name'])): ?>
                                  <p class="text-danger"><?php echo $error['name']; ?></p> 
                                  <?php endif ?>                               
                              </div>                            
                            </div>
                            
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Giá sản phẩm</label>
                              <div class="col-sm-3">
                                  <input type="number" class="form-control" id="inputEmail3" placeholder="9.000.000" name="price" value="<?php echo $EditProduct['price']?>">
                                  <?php if (isset($error['price'])): ?>
                                  <p class="text-danger"><?php echo $error['price']; ?></p> 
                                  <?php endif ?>                               
                              </div>                            
                            </div>
                             
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Giảm giá</label>
                              <div class="col-sm-2">
                                  <input type="number" class="form-control" id="inputEmail3" placeholder="10%" name="sale" value="<?php echo $EditProduct['sale']?>">                                           
                              </div>     
                              <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
                              <div class="col-sm-3">
                                  <input type="file" class="form-control" id="inputEmail3" name="thunbar"> 
                                  <?php if (isset($error['thunbar'])): ?>
                                  <p class="text-danger"><?php echo $error['thunbar']; ?></p> 
                                  <?php endif ?>  
                                  <img src="<?php echo uploads()?>product/<?php echo $EditProduct['thunbar']?>" width="70px" height="50px">
                              </div>
                            </div>    
                            
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Số lượng</label>
                              <div class="col-sm-8">
                                  <input type="number" class="form-control" id="inputEmail3" placeholder="100" name="number" value="<?php echo $EditProduct['number']?>">
                                  <?php if (isset($error['number'])): ?>
                                  <p class="text-danger"><?php echo $error['number']; ?></p> 
                                  <?php endif ?>                               
                              </div>                            
                            </div>    
                                
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Nội dung</label>
                              <div class="col-sm-8">
                                  <textarea class="form-control" name="content" rows="4"><?php echo $EditProduct['content']?></textarea>
                                  <?php if (isset($error['content'])): ?>
                                  <p class="text-danger"><?php echo $error['content']; ?></p> 
                                  <?php endif ?>                               
                              </div>                            
                            </div>
                                
                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Lưu</button>
                              </div>
                            </div>
                            </form>
                        </div>
                    </div>
<?php require_once __DIR__ ."/../../layouts/footer.php"; ?>
 