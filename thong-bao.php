<?php 
    
    require_once __DIR__ ."/autoload/autoload.php";
    unset($_SESSION['cart']);
    unset($_SESSION['total']);
?>

<?php require_once __DIR__ ."/layouts/header.php"; ?>
                    
                        <section class="box-main1">
                            <h3 class="title-main" ><a href=""> Thông báo thanh toán </a> </h3>         
                                <?php if(isset($_SESSION['success'])): ?>
                                       <div class="alert alert-success">
                                           <strong style="color: #3c763d">Success!</strong> <?php echo $_SESSION['success'];unset($_SESSION['success'])?>
                                       </div>
                               <?php endif?>
                            <a href="index.php" class="btn btn-success"> Trở về trang chủ</a>
                        </section>
                    </div>
          
<?php require_once __DIR__ ."/layouts/footer.php"; ?>