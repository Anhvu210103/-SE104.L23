<?php
    session_start();
    require_once __DIR__ ."/../libraries/Database.php";
    require_once __DIR__ ."/../libraries/Function.php";
    $db= new Database();
    
    define("ROOT", $_SERVER['DOCUMENT_ROOT']."/damphp/public/uploads/");
    
    
    //Loai danh muc - fronend
    $category = $db->fetchAll("category");
    
    
    //San pham moi nhat
    $sqlNew= "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 3";
    $productNew= $db->fetchsql($sqlNew);
    
    //San pham ban chay
    $sqlPay =  "SELECT * FROM product WHERE 1 ORDER BY PAY DESC LIMIT 3";
    $productPay = $db->fetchsql($sqlPay);
    
?>