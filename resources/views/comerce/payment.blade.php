<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pay Page</title>
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
  <!--
  <?php $getData = $_GET['data']; print_r($getData); echo '<hr>'; $showIds = explode('/', $getData); print_r($showIds);
  
  $price = $_GET['price']; echo $price;

  ?>-->
    <div class="navbar navbar-static-top"></div><hr>
    
    <div class="container">

    <h2><span class="payment">The Page For Payment</span></h2><hr>

      <h4><span class="mt-4 payment"> The Amount For Payment: <span class="payment-amount">{{ number_format($price, 2,",",".") }}</span> </span></h4>

      <a href=" {{ route('cart.index') }} " class="btn btn-primary btn-lg mt-2">Cancel</a>

      <h2 class="my-4 text-center">Enter Your Credentials:</h2>

        <form action=" {{ route('payment.store') }} " method="POST" id="payment-form">
            {{ csrf_field() }}
            
            <div class="form-row">

                <input type="text" name="first_name" class="form-control spacing-top StripeElement StripeElement--empty" placeholder="First name">

                <input type="text" name="last_name" class="form-control spacing-top StripeElement StripeElement--empty" placeholder="Last name">

                <input type="email" name="email" class="form-control spacing-top StripeElement StripeElement--empty" placeholder="Email">


                <div id="card-element" class="form-control spacing-top">
                <!-- A Stripe Element will be inserted here. -->
                </div>

                <input type="hidden" name="price" value="<?php echo $price; ?>">

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert" class="spacing-top"></div>
            </div>

            <button>Submit Payment</button>
        </form>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    
<script>
    // Create a Stripe client.
var stripe = Stripe('pk_test_teF7SqUXcf3QeTFotJaIooeO');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

//Style button with Bootstrap
document.querySelector('#payment-form button').classList = 'btn btn-primary btn-block mt-4';

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
  
    // Submit the form
    form.submit();
  }

 </script>

</body>
</html>


