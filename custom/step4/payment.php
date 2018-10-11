<h1 class="cover-heading">Limited Offer Sale !!</h1>
<p class="lead">Purchase a random superhero to run your errands. Try your luck.</p>
<p class="lead">
  <button id="submit-btn" class="btn btn-lg btn-default">Pay with Payabbhi</button>
  <script src="https://checkout.payabbhi.com/v1/checkout.js"></script>
  <form name='payabbhiform' action="status.php" method="POST">
      <input type="hidden" name="merchant_order_id" value=<?php echo $merchantOrderID?> </input>
      <input type="hidden" name="order_id" id="order_id">
      <input type="hidden" name="payment_id" id="payment_id">
      <input type="hidden" name="payment_signature"  id="payment_signature" >
  </form>
  <script>
  var options = <?php echo $json?>;
  options.handler = function (response){
      document.getElementById('order_id').value = response.order_id;
      document.getElementById('payment_id').value = response.payment_id;
      document.getElementById('payment_signature').value = response.payment_signature;
      document.payabbhiform.submit();
  };

  var payabbhi = new Payabbhi(options);

  document.getElementById('submit-btn').onclick = function(e){
      payabbhi.open();
      e.preventDefault();
  }
  </script>
</p>
