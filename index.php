<?php 

    require_once __DIR__ ."/autoload/autoload.php"; 
   
    //unset($_SESSION['cart']);
     
    $sqlHomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY updated_at";
    $CategoryHome = $db->fetchsql($sqlHomecate);
    
    $data = [];
    
    foreach ($CategoryHome as $item)
    {
     
        //ep kieu 
        $cateId = intval($item['id']);
        //Loc ra
        $sql = "SELECT * FROM product WHERE category_id = $cateId";
        $ProductHome = $db->fetchsql($sql);
     
        // mang 2 chieu
        $data[$item['name']] =$ProductHome; 
       
    }
?>

<?php require_once __DIR__ ."/layouts/header.php"; ?>


      <div class="col-md-9 bor">
        <div class="row">
            
          <div class="flexslider ma-nivoslider">
              <div class="ma-loading"></div>
              <div id="ma-inivoslider-banner7" class="slides">
                  <img src="public/frontend/images/slider/slide-01.jpg" class="dn" alt="" title="#banner7-caption1"  />                           
                  <img src="public/frontend/images/slider/slide-02.jpg" class="dn" alt="" title="#banner7-caption2"  />
              </div>
              <div id="banner7-caption1" class="banner7-caption nivo-html-caption nivo-caption">
                  <div class="timethai"></div>
                  <div class="banner7-content slider-1">
                      <div class="title-container">
                          <h1 class="title1" style="color:black">headphones az12</h1>                                    
                      </div>
                      <div class="banner7-des">
                          <div class="des">
                              <h1>sale up to!</h1>
                              <h2>30% off</h2>
                              <div class="check-box">
                                  <ul class="list-unstyled">
                                      <li>With all products in shop</li>
                                      <li>All combos $69.96</li>
                                  </ul>
                              </div>
                          </div>
                      </div>                                                                                              
                      <img class="img1" src="public/frontend/images/slider/img-04.png" alt="" />                                                                              
                  </div>
              </div>                      
              <div id="banner7-caption2" class="banner7-caption nivo-html-caption nivo-caption">
                  <div class="timethai"></div>
                  <div class="banner7-content slider-2">
                      <div class="title-container">
                          <h1 class="title1" style="color:black">Samsung s5</h1>                                      
                      </div>
                      <div class="banner7-des">
                          <div class="des">
                              <h1>sale up to!</h1>
                              <h2>50% off</h2>
                          </div>
                      </div>                                                                                              
                      <img class="img1" src="public/frontend/images/slider/img-05.png" alt="" />                                                                                  
                  </div>
              </div>
          </div><!-- /.flexslider -->            
        </div>       

        <section class="box-main1" >
          <?php foreach ($data as $key => $value):?>
            <h3 class="title-main"><a href=""><?php echo $key?></a></h3>
                <div class="showitem">
                    <?php foreach ($value as $item):?>
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
                               <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                           </div>
                        </div>   
                    <?php endforeach;?>
                </div>         
         <?php endforeach; ?>                           
        </section>
        
      </div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a30912e5d3202175d9b7e6a/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php require_once __DIR__ ."/layouts/footer.php"; ?>


           