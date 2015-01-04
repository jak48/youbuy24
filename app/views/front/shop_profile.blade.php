<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Setting | youbuy24</title>

        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        {{ HTML::style('css/bootstrap.css')}}
        {{ HTML::style('css/bootstrap-theme.css')}}
        {{ HTML::style('css/font-awesome.min.css')}}

        <!-- siimple style -->
        {{ HTML::style('css/style.css')}}
        {{ HTML::style('css/custom.css')}}
        {{ HTML::style('css/profile.css')}}

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->


        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        {{ HTML::script('js/script.js')}}
    </head>
    <body>

        <header class="header-area">
            <div class="container">
                <div class="col-lg-2 logo-part">
                    <div class="logo">
                        <h1><a title="Home" href="{{URL::to('/')}}">YOUBUY24</a></h1>
                    </div>
                    <div title="notification" class="bell">
                        <i class="fa fa-bell-o"></i>
                    </div>
                    <div class="clear"></div>
                </div>                
                <div class="col-lg-5">
                    <div class="search-box">
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="q">
                                <select class="form-control">
                                    <option selected value="">All Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="col-lg-4 col-lg-offset-1 user-area">
                    <div class="user-info">                        
                        <div class="user-name">
                            <!-- <ul class="nav">
                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Hi, Miss Annabel</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Setting</a></li>
                                        <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                                        <li><a href="#">Help</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                            Hi, Miss Annabel
                        </div>

                        <div class="cart-area">
                            <a href="#"><i class="fa fa-shopping-cart" style="margin-right: 5px;"></i> 0 items</a>
                        </div>
                        <div class="user-img">
                            <ul class="nav">
                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="img/user.jpg"></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ URL::to('settings') }}">Setting</a></li>
                                        <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                                        <li><a href="#">Help</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>                
            </div>            
        </header>
        <section class="setting-page-area">
            <div class="container">
                <div class="col-md-3 setting_page_sidebar">
                    <div class="account-area">
                        <h4>Account</h4>
                        <div class="account-menu-area">
                            <a href="{{URL::to('shop_profile')}}"><i class="fa fa-user"></i><span>Shop Profile</span></a>
                            <a href="{{URL::to('security')}}"><i class="fa fa-lock"></i><span>Security</span></a>
                                <ul class="security_menu">
                                    <li><a href="{{URL::to('change_email')}}">Change Email</a></li>
                                    <li><a href="{{URL::to('change_password')}}">Change Password</a></li>
                                    <li><a href="{{URL::to('delete_account')}}">Delete Account</a></li>
                                </ul>
                            <a href="#"><i class="fa fa-google-wallet"></i><span>Notification</span></a>
                        </div>
                    </div>
                    <div class="transaction-area">
                        <div class="seller-mode">
                            <h4>Seller Mode</h4>
                            <div class="seller">
                                <a href="#">Seller Order <span>(5)</span></a>
                                <a href="#">Address Seller</a>
                                <a href="#">Get Paid</a>
                            </div>
                        </div>
                        <div class="seller-mode">
                            <h4>Buyer Mode</h4>
                            <div class="seller">
                                <a href="#">Purchase Order <span>(5)</span></a>
                                <a href="#">Address Buyer</a>                                
                            </div>
                        </div>

                    </div>
                    <div class="app-store-area">
                        <div class="app-store">
                            <a href="#">App Store</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 store_profile_area">
                    <div class="store_profile">
                        <div class="shop-profile-title">
                            <h2>Shop Profile</h2>
                            <?php //echo 'id'.$store_id;?>
                        </div>

                        <form method="post" class="shop_profile_form form-horizontal" action="{{URL::to('edit_shop_profile/'.$store_id)}}">                            
                            
                            <?php $success_message = Session::get('success');
                                  $error_message = Session::get('error');
                                  if(!empty($success_message)){ ?>
                                        <div class="alert alert-success">{{ $success_message }}<button type="button" class="close" data-dismiss="alert">&times;</button></div>
                             <?php  }
                                  if(!empty($error_message)){ ?>
                                        <div class="alert alert-danger">{{ $error_message }}<button type="button" class="close" data-dismiss="alert">&times;</button></div>
                             <?php }
                            ?>
                            <div class="control-group">
                                <label class="control-label">Shop Name</label>
                                <div class="controls">
                                    <div class="input-prepend">                                        
                                        <input type="text" placeholder="Change  Shop Name" name="shop_name" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Current Password</label>
                                <div class="controls">
                                    <div class="input-prepend">                                        
                                        <input type="password" placeholder="Enter Current Password" name="current_password" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>


                            <div class="control-group">
                                <label class="control-label"> Profile Image</label>
                                <div class="controls">
                                    <div class="input-prepend">                                        
                                        <input type="text" placeholder="Change  Profile Image" name="profile_image" id="profile_image" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="control-group ">
                                <label class="control-label">Cover Image</label>
                                <div class="controls">
                                    <div class="input-prepend">                                        
                                        <input type="text" placeholder="Change  Cover Image" name="cover_image" id="cover_image" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Detail About</label>
                                <div class="controls">
                                    <div class="input-prepend">                                        
                                        <textarea type="text" placeholder="Detail About" name="detail_about" id="detaile_about" class="input-xlarge"></textarea>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="control-group ">
                                <label class="control-label">Payment Policy</label>
                                <div class="controls">
                                    <!-- <div class="input-prepend">                                        
                                        <input type="text" placeholder="Payment Policy" name="payment_policy" id="payment_policy" class="input-xlarge">
                                    </div> -->
                                    <label class="checkbox-inline col-sm-5">
                                      <input type="checkbox" id="inlineCheckbox1" name="payment_method[]" value="Paypal"> Paypal
                                    </label>
                                    <label class="checkbox-inline col-sm-5">
                                      <input type="checkbox" id="inlineCheckbox2" name="payment_method[]" value="Bank Transfer"> Bank Transfer
                                    </label>                                    
                                </div>
                            </div>

                            <div class="control-group ">
                                <label class="control-label">Shipping Policy</label>
                                <div class="controls">
                                    <div class="input-prepend">                                        
                                        <input type="text" placeholder="Shipping Policy" name="shipping_policy" id="shipping_policy" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Additional Information</label>
                                <div class="controls">
                                    <div class="input-prepend">                                        
                                        <textarea type="text" placeholder="Additional Information" name="additional_information" id="additional_information" class="input-xlarge"></textarea>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Refunds and Exchanges</label>
                                <div class="controls">
                                    <div class="input-prepend">                                        
                                        <input type="text" placeholder="Refunds and Exchanges" name="refunds_exchanges" id="refunds_exchanges" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="controls">
                                <button class="btn btn-primary" id="mybtn" type="submit">Save Profile</button>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>

            </div>
        </section>

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


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <!--<script src="bootstrap.min.js"></script>-->
    </body>
</html>