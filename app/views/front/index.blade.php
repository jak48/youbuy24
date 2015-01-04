<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/favicon.png">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <title>Youbuy24</title>

    <!-- Bootstrap -->

    {{ HTML::style('css/bootstrap.css')}}
    {{ HTML::style('css/bootstrap-theme.css')}}

    <!-- siimple style -->
    {{ HTML::style('css/style.css')}}
    {{ HTML::style('css/custom.css')}}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          {{ HTML::script('js/script.js')}}    

          <script src="http://code.jquery.com/jquery-latest.min.js"></script>
          <?php  $set_password = Session::get('set_password'); ?>
          <script>
            $(document).ready(function() {
                var forget_pass_mail_link = "{{ URL::to('forget_pass_mail') }}";
                var set_password = "{{ $set_password }}";
                var reset_password_url = "{{ URL::to('reset_password') }}";
                $("#loginLink").click(function( event ){
                    event.preventDefault();
                    $(".overlay").fadeToggle("fast");
                });

                $(".close").click(function(){
                    $(".overlay").fadeToggle("fast");
                });

                if(set_password != ""){
                    $(".overlay").fadeIn("fast");
                    $("#signup").removeClass('select');
                    $("#login").addClass('select');
                    $("#signupbox").slideUp('1');
                    $("#loginbox").slideDown('1');
                    $("#username").val('');
                    $("#password").val('');
                    $("#login_form").show();
                    $("#forgot_form").hide();
                }

                $("#sign_top_link").click(function(){
                    $(".overlay").fadeIn("fast");
                    $("#signup").removeClass('select');
                    $("#login").addClass('select');
                    $("#signupbox").slideUp('1');
                    $("#loginbox").slideDown('1');
                    $("#username").val('');
                    $("#password").val('');
                    $("#login_form").show();
                    $("#forgot_form").hide();
                });

                $("#create_top_store").click(function(){
                    $(".overlay").fadeIn("fast");
                    $("#login").removeClass('select');
                    $("#signup").addClass('select');
                    $("#loginbox").slideUp('1');
                    $("#signupbox").slideDown('1');
                    $("#shop_name").val('');
                    $("#email").val('');
                    $("#phone").val('');
                    $("#username").val('');
                    $("#pass").val('');
                    $("#pass_confirmation").val('');
                    $("#captcha").val('');
                });

                $("#forget_password").click(function(){
                    $("#login_form").hide();
                    $("#forgot_form").show();
                    $("#forget_email").val('');
                });

                $("#forget_email_cancel").click(function(e){
                    e.preventDefault();
                    $("#login_form").show();
                    $("#forgot_form").hide();
                });

                $("body").on('submit','#forgot_form',function(e){
                    e.preventDefault();
                    var forget_pass_email = $("#forget_email").val();
                    if(forget_pass_email != "") {
                        $.ajax({
                            url: forget_pass_mail_link,
                            type: 'POST',
                            data: {'email':forget_pass_email},
                            success:function(data){
                                if(data == 1) {
                                    $("#forgot_message").html("A mail sent, Check mail").addClass('alert alert-success');
                                    }else{
                                        $("#forgot_message").html(data).addClass('alert alert-danger');
                                    }
                                }
                        });
                    }else{
                        alert('Please , Enter Email');
                    }
                });

                $(document).keyup(function(e) {
                    if(e.keyCode == 27 && $(".overlay").css("display") != "none" ) { 
                        event.preventDefault();
                        $(".overlay").fadeToggle("fast");
                    }
                });

                $("body").on('submit','#reset_password_form',function(e){
                    e.preventDefault();
                    $.ajax({
                        url: reset_password_url,
                        type: 'POST',
                        data: { 'new_password': $('#new_password'), 'new_password_confirmation':$('#new_password_confirmation') },
                        success: function(data){
                            if(data == 1){
                                $('#reset_password_message').html("Successfully Reseted Password").addClass('alert alert-success');
                            }else{
                                $('#reset_password_message').html(data).addClass('alert alert-danger');
                            }
                        }
                    });
                });
            });
</script>

<style type='text/css'>
/*
*   RESET
*/

*{
    box-sizing: border-box;
    margin: 0;
    outline: none;
    padding: 0;
}

*:after,
*:before {
    box-sizing: border-box;
}

div.overlay {
  background: none repeat scroll 0 0 rgba(221, 221, 221, 0.8);
  bottom: 0;
  display: flex;
  justify-content: center;
  position: fixed;
  top: -65px;
  width: 100%;
}

div.overlay > div.login-wrapper {
  align-self: center;
  background-color:#fff;
  border-radius: 2px;
  margin-left: 135px;
  padding: 6px;
  margin-top:105px;
  width: 500px;
  z-index: 1;
}


div.overlay > div.login-wrapper > div.login-content {
  background-color: rgb(255,255,255);
  border-radius: 2px;
  position: relative;
}

div.overlay > div.login-wrapper > div.login-content > h3 {
  color: rgb(0,0,0);
  font-family: 'Varela Round', sans-serif;
  font-size: 1.8em;
  margin: 0 0 1.25em;
  padding: 0;
}
/*
*   FORM
*/
.login-wrapper form label {
    color: rgb(0,0,0);
    display: block;
    font-family: 'Varela Round', sans-serif;
    font-size: 1.25em;
    margin: .25em 0;    
}

.login-wrapper form input[type="text"],
.login-wrapper form input[type="email"],
.login-wrapperform input[type="number"],
.login-wrapper form input[type="search"],
.login-wrapper form input[type="password"],
.login-wrapper form textarea {
    background-color: rgb(255,255,255);
    border: 1px solid rgb( 186, 186, 186 );
    border-radius: 1px;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.08);
    display: block;
    font-size: 1em;
    margin: 6px 0 12px 0;
    padding: .8em .55em;    
    text-shadow: 0 1px 1px rgba(255, 255, 255, 1);
    transition: all 400ms ease;
    width: 90%;
}

.login-wrapper form button {
    background-color: #50c1e9;
    border: 1px solid rgba(0,0,0,.1);
    color: rgb(255,255,255);
    font-family: 'Varela Round', sans-serif;
    font-size: .85em;
    padding: .55em .9em;
    transition: all 400ms ease; 
}

.login-wrapper form button:hover {
    background-color: #1bc5b3;
    cursor: pointer;
}

/*New Tab*/


#tabbox {
  height: 40px;
  width: 100%;
}

a#login {
    float: left;
}

a#signup {
    float: left;
    padding-left: 10px;
    padding-right: 10px;
    width: auto;
}

.tab
{
    background: none repeat scroll 0 0 gray;
    border: 1px solid #4c4c45;
    display: block;
    height: 40px;
    line-height: 40px;
    text-align: center;
    width: 80px;
    float: right;
    font-weight: bold;
    -webkit-border-top-left-radius: 4px;
    -webkit-border-top-right-radius: 4px;
    -moz-border-radius: 4px 4px 0px 0px;
    color: #fff;
}

.select {
    background: #333;
    color: #fff;
}

#panel {
  float: left;
  width: 100%;
}

#loginbox
{
    padding:10px;
}
#signupbox
{
    padding:10px;
    display:none;
}

</style>

<script type="text/javascript">
    $(document).ready(function()
    {

        var login_url = "{{ URL::to('login') }}";
        var redirect_url = "{{ URL::to('/') }}";
        $(".tab").click(function()
        {
            var X=$(this).attr('id');
            if(X=='signup')
            {
                $("#login").removeClass('select');
                $("#signup").addClass('select');
                $("#loginbox").slideUp('1');
                $("#signupbox").slideDown('1');
                $("#shop_name").val('');
                $("#email").val('');
                $("#phone").val('');
                $("#pass").val('');
                $("#pass_confirmation").val('');
                $("#captcha").val('');
            }
            else
            {
                $("#signup").removeClass('select');
                $("#login").addClass('select');
                $("#signupbox").slideUp('1');
                $("#loginbox").slideDown('1');
                $("#username").val('');
                $("#password").val('');
                $("#login_form").show();
                $("#forgot_form").hide();
            }

        });

            $('#login_form').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url:login_url,
                    data : $('#login_form').serialize(),
                    type : 'post',
                    cache : false,
                    success: function(data){
                        var data = JSON.parse(data);
                        if(data.success == 1) {
                            window.location.href = redirect_url+'/'+data.store_name;
                        }else{
                            $('#login_message').html("Email or Password is incorrect").append('<button type="button" class="close" data-dismiss="alert">&times;</button>').removeClass('alert alert-success').addClass('alert alert-danger').css('width','400px');
                        }
                    }
                });
            });
        });
</script>

</head>

<body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" id="sign_top_link" class="overlayLink">Sign in</a></li>
                    <li><a href="#" id="create_top_store" class="overlayLink">Create Your Store</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
        <?php $success_message = Session::get('success');
              $error_message = Session::get('error');
              if(!empty($success_message)){ ?>
                    <div class="alert alert-success">{{ $success_message }}<button type="button" class="close" data-dismiss="alert">&times;</button></div>
         <?php  }
              if(!empty($error_message)){ ?>
                    <div class="alert alert-danger">{{ $error_message }}<button type="button" class="close" data-dismiss="alert">&times;</button></div>
         <?php }
        ?>
    </div>






    <div id="header">
        <div class="container">
            <div class="row">
                <div class="search-area">
                    <h1>YOUBUY24</h1>
                    <form class="form-inline signup" role="form" method="get" action="{{ URL::to('search_result') }}">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" name="q">
                        </div>
                        <button type="submit" class="btn btn-theme"><i class="fa fa-search"></i></button>
                    </form>					
                </div>
            </div>
        </div>
        
        
    </div>
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <ul class="language_bar">
                        <li><a href="#"><i class="fa fa-globe"></i>&nbsp;Thailand</a></li>
                        <li><a href="#">English(UK)</a></li>
                        <li><a href="#">THB</a></li>
                    </ul>
                </div>  
                <div class="col-lg-offset-3">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#aa">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="aa" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><span class="youbuy_copyright">&copy; 2014 Youbuy24</span></li>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="http://youbuy24.com/users/policy" target="_blank">Privacy Policy</a></li>
                            <li><a href="https://www.facebook.com/youbuy24" target="_blank">Facebook Fanpage</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>		
        </div>	
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    {{ HTML::script('js/bootstrap.min.js')}} 

    <!-- pop up start -->

    <div class="overlay" style="display: none;">
        <div class="login-wrapper">
            <div class="login-content">
                <div id="tabbox">
                    <a href="#" id="login" class="tab">@if(!empty($set_password)) {{ 'Reset Password' }} @else {{ 'Sign in' }} @endif</a>
                    <a href="#" id="signup" class="tab">Create Your Store</a>
                    <a class="close"><i class="fa fa-times"></i></a>
                </div>
                <div id="panel">
                    <div id="loginbox">
                        
                        
                            <form method="post" action="#" id="reset_password_form" @if(empty($set_password)) style="display:none;;" @endif>
                                <div id="reset_password_message"></div>
                                <label for="username">
                                    New Password:
                                    <input type="password" name="new_password" id="new_password" required="required" />
                                </label>
                                <label for="password">
                                    Confirm Password:
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{6,20}$" required="required" />
                                </label>
                                <button type="submit" id="reset_password" name="reset_password" >Reset Password</button>
                            </form>
                        
                        <form method="post" action="#" id="login_form" @if(!empty($set_password)) style="display:none;" @endif>
                            <div id="login_message"></div>
                            <label for="username">
                                Email:
                                <input type="email" name="username" id="username" placeholder="Ensert Email Address"  required="required" />
                            </label>
                            <label for="password">
                                Password:
                                <input type="password" name="password" id="password" placeholder="Ensert Password" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{6,20}$" required="required" />
                            </label>
                            <button type="submit" id="sign_in" name="sign_in" >Sign in</button>
                            @if(empty($set_password)) <span id="forget_password" style="cursor: pointer;">Forget Password?</span>@endif
                        </form>
                        <form method="post" action="#" id="forgot_form" style="display:none;">
                            <div id="forgot_message"></div>
                            <label for="forget_email">
                                Email:
                                <input type="email" name="forget_email" id="forget_email" placeholder="Ensert Email Address" />
                            </label>
                            <button type="submit" id="forget_email_submit" name="forget_email_submit" >Submit</button>
                            <button type="submit" id="forget_email_cancel" name="forget_email_cancel" >Cancel</button>
                        </form>
                        
                    </div>
                    <div id="signupbox">
                        <?php //include('form/form.blade.php'); ?>
                        @include('front/includes/form/form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){

           
    });
    </script>

    <!-- pop up form end -->
</body>
</html>
