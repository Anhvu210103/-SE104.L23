<?php
    
    $open = "transaction";
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
    $sql = "SELECT transaction.*, users.name as nameuser, users.phone as phoneuser FROM transaction LEFT JOIN users ON users.id = transaction.users_id ORDER BY ID DESC";
        
    $transaction = $db->fetchJone('transaction',$sql,$p, 4,true);
    
    if(isset($transaction['page']))
    {
        $sotrang = $transaction['page'];
        unset($transaction['page']);
    }
   // $transaction = $db->fetchAll("transaction");
?>
<?php require_once __DIR__ ."/../../layouts/header.php"; ?>
<!-- Page Heading NOI DUNG -->
<div class="row">
    <div class="col-lg-12">
    <?php foreach ($profit as $item): ?>
        echo $item['amount'];
    <?php endforeach; ?>
        <h1 class="page-header">
            Doanh thu la            
        </h1>
        <div class="clearfix"></div>
        <!-- Thong bao loi -->
        <?php require_once __DIR__ ."/../../../partials/notification.php"; ?>
        </div>
</div>

<div>
    <div class="col-md-12">
          <div class="table-responsive">



          </div>
    </div>
</div>
<!-- /.row -->
