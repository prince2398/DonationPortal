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
  <!-- For Payment Gateway -->
  <!-- this meta viewport is required for BOLT //-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
  <!-- BOLT Sandbox/test //-->
  <script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-
  color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>
  <!-- BOLT Production/Live //-->
  <!--// script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-
  color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script //-->

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
        <input id="custom-amount" name="custom-amount" type="number" min = "100" required>
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
          <label>First Name *</label>
          <input type="text" id="fname" required>
        </div>
        <div class="input-group-2">
          <label>Last Name</label>
          <input type="text" id="lname" value="">
        </div>
        <div class="input-group-1">
          <label>Email Address *</label>
          <input type="email" id="email" required>
        </div>
        <div class="input-group-1">
          <label>Mobile Number*</label>
          <input type="number" id="mobile" required>
        </div>
        <hr>
        <!-- Optional Parameter -->
        <div class="input-group-1">
          <label>Street Address</label>
          <input type="text" id="address" value="">
        </div>
        <div class="input-group-3">
          <label>City</label>
          <input type="text" id="city" value="">
        </div>
        <div class="input-group-3">
          <label>State</label>
          <input type="text" id="state" value="">
        </div>
        <div class="input-group-3">
          <label>Zip Code</label>
          <input type="number" id="zip" value="">
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
    <button class="next" type="button" onclick="launchBOLT();">Confirm</button>
  </section>

  <section id="confirm">
    <h2>Thank You!</h2>
    <p>Your <span class="amount">₹8888888</span> donation will help us reach <strong>8888888</strong>!</p>
  </section>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

  <script src="./assets/js/script.js"></script>

  <script type="text/javascript"><!--
    function launchBOLT(){
      data = {
        key : key,
        txnid: txnid, 
        hash: hash,
        amount: amount,
        firstname: fname,
        email: email,
        phone: mobile,
        productinfo: pinfo,
        // udf1: lname,
        // udf2: address,
        // udf3: city,
        // udf4: state,
        // udf5: zip,
        surl: surl,
        furl: furl,
        mode: mode
      };
      console.log(data);
      bolt.launch(data,
      { 
        responseHandler: function(BOLT){
          console.log( BOLT.response.txnStatus );		
          if(BOLT.response.txnStatus != 'CANCEL')
          {
            //Salt is passd here for demo purpose only. For practical use keep salt at server side only.
            // var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +
            //   '<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
            //   '<input type=\CANCELden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +
            //   '<input type=\CANCELden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
            //   '<input type=\CANCELden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
            //   '<input type=\CANCELden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
            //   '<input type=\CANCELden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
            //   '<input type=\CANCELden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
            //   '<input type=\CANCELden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
            //   '<input type=\CANCELden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
            //   '<input type=\CANCELden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
            //   '<input type=\CANCELden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
            //   '</form>';
            console.log(BOLT.response);s
            // var form = jQuCANCELfr);
            // jQuery('body')CANCELend(form);								
            // form.submit();CANCEL
          }
        },
        catchException: function(BOLT){
          alert( BOLT.message );
        }
      });
    }
    //--
  </script>
</body>

</html>