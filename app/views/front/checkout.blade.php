<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checck Out | youbuy24</title>


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
                    <h1><a title="Home" href="index.php">YOUBUY24</a></h1>
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
        <div class="check_out_title">
            <div class="col-md-10 app-store-title">
                4 items in your card
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="col-md-12 setting_page_content">
            <div class="store-content-area">
                <div class="store-title un">
                    <div class="col-md-6 app-store-title">
                        Order From Shojib
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div class="store-item-area">
                    <div class="col-md-9"> 
                        <div class="col-md-12 fullwidth-cart">  
                            <div class="item master-item">
                                <a href="">
                                    <img width="170" height="135" alt="Colorful Geometric Pillow Cover in Lime Green, Teal, Brown, Gray, Brown, Fuchsia, Pink / Geometric Cushion Cover / Chevron Pillow / 18x18" src="https://img0.etsystatic.com/051/0/7854494/il_170x135.675819484_mwv4.jpg">
                                </a>
                                <div class="item-details">
                                    <h3>
                                        <a href="">
                                            Colorful Geometric Pillow Cover in Lime Green, Teal, Brown, Gray, Brown, Fuchsia, Pink / Geometric Cushion Cover / Chevron Pillow / 18x18 </a>
                                        </h3>
                                        <input type="hidden" value="1" name="has_variations">
                                        <div class="item-variation clear">
                                            <div class="item-numbers-full-width">
                                                <label class="label">Quantity:</label>
                                                <select id="quantity-477391836" name="quantity">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option selected="" value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>

                                                <div class="shipping">$1,500.00THB-$1,600.00THB Shipping</div>

                                                <ul class="actions clear">
                                                    <li class="action-variation-edit ">
                                                        <a class="enable-variation-edit" href="#"> Edit </a>
                                                    </li>
                                                    <li class="action-remove">
                                                        <a title="Remove listing" rel="remove" href="#remove"> Remove </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="from_where">

                                        <p> From Thailand</p>
                                        <p> Ready To ship in 1-2 Weeks</p>      


                                    </div> 

                                </div>



                            </div>


                            <div class="col-md-12 fullwidth-cart">  
                                <div class="item master-item">
                                    <a href="">
                                        <img width="170" height="135" alt="Colorful Geometric Pillow Cover in Lime Green, Teal, Brown, Gray, Brown, Fuchsia, Pink / Geometric Cushion Cover / Chevron Pillow / 18x18" src="https://img0.etsystatic.com/051/0/7854494/il_170x135.675819484_mwv4.jpg">
                                    </a>
                                    <div class="item-details">
                                        <h3>
                                            <a href="">
                                                Colorful Geometric Pillow Cover in Lime Green, Teal, Brown, Gray, Brown, Fuchsia, Pink / Geometric Cushion Cover / Chevron Pillow / 18x18 </a>
                                            </h3>
                                            <input type="hidden" value="1" name="has_variations">
                                            <div class="item-variation clear">
                                                <div class="item-numbers-full-width">
                                                    <label class="label">Quantity:</label>
                                                    <select id="quantity-477391836" name="quantity">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option selected="" value="5">5</option>
                                                        <option value="6">6</option>
                                                    </select>

                                                    <div class="shipping">$1,500.00THB-$1,600.00THB Shipping</div>

                                                    <ul class="actions clear">
                                                        <li class="action-variation-edit ">
                                                            <a class="enable-variation-edit" href="#"> Edit </a>
                                                        </li>
                                                        <li class="action-remove">
                                                            <a title="Remove listing" rel="remove" href="#remove"> Remove </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="from_where">

                                            <p> From Thailand</p>
                                            <p> Ready To ship in 1-2 Weeks</p>      


                                        </div> 

                                    </div>



                                </div>

                            </div>


                            <div class="col-md-3 order-summary">

                                <div class="order-summary">
                                    <div class="order-payment">
                                        <h4> How You'll Pay </h4>
                                        <ul class="payment-choices">
                                            <li class="payment-choice-credit-card">
                                                <input id="cc-477692773" type="radio" value="cc" name="payment_method">
                                                <label for="cc-477692773">
                                                    <span class="cc-icons ">Bank Transfer</span>
                                                </label>
                                            </li>
                                            <li class="payment-choice-paypal">
                                                <input id="pp-477692773" type="radio" checked="checked" value="paypal" name="payment_method">
                                                <label class="hide-cards" for="pp-477692773">
                                                    <span class="paypal-plus-cards">PayPal</span>
                                                </label>
                                            </li>
                                        </ul>

                                        <div class="order-cost-summary">
                                            <table class="summary-details">
                                                <tbody>
                                                    <tr class="item-total">
                                                        <td>Item total</td>
                                                        <td class="monetary">
                                                            <span class="currency-symbol">$</span>
                                                            <span class="currency-value">28.00</span>
                                                            <span class="currency-code">USD</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="shipping">
                                                        <td> Shipping </td>
                                                        <td class="monetary">
                                                            <span class="currency-symbol">$</span>
                                                            <span class="currency-value">12.00</span>
                                                            <span class="currency-code">USD</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="shipping shipping-destination">
                                                        <tr class="divider">
                                                            <td colspan="2"></td>
                                                        </tr>
                                                        <tr class="grand-total">
                                                            <td>Total</td>
                                                            <td class="monetary">
                                                                <span class="currency-symbol">$</span>
                                                                <span class="currency-value">40.00</span>
                                                                <span class="currency-code">USD</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="order-submit">
                                                    <button class="btn-transaction " data-redirect-to="/cart/477391836/checkout" name="submit_button" type="submit"> Check out with PayPal </button>
                                                </div>
                                                <div class="order-submit">
                                                    <button class="btn-transaction " data-redirect-to="/cart/551007598/checkout" name="submit_button" type="submit"> Proceed to Checkout </button>
                                                </div>


                                            </div>
                                        </div>


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
                        {{HTML::script('js/bootstrap.min.js')}}
                    </body>
                    </html>