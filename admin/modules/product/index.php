<?php
    
    $open = "product";
    require_once __DIR__ ."/../../autoload/autoload.php";
    
    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }
    //truy van doi ten cot category name bang chu
    $sql = "SELECT product.*,category.name as namecate FROM product
            LEFT JOIN category on category.id = product.category_id";
    
    $product = $db->fetchJone('product', $sql, $p, 3, true);
    
    if(isset($product['page']))
    {
        $sotrang = $product['page'];
        unset($product['page']);
    }
   // $product = $db->fetchAll("product");
?>
<?php require_once __DIR__ ."/../../layouts/header.php"; ?>
<!-- Page Heading NOI DUNG -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Danh sách Sản Phẩm
            <a href="add.php" class="btn btn-success"> Thêm mới</a>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Danh mục
            </li>
        </ol>
        <div class="clearfix"></div>
        <!-- Thong bao loi -->
        <?php require_once __DIR__ ."/../../../partials/notification.php"; ?>
        </div>
</div>
<div class="row">
    <div class="col-md-12">
          <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Thunbar</th>
                    <th>Info</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt=1; foreach ($product as $item): ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php echo $item['namecate']?></td>
                        <td><?php echo $item['slug']?></td>
                        <td>
                            <img src="<?php echo uploads()?>product/<?php echo $item['thunbar']?>" width="150px" height="100px">
                        </td>
                        <td>
                            <ul>
                                <li> Giá: <?php echo $item['price']?> VND</li>
                                <li> Số lượng: <?php echo $item['number']?></li>
                            </ul>
                        </td>
                        <td>
                            <a class="btn btn-xs btn-info" href="edit.php ?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i>Sửa</a>
                            <a class="btn btn-xs btn-danger"href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a>                     
                        </td>
                    </tr>         
                <?php $stt++; endforeach; ?>
            </tbody>
        </table>
              <div class="pull-right">
              <nav aria-label="Page navigation">
                     <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <=$sotrang ; $i++) : ?>
                        <?php 
                            if(isset($_GET['page']))
                        {
                            $p=$_GET['page'];
                        }
                        else
                        {
                            $p=1;
                        }
                        ?>
                        
                        <li class="<?php echo($i==$p) ? 'active' : '' ?>">
                            <a href="?page=<?php echo $i ;?>"><?php echo $i; ?></a>                                               
                    <?php endfor; ?>
						</li>
                <li>
                    <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
              </nav>
              </div>
    </div>
</div>
<!-- /.row -->
<?php require_once __DIR__ ."/../../layouts/footer.php"; ?>