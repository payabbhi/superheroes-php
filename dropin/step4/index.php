<html lang="en">
  <head>
    <?php require_once('./header.php'); ?>
  </head>

  <body>
    <?php require_once('./config.php'); ?>
      <div class="site-wrapper">
        <div class="site-wrapper-inner">
           <div class="cover-container">

             <?php require_once('./navbar.php'); ?>
             <div class="inner cover">
              <?php
                require_once('./config.php');
                try {
                  $amount = rand(100,500);
                  $merchantOrderID = uniqid();
                  $order = $api->order->create(array('amount'=>$amount,'currency'=>'INR','merchant_order_id'=>$merchantOrderID,"notes" => array("merchant_testid" => $merchantOrderID)));
                  //TIP: At this point, the unique order_id should typically be persisted in your database against the merchant_order_id
                 } catch (Exception $e) {
                  $error = $e->getMessage();
                }

                if (!isset($error))
                {
                  require_once('./payment.php');
                } else {
                  require_once('./failure.php');
                }
              ?>

            </div>

           </div>
        </div>
      </div>


     <?php require_once('./footer.php') ?>

</body></html>
