<?php
    require_once __DIR__ ."/autoload/autoload.php";
  
    $category= $db->fetchAll("category");
    
?>

<?php require_once __DIR__ ."/layouts/header.php"; ?>
                    <!-- Page Heading NOI DUNG -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Xin chào bạn đến với trang quản trị của Admin
                                
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
<?php require_once __DIR__ ."/layouts/footer.php"; ?>
 