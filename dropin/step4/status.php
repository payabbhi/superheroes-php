<html lang="en">
  <head>
    <?php require_once('./header.php'); ?>
  </head>

  <body>
    <?php
      require_once('./config.php');
      require_once('./auction.php');
    ?>


    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <?php require_once('./navbar.php'); ?>
          <div class="inner cover">
            <?php
              if (empty($paymentId) === false) {
                try {
                  $payment = $api->payment->retrieve($paymentId);
                  $api->utility->verifyPaymentSignature(array('payment_id'=>$paymentId,'order_id'=>$orderID,'payment_signature'=>$_POST['payment_signature']));
                  //TIP: At this point we should typically look up the merchant_order_id corresponding to the order_id in the Payment response
                  //The status of the order, booking etc identified by the merchant_order_id,
                  //should be now updated in your database to indicate that it is paid.
                  //You may also persist the payment_id in the database against the merchant_order_id.
                } catch (Exception $e) {
                  $error = $e->getMessage();
                }
                if (!isset($error))
                {
                  require_once('./success.php');
                } else {
                  require_once('./failure.php');
                }
              } else {
                require_once('./failure.php');
              }
             ?>
           </div> <!--   end inner cover -->

        </div>
      </div>
    </div>

    <?php require_once('./footer.php') ?>
</body></html>
