<?php
require 'config/config.php';
$client_id= CLIENT_ID;
$bidValue = $_SESSION['your_bid'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="/icons/Main Logo.svg">
</head>

<body>
  <!-- Replace "test" with your own sandbox Business account app client ID -->
  <script src="https://www.paypal.com/sdk/js?client-id=<?=$client_id?>&currency=PLN"></script>
  <!-- Set up a container element for the button -->
  <div id="paypal-button-container"></div>
  <script>
    paypal.Buttons({

        style: {
          layout: 'vertical',
          color: 'blue',
          shape: 'rect',
          label: 'paypal'
        },

        // Order is created on the server and the order id is returned
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $bidValue; ?>' // Change this to the desired payment amount
              }
            }]
          });
        },
        // Finalize the transaction on the server after payer approval
        onApprove: (data, action) => {

          alert('CONGRATULATION !!');

          const form = document.createElement('form');
          form.method = 'post';
          form.action = 'delete.php';

          const input = document.createElement('input');
          input.type = 'hidden';
          input.name = 'item_name';
          input.value = '<?php echo $_SESSION['item_name']; ?>';

          form.appendChild(input);
          document.body.appendChild(form);
          form.submit();

          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
          });
        }
      })
      .render('#paypal-button-container');
  </script>

</body>

</html>