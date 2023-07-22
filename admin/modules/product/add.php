<?php
    $open="category";
    require_once __DIR__. "/../../autoload/autoload.php" ;

    //danh sách danh mục sản phẩm

    $category=$db->fetchAll("category");
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {  
        $data = 
        [
            "name"          => postInput('name'),
            "slug"          => to_slug(postInput("name")),
            "category_id"   => postInput("category_id"),
            "price"         => postInput("price"),
            "number"        => postInput("number"),
            "content"       => postInput("content")
        ]; 

        $error=[];

        if (postInput('name') == '') 
        {
            $error['name']="mời bạn nhập đẩy đủ tên danh mục";            
        }

        if (postInput('category_id')=='') 
        {
            $error['category_id']="mời bạn chọn tên danh mục";            
        }

        if (postInput('price')=='') 
        {
            $error['price']="mời bạn nhập giá sản phẩm";            
        }
        
        if (postInput('content')=='') 
        {
            $error['content']="mời bạn nhập nội dung sản phẩm";            
        }
        if (postInput('number')=='') 
        {
            $error['number']="mời bạn nhập số lượng sản phẩm";            
        }


        if(! isset($_FILES['thunbar']))
        {
            $error['thunbar']="mời bạn chọn hình ảnh";           
        }
        //error trống có nghĩa ko có lỗi
        if (empty($error)) 
        {
            if (isset($_FILES['thunbar'])) 
            {
                $file_name=$_FILES['thunbar']['name'];
                $file_tmp=$_FILES['thunbar']['tmp_name'];
                $file_type=$_FILES['thunbar']['type'];
                $file_erro=$_FILES['thunbar']['erro'];

                if($file_erro==0)
                {
                    //lưu ảnh vào produc
                    $part=ROOT ."product/";
                    //lấy tên của ảnh
                    $data['thunbar']=$file_name;
                }                
            }
            $id_insert=$db->insert("product",$data);
            if ($id_insert) 
            {
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success']="Thêm mới thành công";
                redirectAdmin("product");                                    
            }
            else 
            {
                $_SESSION['error']="Thêm mới thất bại";                        
            }                    
        }     
                    
    }
    
    ?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Thêm mới sản phẩm                               
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>/admin">Bảng điều khiển </a>                                    
            </li>
            <li>
                <i class="fa fa-dashboard"></i>  <a href="">Sản phẩm</a>                                    
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Thêm mới
            </li>
        </ol>
        <div class="clearfix"></div>
        <?php if(isset($_SESSION['error'])) :?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
        </div>
        <?php endif ; ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Danh mục sản phẩm</label>
                <div class="col-sm-8">
                    <select class="form-control col-md-8" name="category_id">
                        <option value="">-Mời bạn chọn danh mục sản phẩm-</option>
                        <?php foreach ($category as $item): ?>
                            <option value="<?php echo $item['id'] ?>"><?php  echo $item['name'] ?></option>
                        <?php endforeach ?>
                    </select>    
                    <?php if (isset($error['category_id'])): ?>
                    <p class="text-danger"> <?php echo $error['category_id'] ?> </p>
                    <?php endif ?>    
                </div>
            </div>


            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Sony" name="name">
                    <?php if (isset($error['name'])): ?>
                    <p class="text-danger"> <?php echo $error['name'] ?> </p>
                    <?php endif ?>    
                </div>
            </div>


            

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Giá sản phẩm</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="1.000.000" name="price">
                    <?php if (isset($error['price'])): ?>
                    <p class="text-danger"> <?php echo $error['price'] ?> </p>
                    <?php endif ?>    
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Số lượng</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="100" name="number">
                    <?php if (isset($error['number'])): ?>
                    <p class="text-danger"> <?php echo $error['number'] ?> </p>
                    <?php endif ?>    
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Giảm giá</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="10%" name="sale" value="0">                        
                </div>

                <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
                <div class="col-sm-4">
                    <input type="file" class="form-control" id="inputEmail3"  name="thunbar">
                    <?php if (isset($error['thunbar'])) : ?>
                    <p class="text-danger"> <?php echo $error['thunbar'] ?></p>   
                    <?php endif ?>            
                </div>                
            </div>

            

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nội dung</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="content" rows="4"></textarea>
                    <?php if (isset($error['content'])): ?>
                    <p class="text-danger"> <?php echo $error['content'] ?> </p>
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
<!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>