<div class="inner cover">
  <h1 class="cover-heading">You've got <?=$hero?> </h1>
  <h3>for ₹<?=$payment->amount/100?></h3>
  <p class="lead"><img src="<?=$avatar?>"></p>
  <p class="lead">
    Order ID is <?=$merchantOrderID?>
  </p>
  <p class="lead">
    Payment ID is <?=$paymentId?>
  </p>
  <p class="lead">
    <a href="/" class="btn btn-lg btn-default">Continue shopping</a>
  </p>
</div>
