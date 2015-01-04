<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Registration Form with PHP Captcha Demo</title>
<meta name="title" content="Registration Form with PHP Captcha Demo"/>
<meta name="description" content=""/>
<meta name="keywords" content=""/>

<link href="{{ URL::to('../app/views/front/includes/form/css/style_demo.css') }}" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script language="javascript">
$(document).ready(function(){
 var register_url = "<?php echo URL::to('register');?>";
 var session_change = "{{ URL::to('captcha') }}";
 var checkurl = "{{URL::to('shop_check')}}";
 //var setimage = "{{ URL::to('setimage') }}";
$(".refresh").click(function () { 
	//$(".imgcaptcha").attr("src","{{URL::to('./../app/views/front/includes/form/demo_captcha.php')}}?_="+((new Date()).getTime()));
    $.ajax({
        type: "GET",
        url: session_change,
        data: (new Date()).getTime(),		    
        cache: false,
        success: function()
        {	
        	$(".imgcaptcha").attr("src","{{URL::to('setimage')}}?_="+((new Date()).getTime()));
        	
        }
    });
	//console.log(testing);
});


 $('#register').submit(function(event) {
  event.preventDefault();
   if($('#pass').val() != $('#pass_confirmation').val() ) {
	$('<p>').html('Please  re-enter confirm password').addClass('alert alert-danger alert-dismissible').css('width','400px').prependTo('#register');
 	$('#pass_confirmation').val('');
 	$('#pass_confirmation').focus();
 	$('html, body').animate({scrollTop:0}, 'slow');
 	return false;
 }
 	//$('#ajax_loader').show();
 	$.ajax({
        type: "POST",
        url: register_url,
        data: $("#register1").serialize(),		    
        cache: false,
        success: function(data)
        {	
        	//$('#ajax_loader').hide();
        	if(data == "1"){
        		$('#message').html("Successfully Submitted,Please check your email").append('<button type="button" class="close" data-dismiss="alert">&times;</button>').removeClass('alert alert-danger').addClass('alert alert-success').css('width','400px');
        	}else{
        		$('#message').html(data).append('<button type="button" class="close" data-dismiss="alert">&times;</button>').removeClass('alert alert-success').addClass('alert alert-danger').css('width','400px').show();
        	}
        	$('html, body').animate({scrollTop:0}, 'slow');
        }
    });
	
    });


     function clear_form()
     {
        $("#shop_name").val('');
        $("#email").val('');
        $("#phone").val('');
        $("#username").val('');
        $("#pass").val('');
        $("#pass_confirmation").val('');
		$("#captcha").val('');
     }

     $("#shop_name").keyup(function (e) { 
	     var shopname = $(this).val();
	     $.post(checkurl, {'storename':shopname}, function(data) { 
	      $("#availibility").html(data); 
	     });
	 });

});

</script>

</head>
<body>
<div id="bodyfull">
<div id="bodyfull2">
	<div id="center">

		<div class="inner_right_demo"> 
		<form name="register" action="#null" method="post" id="register">
			<div id="message"></div>
			<div class="form_box">
				<div>
					<label>Shop Name</label>
					<input type="text" id="shop_name" placeholder="Enter Shop Name" id="shop_name" name="shop_name" required="required">
					<div id="availibility" style="display:inline-block; color:red; padding-bottom:10px;"></div>
				</div>
				
				<div>
					<label>Email</label>
					<input type="email" placeholder="Enter Your Email Address" id="email" name="email" required="required">
				</div>
			
				<div>
					<label>Password</label>
					<input type="password" placeholder="Password must contain 1 uppercase, lowercase and number" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="pass" name="pass" required="required">
				</div>
				
				<div>
					<label>Confirm Password</label>
					<input type="password"  placeholder="Enter Your Password Again" id="pass_confirmation" name="pass_confirmation" required="required">
				</div>
				
				<div class="cap">
					
					<label>Captcha</label>
					<input type="text" placeholder="Enter Code" id="captcha" name="captcha" class="inputcaptcha" required="required">
					<img src="{{URL::to('setimage')}}" class="imgcaptcha" alt="captcha"  />
					<img src="{{ URL::to('../app/views/front/includes/form/images/refresh.png') }}" alt="reload" class="refresh" />
					
				</div>
				
				<div class="term">
                                    <p class="term">By clicking Register, you confirm that you accept our <a href="">Terms of Use</a> and <a href="">Privacy Policy</a>.</p>
				<input id="etsy_finds" type="checkbox" style="vertical-align:top;" tabindex="8" value="on" name="etsy_finds">
				<p class="last"> I want to receive youbuy24 Finds, an email newsletter of fresh trends and editors' picks. </p>
				</div>
				
				<div>
					<label>&nbsp;</label>
					<div class="otherinputs" ><input type="submit" value="Register" name="B1" class="submit"> &nbsp; &nbsp;<input type="reset" value="Reset" name="B2" class="submit"></div>
				</div>
				
			</div>
			</form>
		</div>

</div>	
</div>
</div>
</body>

</html>