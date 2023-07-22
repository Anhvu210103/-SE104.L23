
<!DOCTYPE html>
<html>
    <head>
        <title>WEB SHOP</title>
        <meta charset="utf-8">


        <link href="public/frontend/css/bootstrap.min.css" rel="stylesheet">
        <link href="public/frontend/css/nivo-slider.css" rel="stylesheet">
        <link href="public/frontend/css/animate.css" rel="stylesheet">
        <link href="public/frontend/css/owl.carousel.css" rel="stylesheet">
        <link href="public/frontend/css/style2.css" rel="stylesheet">
        <link href="public/frontend/css/responsive.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/bootstrap.min.css">
        
        <script  src="<?php echo base_url()?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url()?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/style.css">


        
    </head>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
           <div class="header">
            <div class="topbar">
                <div class="container">
                    <div class="topbar-left">
                        <ul class="topbar-nav clearfix">
                            <li><span class="phone">0866200977</span></li>
                            <li><span class="email">doanhtr@gmail.com</span></li>
                        </ul>
                    </div>
                    <div class="topbar-right">                            
                           <ul class="topbar-nav clearfix" id="headermenu">                                       
                                        <?php if(isset($_SESSION['name_user'])): ?>
                                             <li style="color: green; margin: 10px">Xin chào :  <?php echo $_SESSION['name_user'] ?></li>
                                            <li>
                                                <a href=""><i class="fa fa-user"></i> Tài khoản <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href=""><i class=" fa fa-eye"></i> Thông tin</a></li>
                                                    <li><a href="gio-hang.php"><i class=" fa fa-shopping-basket"></i> Giỏ hàng</a></li>
                                                    <li><a href="thoat.php"><i class="fa fa-share-square-o"></i>Thoát</a></li>
                                                </ul>
                                            </li>
                                          
                                        <?php else: ?>
                                            <li>
                                                <a href="dang-nhap.php"><i class="fa fa-unlock"></i> Đăng nhập</a>
                                            </li>
                                            <li>
                                                <a href="dang-ky.php"><i class="fa fa-sign-in"></i> Đăng ký</a>
                                            </li>
                                        <?php endif ?>
                               
                        </ul>
                    </div>
                </div><!-- /.container -->
            </div><!-- /.topbar -->
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="index.html" class="logo"><img src="public/frontend/images/logo1.png" alt="" height="200" width="250"></a>
                        </div>
                        <div class="col-md-9">
                            <div class="support-client">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="box-container time">
                                            <div class="box-inner">
                                                <h2>Thời gian làm việc</h2>
                                                <p>Thứ 2- Chủ nhật: 8.00 - 18.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="box-container free-shipping">
                                            <div class="box-inner">
                                                <h2>Miễn phí giao hàng</h2>
                                                <p>cho đơn hàng trên 500.000đ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="box-container money-back">
                                            <div class="box-inner">
                                                <h2>Money back 100%</h2>
                                                <p>Within 30 Days after delivery</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.support-client -->
                            <form class="form-search">
                                <input type="text" class="input-text" name="q" id="search" placeholder="Tìm kiếm sản phẩm">
                                <div class="dropdown">
                                    <button type="button" class="btn" data-toggle="dropdown">Danh mục <span class="fa fa-angle-down"></span></button>
                                    
                                </div>

                                <button type="submit" class="btn btn-danger"><span class="fa fa-search"></span></button>
                            </form>

                            <div class="mini-cart">
                                <ul class="pull-right" id="main-shopping">
                                    <li>
                                        <a href="gio-hang.php"><em class="fa fa-shopping-basket"></em> Giỏ hàng </a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mega-container visible-lg visible-md">
                                <div class="navleft-container">
                                    <div class="mega-menu-title"><h3>Danh mục sản phẩm</h3></div>
                                    <div class="mega-menu-category">
                                        <ul class="nav">
                                            <?php foreach($category as $item) :?>
                                            <li><a href="danh-muc-san-pham.php?id=<?php echo $item['id']?>"><?php echo $item['name']?></a></li>
                                    <?php endforeach;?>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <ul class="menu clearfix visible-lg visible-md">
                                <li><a href="index.php">Trang Chủ</a></li>
                                <li><a href="danh-muc-san-pham.php">Sản phẩm</a></li>
                                <li><a href="grid.html">Tin tức</a></li>
                                <li><a href="blog.html">Liên hệ</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>                
            </div><!-- /.header-bottom -->
        </div><!-- /.header -->
            


            <!--MENUNAV-->

            <!--ENDMENUNAV-->
            
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i></i></h3>
                               <ul>

                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>    
                               </ul>
                        </div> 


                        
                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>             
                            <ul> 
                                <?php foreach ($productNew as $item): ?>
                                    <li class="clearfix">
                                        <a href="">
                                            <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar']?>" class="img-responsive pull-left" width="70" height="70">
                                            <div class="info pull-right">
                                                <p class="name"> <?php echo $item['name'] ?></p >
                                                <b class="price">Giảm giá: <?php echo formatpricesale($item['price'], $item['sale'])?> đ</b><br>
                                                <b class="sale">Giá gốc: <?php echo formatprice($item['price'])?> đ</b><br>
                                                <span class="view"><i class="fa fa-eye"> 999 </i> <i class="fa fa-heart-o"></i> 26</span>
                                            </div>
                                        </a>
                                     </li>
                                <?php endforeach; ?>
                             
                            </ul>
                            <!-- </marquee> -->
                        </div>

                        <div class="box-left box-menu">
                            <div class="banner-left"><a href="#"><img src="public/frontend/images/ads-01.jpg" alt=""></a>
                                <div class="banner-content">
                                    <h1>sale up to</h1>
                                    <h2>20% off</h2>
                                    <p>on selected products</p>
                                    <a href="#">buy now</a>
                                </div>
                            </div>
                         </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm bán chạy </h3>
                           <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach ($productPay as $item): ?>
                                    <li class="clearfix">
                                        <a href="">
                                            <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar']?>" class="img-responsive pull-left" width="70" height="70">
                                            <div class="info pull-right">
                                                <p class="name"> <?php echo $item['name'] ?></p >
                                                <b class="price">Giảm giá: <?php echo formatpricesale($item['price'], $item['sale'])?> đ</b><br>
                                                <b class="sale">Giá gốc: <?php echo formatprice($item['price'])?> đ</b><br>
                                                <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                            </div>
                                        </a>
                                     </li>
                                <?php endforeach; ?>
                                
                               </ul>
                        </div>                   
                       
                       
                       
                    </div>