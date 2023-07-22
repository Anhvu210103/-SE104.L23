<?php 

    session_start();
    unset($_SESSION['admin_user']);
    unset($_SESSION['admin_id']);
    
    header("location: index.php");
?>