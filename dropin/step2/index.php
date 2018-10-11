<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Superheroes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <?php
      require_once(__DIR__.'/vendor/autoload.php');
      $accessId = '<ACCESS-ID>';
      $secretKey = '<SECRET-KEY>';
      $amount = rand(100,500);
      $merchantOrderID = uniqid();

      $api = new \Payabbhi\Client($accessId, $secretKey);

      $order = $api->order->create(array('amount'=>$amount,'currency'=>'INR','merchant_order_id'=>$merchantOrderID,"notes" => array("merchant_testid" => $merchantOrderID)));
      //TIP: At this point, the unique order_id should typically be persisted in your database against the merchant_order_id
    ?>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Superheroes</h3>
              <nav>
                <ul class="nav masthead-nav">


                  <li><a href="http://github.com/payabbhi/superheroes" style="font-size: xx-large;"><i class="fa fa-github" aria-hidden="true"></i></a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="inner cover">
            <h1 class="cover-heading">Limited Offer Sale !!</h1>
            <p class="lead">Purchase a random superhero to run your errands. Try your luck.</p>
            <p class="lead">
              <form action="status.php" method="POST">
              <script
                  src="https://checkout.payabbhi.com/v1/checkout.js"
                  data-access-id=<?php echo $accessId?>
                  data-order-id=<?php echo $order->id?>
                  data-amount=<?php echo $amount?>
                  data-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrqxgvtb3CZ9MJOKpXWxrScQEK4lwzbClXg_J7iayii4PTg-Y5"
                  data-name="SuperHeroes Store"
                  data-description='Order #' . <?php echo $merchantOrderID?>
                  data-prefill.name="Bruce Wayne"
                  data-prefill.email="bruce@wayneinc.com"
                  data-prefill.contact="9999999999"
                  data-theme.color="#F6A821"
                  data-notes.merchant_order_id=<?php echo $merchant_order_id?>
              >
              </script>
              <input type="hidden" name="merchant_order_id" value=<?php echo $merchantOrderID?> </input>
              </form>
            </p>
          </div>

          <div class="mastfoot"> <div class="inner"> </div> </div>
        </div>

      </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body></html>
