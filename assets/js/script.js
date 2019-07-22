var amount;
var reach;

var x = $(window).width() - 400;

$('.donate form').on("click", function () {
  amount = $('input[name=amount]:checked', '#donAmount').val();
  reach = amount * 22;
  $('#confirm .amount').text("₹" + amount);
  $('#check span').text("₹" + amount);
  $('#confirm strong').text(reach + " voters");
});

$(".donate button").on("click", function () {
  $(".donate").toggleClass("active");
  if ($(".donate").is(".active")) {
    $("form").slideDown(450, "easeOutQuart");
  } else {
    $("form").slideUp(300, "easeInOutQuad");
  }
});

$('.donate label').on("click", function () {
  setTimeout(function () {
    if (amount == "other") {
      $('body').addClass('custom');
      $(".donate").hide("slide", { easing: "easeInQuart", direction: "left" }, 700, function () {
        $("#custom").show("slide", { easing: "easeOutQuart", direction: "right" }, 700);
      });
    } else {
      $('body').removeClass('custom');
      $(".donate").hide("slide", { easing: "easeInQuart", direction: "left" }, 700, function () {
        $("#details").show("slide", { easing: "easeOutQuart", direction: "right" }, 700);
      });
    }
  }, 150);
});

$('#custom .next').on("click", function () {
  amount = $('input[name=custom-amount]', '#customDonation').val();
  // console.log(amount);
  if(amount == "" || amount < 100){
    alert("Amount must be more than ₹100.");
  }else{
    reach = amount * 22;
    $('#confirm .amount').text("₹" + amount);
    $('#check span').text("₹" + amount);
    $('#confirm strong').text(reach + " voters");
    $("#custom").hide("slide", { easing: "easeInQuart", direction: "left" }, 700, function () {
      $("#details").show("slide", { easing: "easeOutQuart", direction: "right" }, 700);
    });
  }
});

$('#custom .back').on("click", function () {
  $("#custom").hide("slide", { easing: "easeInQuart", direction: "right" }, 700, function () {
    $(".donate").show("slide", { easing: "easeOutQuart", direction: "left" }, 700);
  });
});

$('#details .next').on("click", function () {
  fname= $('#fname').val();
  lname= $('#lname').val();
  email= $('#email').val();
  mobile= $('#mobile').val();
  address= $('#address').val();
  city= $('#city').val();
  state= $('#state').val();
  zip= $('#zip').val()
  if(fname == "" || email == "" || mobile == ""){
    alert("Fields marked with * (astrick) are required");
  }else if(!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){
      alert("Please enter a valid Email Id");
  }else{
    $.ajax({
      url: 'hash.php',
      type: 'post',
      data: JSON.stringify({
        amount: amount,
        fname: fname,
        lname: lname,
        email: email,
        mobile: mobile,
        address: address,
        city: city,
        state: state,
        zip: zip
      }),
      contentType: "application/json",
      dataType: 'json',
      success: function(json) {
        if (json['error']) {
          $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
        }else if (json['success']) {
          console.log(json);
          // $('#hash').val(json['success']);
        }
      }
    });
    console.log(amount);
    $("#details").hide("slide", { easing: "easeInQuart", direction: "left" }, 700, function () {
      $("#check").show("slide", { easing: "easeOutQuart", direction: "right" }, 700);
    });
  }
});

$('#details .back').on("click", function () {

  if ($('body.custom').length > 0) {
    $("#details").hide("slide", { easing: "easeInQuart", direction: "right" }, 700, function () {
      $("#custom").show("slide", { easing: "easeOutQuart", direction: "left" }, 700);
    });
  } else {
    $("#details").hide("slide", { easing: "easeInQuart", direction: "right" }, 700, function () {
      $(".donate").show("slide", { easing: "easeOutQuart", direction: "left" }, 700);
    });
  }

});

$('#check .back').on("click", function () {
  $("#check").hide("slide", { easing: "easeInQuart", direction: "right" }, 700, function () {
    $("#card").show("slide", { easing: "easeOutQuart", direction: "left" }, 700);
  });
});

$("#check .next").on('click', function () {
  $("#check").hide("slide", { easing: "easeInQuart", direction: "left" }, 700, function () {
    $(".processing").fadeIn(1500, function () {
      $(".progress").animate({ width: "14em" }, 3500, "easeInOutCirc", function () {
        $(".mask").hide("slide", { easing: "easeInQuart", direction: "right" }, 400);
      });
    });
  });

  setTimeout(function () {
    $('.processing .message, .outer').fadeOut();
    $("#confirm").addClass('animated fadeInUp');
  }, 6250);
});