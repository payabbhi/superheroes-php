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

      $heroes = array(
        'Batman'         => 'https://upload.wikimedia.org/wikipedia/en/thumb/2/22/Batman-DC-Comics.jpg/250px-Batman-DC-Comics.jpg',
        'Superman'       => 'https://upload.wikimedia.org/wikipedia/en/thumb/e/eb/SupermanRoss.png/250px-SupermanRoss.png',
        'Aquaman'        => 'https://upload.wikimedia.org/wikipedia/en/thumb/0/0a/Aquaman_issue_1%2C_the_new_52.jpg/220px-Aquaman_issue_1%2C_the_new_52.jpg',
        'Spiderman'      => 'https://upload.wikimedia.org/wikipedia/en/thumb/0/0c/Spiderman50.jpg/250px-Spiderman50.jpg',
        'Wonder Woman'   => 'https://upload.wikimedia.org/wikipedia/en/0/03/Wonder_Woman_%28DC_Rebirth%29.jpg',
        'Iron Man'       => 'https://i.annihil.us/u/prod/marvel//universe3zx/images/f/f5/IronMan_Head.jpg',
        'Hulk'            => 'https://upload.wikimedia.org/wikipedia/en/5/59/Hulk_%28comics_character%29.png',
        'Captain America' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/CaptainAmerica109.jpg/250px-CaptainAmerica109.jpg',
        'Falcon'          => 'https://upload.wikimedia.org/wikipedia/en/thumb/2/2e/TheFalcon.jpg/250px-TheFalcon.jpg',
        'Wasp'            => 'https://upload.wikimedia.org/wikipedia/en/thumb/c/c0/AVEN071.jpg/250px-AVEN071.jpg',
        'Quicksilver'     => 'https://upload.wikimedia.org/wikipedia/en/thumb/6/6e/Quicksilver%21.jpg/250px-Quicksilver%21.jpg',
        'Doctor Strange'  => 'https://upload.wikimedia.org/wikipedia/en/thumb/4/4f/Doctor_Strange_Vol_4_2_Ross_Variant_Textless.jpg/250px-Doctor_Strange_Vol_4_2_Ross_Variant_Textless.jpg',
        'Hawkeye'         => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/99/Hawkeye_%28Clinton_Barton%29.png/220px-Hawkeye_%28Clinton_Barton%29.png',
        'Wolverine'       => 'https://upload.wikimedia.org/wikipedia/en/c/c8/Marvelwolverine.jpg',
        'Black Widow'     => 'https://i.annihil.us/u/prod/marvel//universe3zx/images/f/f9/BlackWidow.jpg'
      );

      $hero = array_rand($heroes);
      $avatar = $heroes[$hero];

      $paymentId = $_POST['payment_id'];
      $orderID = $_POST['order_id'];
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

          <?php
            if (empty($paymentId) === false) {
              $accessId = '<ACCESS-ID>';
              $secretKey = '<SECRET-KEY>';
              $client = new \Payabbhi\Client($accessId, $secretKey);
              try {
                //Here we verify the payment signature
                $client->utility->verifyPaymentSignature(array('payment_id'=>$paymentId,'order_id'=>$orderID,'payment_signature'=>$_POST['payment_signature']));

                //TIP: At this point we should typically look up the merchant_order_id corresponding to the order_id in the Payment response
                //The status of the order, booking etc identified by the merchant_order_id,
                //should be now updated in your database to indicate that it is paid.
                //You may also persist the payment_id in the database against the merchant_order_id.
                
                $payment = $client->payment->retrieve($paymentId);
              } catch (Exception $e) {
                $error = $e->getMessage();
              }

              if (!isset($error)){
          ?>
                <div class="inner cover">
                  <h1 class="cover-heading">You've got <?=$hero?> </h1>
                  <h3>for ₹<?=$payment->amount/100?></h3>
                  <p class="lead"><img src="<?=$avatar?>"></p>
                  <p class="lead">
                    Order ID is <?=$_POST['merchant_order_id']?>
                  </p>
                  <p class="lead">
                    Payment ID is <?=$paymentId?>
                  </p>
                  <p class="lead">
                    <a href="/" class="btn btn-lg btn-default">Continue shopping</a>
                  </p>
                </div>
                <?php
                } else {
                  ?>
                  <div class="inner cover">
                    <h1 class="cover-heading">Hard Luck !! Your attempt to buy a superhero was in vain </h1>
                    <p class="lead">
                      Oops!! Could not complete the order for Order ID <?=$_POST['merchant_order_id']?>
                    </p>
                    <p class="lead">
                      <a href="/" class="btn btn-lg btn-default">Try Again</a>
                    </p>
                  </div>
                <?php }


            } else {
              ?>
              <!-- -->
                <div class="inner cover">
                  <h1 class="cover-heading">Hard Luck !! Your attempt to buy a superhero was in vain </h1>
                  <p class="lead">
                    Oops!! Could not complete the order for Order ID <?=$_POST['merchant_order_id']?>
                  </p>
                  <p class="lead">
                    <a href="/" class="btn btn-lg btn-default">Try Again</a>
                  </p>
                </div>

              <?php
            }
           ?>


          <div class="mastfoot"> <div class="inner"> </div> </div>
        </div>

      </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body></html>
