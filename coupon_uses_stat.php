<?php

require_once __DIR__ . '/configuration.php';

// Validate required database configurations
foreach (['db_host', 'db_username', 'db_password', 'db_name'] as $var) {
    if (empty($$var)) {
        throw new Exception("Missing database configuration: {$var}");
    }
}

// Establish a secure database connection using PDO
$pdo = new PDO(
    "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4",
    $db_username,
    $db_password,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]
);

$code = isset($_REQUEST['code']) ? trim($_REQUEST['code']) : '';
$results = [];

if ($code !== '') {
    $stmt = $pdo->prepare("SELECT * FROM tblpromotions WHERE code = :code");
    $stmt->execute(['code' => $code]);
    $results = $stmt->fetchAll();
    
    
    $stmt2 = $pdo->prepare("
        SELECT 
            o.ordernum,
            o.date,
            o.promocode,
            o.amount,
            o.invoiceid,
    
            u.first_name,
            u.last_name,
            u.email,
    
            a.fees,
            a.amountin
    
        FROM tblorders o
    
        INNER JOIN tblusers u ON o.requestor_id = u.id
        INNER JOIN tblaccounts a ON o.invoiceid = a.invoiceid
    
        WHERE o.promocode = :promocode
    ");
    
    $stmt2->execute(['promocode' => $code]);
    $orders = $stmt2->fetchAll();
}

?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Promotion Statistics | ZenexCloud</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/75a8c37996.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
</head>
<body>

<div class="container py-4">
    <h2 class="mb-4">Promotion Statistics</h2>

    <!-- Filter Form -->
    <form method="get" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="code" class="form-control" placeholder="Enter Promo Code" value="<?= htmlspecialchars($code) ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>


    <?php if (!empty($results)): ?>
        <?php $promo = $results[0]; ?>
        <div class="mb-3">
            <strong>Promo Code:</strong> <?= htmlspecialchars($promo['code']) ?><br>
            <strong>Uses:</strong> <?= htmlspecialchars($promo['uses']) ?><br>
            <strong>Client Discount:</strong> <?= htmlspecialchars($promo['value']) ?><br>
            <strong>Discount Type:</strong> <?= htmlspecialchars($promo['type']) ?><br>
            <strong>Coupon Start:</strong> <?= htmlspecialchars($promo['startdate']) ?><br>
        </div>
        
        
        <div class="row">
             <div class="col-md-3">
            <!--    <div class="input-group mb-3 ">-->
            <!--      <input type="date" class="form-control" placeholder="Start Date" name="start_date">-->
            <!--       <input type="date" class="form-control" placeholder="End Date" name="end_date">-->
                  
            <!--    </div>-->
            
            
                <div class="input-group flatpickr due_date">
                    <div class="input-group-prepend cursor-pointer" data-toggle>
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-calendar-alt"></i>
                        </button>
                    </div>
                    <input type="date" name="due_date" id="due_date" data-input
                            class="form-control bg-white"
                            value="{{ $assignment->due_date ?? old('due_date') }}">
            
                    <div class="input-group-append cursor-pointer" data-clear>
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
            
        </div>



        <table class="table table-striped table-bordered border-primary mt-4 table-hover">
            <thead class="text-center">
                <tr class="table-dark">
                    <th scope="col">Invoice</th>
                    <th scope="col">Order Number</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Commission</th>
                </tr>
            </thead>
            <tbody class="text-center">
                
                
               <?php $total_price = 0; $total_commision = 0 ; foreach($orders as $order): ?>
                    <?php 
                        //tblgatewaylog
                        //tblaccounts
                        //tblinvoiceitems
                        
                        
                        
                        
                        $stmt3 = $pdo->prepare("SELECT * FROM tblinvoiceitems WHERE invoiceid = :invoiceid AND type = :type");
                        $stmt3->execute([
                            'invoiceid' => $order['invoiceid'],
                            'type'      => 'DomainRegister'
                        ]);
                        $invoice_items = $stmt3->fetch();
                        
                        $domain_price = number_format($invoice_items['amount'], 2);
                        

                        $amount = number_format($order['amount'], 2);
                        $discount = $promo['value'];
                        $final_price = $order['amountin'] - $order['fees'] - $domain_price;
                        $commision = number_format($final_price * 7 / 100, 2);
                        
                        $total_price += $final_price - $domain_price;
                        $total_commision += $commision . ' / ৳' . $commision*120;
                    ?>

                    
                    <tr class="text-center">
                        <td><?= $order['invoiceid'] ?> </td>
                        <td><?= htmlspecialchars($order['ordernum']) ?></td>
                        <td><?= date("d-m-Y", strtotime($order['date'])) ?></td>
                        <td><?= htmlspecialchars($order['first_name']) . ' ' . htmlspecialchars($order['last_name']) ?></td>
                        <td><?= htmlspecialchars($order['email']) ?></td>
                        <td><?= htmlspecialchars($order['product']) ?></td>
                        <td> $<?= $final_price ?> </td>
                        <td> $<?=  $commision . ' / ৳' . $commision*120 ?> </td>
                    </tr>
                    
                    
                <?php endforeach; ?>
                
                
                <tr>
                  <th colspan="6"> Total </th>
                  <td> $<?= $total_price ?> </td>
                  <td> <?= $total_commision . ' / ৳' . $total_commision*120 ?> </td>
                </tr>
            </tbody>
        </table>
        
    <?php elseif ($code): ?>
        <div class="alert alert-warning">No promotion found for code: <strong><?= htmlspecialchars($code) ?></strong></div>
    <?php endif; ?>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>




<script>
     // initialize for all date picker
    $('.flatpickr').flatpickr({
        altInput: true,
        dateFormat: "Y-m-d",
        enableTime: true,
        altFormat: "F j, Y h:i K",
        wrap: true
    });
</script>



</body>
</html>
