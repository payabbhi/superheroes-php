<h1 class="cover-heading">Limited Offer Sale !!</h1>
<p class="lead">Purchase a random superhero to run your errands. Try your luck.</p>
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
  </script>
</p>
