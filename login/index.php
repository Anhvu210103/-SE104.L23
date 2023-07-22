<?php
    session_start();
    require_once __DIR__ ."/../libraries/Database.php";
    require_once __DIR__ ."/../libraries/Function.php";
    $db = new Database;
    $data = 
    [
        "email" => postInput('email'),
        "password"  =>  postInput('password')
    ];
    $error = [];
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
         if($data['email'] == '')
        {
            $error['email'] = "Email không được để trống!";
        }
        
        
        if($data['password'] == '')
        {
            $error['password'] = "Mật khẩu không được để trống!";
        }
        if(empty($error))
        {
            $is_check = $db->fetchOne("admin","email = '".$data['email']."' AND password ='".MD5($data['password'])."'");
             
            if($is_check != NULL)
            {
                //dang nhap thanh cong
                $_SESSION['admin_name'] = $is_check['name'];
                $_SESSION['admin_id'] = $is_check['id'];
                echo "<script> alert('Đăng nhập thành công!'); location.href='/doanhtr/admin/' </script>";
            }
            else
            {
                //that bai
                $_SESSION['error']="Đăng nhập thất bại!";
            }
            
        }
    }
    
?>




<head>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    

</head>




<style type="text/css">
 /* Credit to bootsnipp.com for the css for the color graph */
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}   
</style>




<div class="container">

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form role="form" action="" method="POST">
			<fieldset>
				<h2>ĐĂNG NHẬP VÀO HỆ THỐNG</h2>
				<div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" >
				</div>
				<div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg">
				</div>
				
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Đăng nhập">
					</div>					
				</div>
			</fieldset>
		</form>
	</div>
</div>

</div>