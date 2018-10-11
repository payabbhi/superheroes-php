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
                  $amount = rand(100,500);
                  //The merchant_order_id is typically the identifier of the Customer Order, Booking etc in your system
                  $merchantOrderID = uniqid();

                  $client = new \Payabbhi\Client($accessId, $secretKey);

                  try {
                  //Create the Payabbhi Order. Refer to Create Order API at https://payabbhi.com/docs/api/#create-an-order
                  $order = $client->order->create(array('amount'=>$amount,'currency'=>'INR','merchant_order_id'=>$merchantOrderID,"notes" => array("merchant_order_id" => (string)$merchantOrderID)));
                  //TIP: At this point, the unique order_id should typically be persisted in your database against the merchant_order_id

                  //Implement the Checkout workflow for Web as outlined at https://payabbhi.com/docs/checkout
                  $data = array(
                      'access_id'     => $accessId,
                      'order_id'      => $order->id,
                      'amount'        => $amount,
                      'name'          => "SuperHeroes Store",
                      'description'   => 'Order #' . $merchantOrderID,
                      'image'         =>  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrqxgvtb3CZ9MJOKpXWxrScQEK4lwzbClXg_J7iayii4PTg-Y5",
                      'prefill'     => array(
                        'name'      => "Bruce Wayne",
                        'email'     => "bruce@wayneinc.com",
                        'contact'   => "9999999999"
                      ),
                      'notes'       => array(
                        'merchant_order_id' => (string)$merchantOrderID
                      ),
                      'theme' => array(
                        'color' => '#F6A821'
                      )
                  );
                 $json = json_encode($data);
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
