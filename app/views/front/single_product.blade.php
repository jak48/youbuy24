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
        <!--toast msz-->
        <div class="confirmation-area">
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="toast_msz">
                </div>
            </div>            
        </div>        
        <!--toast msz end-->

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

        <section class="user-cover-area">
            <div class="container user-profile-area">                
                <div class="user-cover">
                    <div class="user-cover-img">
                        <!-- <img src="img/cover2.jpg"> -->
                    </div>
                </div>
                <div class="profile-name">
                    <div class="user-profile-pic">
                        <img src="img/profile.jpg">
                    </div>

                </div>
                <div class="user-title">
                    <div class="profile-title">
                        <h2>Miss Annabel</h2>
                        <h4>www.youbuy24.com/Indiashop</h4>
                    </div>
                    <div class="fb-section">
                        <img src="img/fb-like.jpg">
                    </div>
                </div>

                <div class="timeline-area">
                    <div class="timeline-heading">
                        <a href="#my_store" class="timeline-title is_active">My Store
                            <!--<span class="timeline-arrow"></span>-->
                        </a>
                        <a href="#timeline" class="timeline-title">Timeline</a>
                        <a href="#favorite" class="timeline-title">Favorite</a>
                        <a href="#followers" class="timeline-title">Followers</a>
                        <div class="follow-btn">
                            <a href="#" class="btn btn-default">Follow</a>
                        </div>
                    </div>
                </div>
            </div><!-- container -->
        </section><!-- section.user-cover -->

        <div class="timeline_tab_content">
            <div class="container profile_inner_content">
                <div class="col-lg-3 inner_sidebar">
                    <div class="add_category_section">
                        <div class="panel panel-default">
                            <div class="panel-heading">Category</div>
                            <div class="panel-body">
                                <div id="message"></div>
                                <form role="form" id="add_category" action="#">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="category" id="category" placeholder="Add Category">
                                    </div>
                                    <button type="submit" name="submit" value="add_category" class="btn btn-default">Add</button>
                                    <a class="cat_as" href="{{ URL::to('add_category') }}"><img style="float:right;" src="{{ URL::to('img/down_arrow.png') }}" alt=""></a>
                                </form>
                                <div class="clear"></div>
                                <div class="category_title_area">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="overview_section">
                        <div class="panel panel-default">
                            <div class="panel-heading">Overview</div>
                            <div class="panel-body">
                                <a href="">Detail about</a>
                                <a href="">Payment Policy</a>
                                <a href="">Shipping Policy</a>
                                <a href="">Additional Information</a>
                                <a href="">Returns and Exchanges</a>
                            </div>
                        </div>
                    </div>
                    <div class="follower_product_section">
                        <div class="panel panel-default">
                            <div class="panel-heading">People you follow had bought</div>
                            <div class="panel-body">
                                <div class="related_bought_img">
                                    <a href="#"><img src="img/pro2.jpg" alt="Product 1" class="img-thumbnail"></a>
                                </div>
                                <div class="related_product_title">
                                    <a href="#">This 5,000
                                        <span>By IndianShop</span></a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ========================= right content area ============================ -->
                <!-- Start of store tab  =========== -->
                <div class="col-lg-9 menu_tab_content" id="my_store">
                
                    <div class="breadcrumb">Cagegory->ABC->ccccc</div>
                    <div class="product_add_form">
                    <div class="col-lg-4" id="single_pro">
                    <img src="img/product/list_product1.jpg" WISTH="200px" height="220px">   
                    </div>

                    
                    <div class="col-lg-4" id="single_pro">
                    <span class="price">THB 50.00</span>    
                    <span class="item_title">Item Title</span>
                    <span class="weight">Net Weight</span>
                    <span class="weight"><b>124 by grm</b><b style="color:#af6c6a"> 5.10 Kilo</b></span>
                    <span class="item_number">Item Number: 1122321</span>
                    </div>

                    <div class="col-lg-4" id="single_pro">
                    <span class="ship_from">Shipping From :</span><span class="value">Country Seller</span>
                    <span class="ship_from">Shipped To :</span><span class="value">WorldWide/Domestic</span>
                    <span class="ship_from1">Not Shipped To :</span>
                    <span class="ship_from">Shipped By :</span><span class="value">Shipping Company</span>
                    <span class="ship_from">Domestic :</span><span class="value" id="money">THB 0</span>
                    <span class="ship_from">WordlWide :</span><span class="value" id="money">THB 0</span>
                  
                    </div>


                    <div class="cart_button"><div clas="cart">Add To Cart</div>


                    </div>
                    <!-- End of add product form -->
                </div>
                <!-- End of store tab- - - -  - - - - - - - - - - -->

                <!-- Start of timeline tab-->
                <div class="col-lg-9 menu_tab_content" style="display:none" id="timeline">
                    This is timeline content
                </div>
                <!-- End of timeline tab -->

                <!-- Start of timeline tab-->
                <div class="col-lg-9 menu_tab_content" style="display:none" id="favorite">
                    This is favorite content
                </div>
                <!-- End of timeline tab -->

                <!-- Start of timeline tab-->
                <div class="col-lg-9 menu_tab_content" style="display:none" id="followers">
                    This is followers content
                </div>
                <!-- End of timeline tab -->


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
                                <li><span>&copy; 2014 Youbuy24</span></li>
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

        <div id="dialog-form" title="Enter Password to delete">
            <div id="delete_cat_message" style="color: #af6c6a;"></div>
            <form>
                <fieldset>
                    <label for="password">Password</label>
                    <input type="password" name="password1" id="password1" value="xxxxxxx" class="text ui-widget-content ui-corner-all">
                    <!-- Allow form submission with keyboard without duplicating the dialog button -->
                    <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        {{ HTML::script('js/bootstrap.min.js')}}
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

    <!--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->



    </body>
</html>