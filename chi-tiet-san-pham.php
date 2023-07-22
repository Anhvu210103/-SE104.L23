<?php 
    
    require_once __DIR__ ."/autoload/autoload.php";
    
    $id = intval(getInput('id'));
   
    //chi tiet san pham
    $product = $db->fetchID("product", $id);
   
     //Lay danh muc san pham lien quan
    $cateid = intval($product['category_id']);
    
    $sql = "SELECT * FROM product WHERE category_id = $cateid ORDER BY ID DESC LIMIT 4";
    $spkemtheo = $db->fetchsql($sql);
   
   
?>

<?php require_once __DIR__ ."/layouts/header.php"; ?>
    
            <div class="col-md-9 bor">
                        
                        <section class="box-main1" >
                            <div class="col-md-6 text-center">
                                <img src="<?php echo uploads()?>product/<?php echo $product['thunbar']?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/n5378.jpg">
                                
                                <ul class="text-center bor clearfix" id="imgdetail">
                                    <li>
                                        <img src="<?php echo base_url()?>public/frontend/images/laptop.jpg" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                    <li>
                                        <img src="<?php echo base_url()?>public/frontend/images/laptop5.jpg" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                     <li>
                                        <img src="<?php echo base_url()?>public/frontend/images/laptop6.jpg" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                    <li>
                                        <img src="<?php echo base_url()?>public/frontend/images/laptop7.jpg" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
                               <ul id="right">
                                    <li><h3><?php echo $product['name'] ?></h3></li>
                                    <?php if($product['sale'] >0): ?>                                                                    
                                    <li><p><strike class="sale"><?php echo formatPrice($product['price'])?> </strike> <b class="price"><?php echo formatpricesale($product['price'], $product['sale'])?> </b></p></li>
                                <?php  else : ?>
                                    <li><p><b><?php echo formatPrice($product['price'])?> đ</strike> <b class="price"></b></p></li>
                                        <?php endif ?>
                                    <li><a href="gio-hang.php" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Thêm vào giỏ hàng</a></li>
                               </ul>
                            </div>

                        </section>
                        <div class="col-md-12" id="tabdetail">
                            <div class="row">
                                    
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>
                                    <li><a data-toggle="tab" href="#menu1">Thông tin khác </a></li>
                                    <li><a data-toggle="tab" href="#menu2">Yêu thích</a></li>
                                    <li><a data-toggle="tab" href="#menu3">Bình luận về sản phẩm</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <h3>Nội dung</h3>
                                        <p><?php echo $product['content'] ?></p>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <h3> Thông tin khác </h3>
                                        <p><?php echo $product['content'] ?></p>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <h3></h3>
                                        <p>Bình luận về sản phẩm.</p>
                                    </div>
                                    <div id="menu3" class="tab-pane fade">
                                        
                                        <div id="fb-root"></div>
                                            <script>(function(d, s, id) {
                                              var js, fjs = d.getElementsByTagName(s)[0];
                                              if (d.getElementById(id)) return;
                                              js = d.createElement(s); js.id = id;
                                              js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12&appId=1862935443738920&autoLogAppEvents=1';
                                              fjs.parentNode.insertBefore(js, fjs);
                                            }(document, 'script', 'facebook-jssdk'));</script>

                                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                              <div class="showitem">
                                    <?php foreach ($spkemtheo as $item):?>
                                        <div class="col-md-3  item-product bor">
                                            <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>">
                                                <img src="<?php echo uploads()?>product/<?php echo $item['thunbar']?>" class="" width="100%" height="140">
                                           </a>
                                           <div class="info-item">
                                               <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>"><?php echo $item['name']?></a>
                                               <p><strike class="sale"><?php echo formatPrice($item['price'])?> đ</strike> <b class="price"><?php echo formatpricesale($item['price'], $item['sale'])?> đ</b></p>
                                           </div>
                                           <div class="hidenitem">
                                               <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>"><i class="fa fa-search"></i></a></p>
                                               <p><a href=""><i class="fa fa-heart"></i></a></p>
                                               <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                                           </div>
                                        </div>   
                                    <?php endforeach;?>
                                </div>     
                        </div>
                    </div>             
<?php require_once __DIR__ ."/layouts/footer.php"; ?>