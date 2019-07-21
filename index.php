<?php 
  require_once("./core/init.php");
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Donation Portal</title>

  <link rel='stylesheet' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
  
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <link href='https://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

  <div class="donate">
    <button>Donate</button>
    <form name="donAmount" id="donAmount">
      <input type="radio" value="200" name="amount" id="three">
      <label for="three">₹200</label>
      <input type="radio" value="500" name="amount" id="twentyfive">
      <label for="twentyfive">₹500</label>
      <input type="radio" value="1000" name="amount" id="hundred">
      <label for="hundred">₹1000</label>
      <input type="radio" value="other" name="amount" id="other">
      <label for="other">Other</label>
    </form>
  </div>

  <div id="custom">
    <h2>Donation Amount</h2>
    <form name="customDonation" id="customDonation">
      <div class="input-group-1">
        <label for="custom-amount">₹</label>
        <input id="custom-amount" name="custom-amount" type="number">
        <div class="warn"></div>
      </div>
    </form>
    <div class="clearfix">
      <button class="back" type="button">Back
        <span></span>
        <span></span>
        <span></span>
      </button>
      <button class="next" type="button">Next</button>
    </div>
  </div>

  <section id="details">
    <div class="contact-info">
      <h2>Basic Information</h2>
      <form class="clearfix">
        <!-- Mandatory Parameters -->
        <div class="input-group-2">
          <label>First Name</label>
          <input type="text">
        </div>
        <div class="input-group-2">
          <label>Last Name</label>
          <input type="text">
        </div>
        <div class="input-group-1">
          <label>Email Address</label>
          <input type="email">
        </div>
        <div class="input-group-1">
          <label>Phone Number</label>
          <input type="number">
        </div>
        <hr>
        <!-- Optional Parameter -->
        <div class="input-group-1">
          <label>Street Address</label>
          <input type="text">
        </div>
        <div class="input-group-3">
          <label>City</label>
          <input type="text">
        </div>
        <div class="input-group-3">
          <label>State</label>
          <input type="text">
        </div>
        <div class="input-group-3">
          <label>Zip Code</label>
          <input type="number">
        </div>
      </form>
      <div class="clearfix">
        <button class="back" type="button">Back
          <span></span>
          <span></span>
          <span></span>
        </button>
        <button class="next" type="button">Donate</button>
      </div>
    </div>
  </section>

  <section class="processing">
    <div class="check">
      <span></span>
      <div class="mask">
      </div>
      <span></span>
    </div>

    <div class="outer">
      <div class="inner">
      </div>
      <div class="progress">
      </div>
    </div>
    <span class="message">Processing</span>
  </section>

  <section id="check">
    <h2>Confirm Payment</h2>
    <p>Please confirm your contribution of</p>
    <span>₹8888888</span>
    <button class="next" type="button">Confirm</button>
  </section>

  <section id="confirm">
    <h2>Thank You!</h2>
    <p>Your <span class="amount">₹8888888</span> donation will help us reach <strong>8888888</strong>!</p>
  </section>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

  <script src="./assets/js/script.js"></script>

</body>

</html>