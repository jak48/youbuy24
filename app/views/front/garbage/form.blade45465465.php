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

<link href="form/css/style_demo.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script language="javascript">
$(document).ready(function(){
 var register_url = "<?php echo URL::to('register');?>";
 
$(".refresh").click(function () { 
    $(".imgcaptcha").attr("src","<?php echo app_path().'/view/front/captcha_view.blade.php'; ?>");
    
});


 $('#register').submit(function(event) {
  event.preventDefault();
 /* alert($('#pass').val());
  alert($('#pass_confirmation').val());
*/  if($('#pass').val() != $('#pass_confirmation').val() ) {
	alert("Please  re-enter confirm password");
 	$('#pass_confirmation').val('');
 	$('#pass_confirmation').focus();
 	return false;
 }
 // if($('#pass').val() != $('#pass_confirmation').val()){
 // 	alert("Please re-enter confirm password");
 // 	$('#pass_confirmation').val('');
 // 	$('#pass_confirmation').focus();
 // 	return false;
 // }
	
 	//$('#ajax_loader').show();
 	$.ajax({
        type: "POST",
        url: register_url,
        data: $("#register").serialize(),		    
        cache: false,
        success: function(data)
        {	
        	alert(data);	
        	//$('#ajax_loader').hide();
        	/*if(data == '1'){
        		$('#message').html("Successfully Updated").removeClass('alert alert-danger').addClass('alert alert-success');
        	}else{
        		$('#message').html(data).removeClass('alert alert-success').addClass('alert alert-danger');
        	}
        	$('html, body').animate({scrollTop:0}, 'slow');*/
        }
    });
	
    });


     function clear_form()
     {
        $("#shop_names").val('');
        $("#email").val('');
        $("#phone").val('');
        $("#username").val('');
        $("#password").val('');
        $("#pass_confirmation").val('');
		$("#captcha").val('');
     }


});

</script>

</head>
<body>
<div id="bodyfull">
<div id="bodyfull2">
	<div id="center">

		<div class="inner_right_demo"> 
		<form name="register" action="#null" method="post" id="register">
			<div class="form_box">
				<div>
					<label>Shop Name</label>
					<input type="text" placeholder="Enter Shop Name" id="shop_name" name="shop_name" required="required">
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
					<?php echo base_path();?>
					<label>Captcha</label>
					<input type="text" placeholder="Enter Code" id="captcha" name="captcha" class="inputcaptcha" required="required">
					<img src="./captcha_view.blade.php" class="imgcaptcha" alt="captcha"  />
					
					<img src="form/images/refresh.png" alt="reload" class="refresh" />
					
				</div>
				
				<div class="term">
				<p class="term">By clicking Register, you confirm that you accept our Terms of Use and Privacy Policy.</p>
				<input id="etsy_finds" type="checkbox" style="vertical-align:top;" tabindex="8" value="on" name="etsy_finds">
				<p class="last"> I want to receive Etsy Finds, an email newsletter of fresh trends and editors' picks. </p>
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