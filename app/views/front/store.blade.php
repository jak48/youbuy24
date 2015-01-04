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
                    <p>Please confirm your email address. If you haven't received anything you can <span class="email-info" id="update_email">update your email</span> or <span class="email-info" id="resend_confirmation">Resend confirmation</span></p>
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
                        <form class="navbar-form" role="search" method="get" action="{{ URL::to('search_result') }}">
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

                            Hi, {{ $store_info->first_name." ".$store_info->last_name }}
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
                       @if(!empty($store_info->cover_pic))
                        <img src="{{ $store_info->cover_pic }}">
                         
                        <!-- <img class="change_camera1" src="img/camera.png" alt="Change Profile picture"> -->
                        <!-- <div class="change_camera1_hover"><img class="change_camera3" src="img/camera.png" alt="Change Profile picture">Change Picture</div> -->     
                        
                        <!-- <img class="change_camera1" style="margin-top: 0px;" src="img/camera.png" alt="Change Profile picture"> -->
                        <!-- <div class="change_camera1_hover"><img class="change_camera3" src="img/camera.png" alt="Change Profile picture">Change Picture</div> -->     
                        @endif
                        <!-- <div class="change_camera1_hover"><img class="change_camera3" src="img/camera.png" alt="Change Profile picture">Change Picture</div> -->     
                    </div>
                        @if($store_info->id == Session::get('store_id'))
                        <img class="change_camera1" src="img/camera.png" alt="Change Profile picture">
                        @endif
                        <div class="change_camera1_hover"><img class="change_camera3" src="img/camera.png" alt="Change Profile picture">Change Picture</div>
                </div>
                <div class="profile-name">
                    <div class="user-profile-pic">
                        @if(!empty($store_info->profile_pic))
                        <img src="{{ $store_info->profile_pic }}">
                        @else
                        <img src="img/default_profile_image.png" alt="">
                        @endif
                        @if($store_info->id == Session::get('store_id'))
                        <img class="change_camera" src="img/camera.png" alt="Change Profile picture">
                        <div class="change_camera_hover"><img class="change_camera2" src="img/camera.png" alt="Change Profile picture">Change Profile Picture</div>
                        @endif
                        
                    </div>

                </div>
                <div class="user-title">
                    <div class="profile-title">
                        <h2>{{ ucfirst($store_info->first_name)." ".ucfirst($store_info->last_name) }}</h2>
                        <h4>www.youbuy24.com/{{ $store_info->store_name }}</h4>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        
                    </div>
                    <div class="fb-section">
                        @if($store_info->like_status)
                            <div class="addthis_native_toolbox">
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52b979c605e1d442" async="async"></script>
                            </div>
                        @else
                        <img src="img/fb-like.jpg">
                        @endif
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
                                @if($store_info->id == Session::get('store_id'))
                                    <div id="message"></div>
                                    <form role="form" id="add_category" action="#">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="category" id="category" placeholder="Add Category">
                                        </div>
                                        <button type="submit" name="submit" value="add_category" class="btn btn-default">Add</button>
                                        <a class="cat_as" href="{{ URL::to('add_category') }}"><img style="float:right;" src="{{ URL::to('img/down_arrow.png') }}" alt=""></a>
                                    </form>
                                    <div class="clear"></div>
                                @endif
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
                    <div class="product-filter">
                        <div class="product-view-search">
                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="q">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="product-display">
                            <a title="List View"><i class="fa fa-list" id="list_view"></i></a>
                            <a title="Grid View"><i class="fa fa-th" id="grid_view"></i></a>
                        </div>
                        <div class="product-sort">
                            <b>Sort By: </b>
                            <select name="sort_order" id="sort_order">
                                <option selected="selected" value="def">Default</option>
                                <option value="a2z">Name (A - Z)</option>
                                <option value="z2a">Name (Z - A)</option>
                                <option value="pl2h">Price (Low &gt; High)</option>
                                <option value="ph2l">Price (High &gt; Low)</option>
                                <!-- <option value="rh2l">Rating (Highest)</option>
                                <option value="rl2h">Rating (Lowest)</option> -->
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div><!-- product-filter -->
                    <!-- ============== End of product filter =================== -->
                    <div id="product_listing">
                        <div class="product-grid-view" @if(Cookie::get('pro_view') != 'grid') {{ 'style="display:none;"' }}@endif></div>
                        <div class="product-list-view" @if(Cookie::get('pro_view') != 'list') {{ 'style="display:none;"' }}@endif></div>
                    </div>
                    <!-- .product-grid-view -->

                    <!-- ================= End of product grid view ================== -->

                    <!-- .product-list-view -->
                    <!-- ================End of product list view ====================== -->

                    @if($store_info->id == Session::get('store_id'))
                    <button class="btn btn-info" id="add_pro_button">Add Product</button>
                    <!-- start of add product form -->
                    <div class="product_add_form" style="display:none;">
                        <h2>List an Item</h2>
                        <form action="#" method="POST" role="form"> 
                            <div class="alert alert-danger" id="add_pro_error" style="display:none;"></div>                           
                            <div class="product_name">
                                <label for="product-name">Name of Products:</label>
                                <input id="item-title-en-US" class="text title primary" maxlength="255" value="" data-language="en-US" name="product_name">
                            </div>                                    

                            <div class="description_part">
                                <label for="description-parent">Description :</label>
                                <!--<p class="inline-message">Try to answer the questions buyers will have. Tell the item's story and explain why it's special.</p>-->
                                <!--<label></label>-->
                                <textarea id="item-description-en-US" class="text description primary" data-language="en-US" name="product_description" style="overflow: hidden; height: 75px;"></textarea><br>
<!--                                        <label></label><p style="margin-bottom: 10px;"class="inline-message">
                                Preview how your listing will appear in Google search results.
                                <a class="google-preview-toggle" data-language="en-US" href="#">Hide preview</a>
                            </p>-->
                            </div>

                            <div class="keyowrds">
                                <label for="keyword">Keywords:</label>
                                <input id="tags-input-text-0" class="text tags-input-element" type="text" data-language="0" name="keywodrs">
                                <span class="button-medium">
                                    <input class="button-medium btn btn-default" type="button" value="Add">
                                </span>
                            </div>


                            <div class="processing-time">
                                <label for="product_category">Category</label>
                                <select id="product_category" name="product_category">
                                    <option value="">Select</option>
                                </select>
                            </div>

                            <div class="processing-time">
                                <label for="product_subcategory">Subcategory</label>
                                <select id="product_subcategory" name="product_subcategory">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="price">
                                <label for="price">Price:</label>
                                <input id="price" class="input_price money text text-small" type="text"  name="product_price"><span> THB</span>
                            </div>
                            <div class="image_path">
                                <label for="image-path">Image Path1:</label>
                                <input id="item-title-en-US" class="text title primary" maxlength="255" value="" data-language="en-US" name="image_path">
                            </div>
                            <div class="image_path">
                                <label for="image-path1">Image Path2:</label>
                                <input id="item-title-en-US" class="text title primary" maxlength="255" value="" data-language="en-US" name="image_path1">
                            </div>
                            <div class="image_path">
                                <label for="image-path2">Image Path3:</label>
                                <input id="item-title-en-US" class="text title primary" maxlength="255" value="" data-language="en-US" name="image_path2">
                            </div>
                            <div class="image_path">
                                <label for="image-path3">Image Path4:</label>
                                <input id="item-title-en-US" class="text title primary" maxlength="255" value="" data-language="en-US" name="image_path3">
                            </div>
                            <div class="image_path">
                                <label for="image-path4">Image Path5:</label>
                                <input id="item-title-en-US" class="text title primary" maxlength="255" value="" data-language="en-US" name="image_path4">
                            </div>

                            <div class="processing-time">
                                <label for="processing-time">Processing time</label>
                                <select id="processing-time-id" name="processing_time">
                                    <option value="">Ready to dispatch in...</option>
                                    <optgroup label="----------------------------"></optgroup>
                                    <option class="range-1-1" value="1">1 business day</option>
                                    <option class="range-1-2" value="2">1-2 business days</option>
                                    <option class="range-1-3" value="3">1-3 business days</option>
                                    <option class="range-3-5" value="4">3-5 business days</option>
                                    <option class="range-5-10" value="6">1-2 weeks</option>
                                    <option class="range-10-15" value="8">2-3 weeks</option>
                                    <option class="range-15-20" value="9">3-4 weeks</option>
                                    <option class="range-20-30" value="10">4-6 weeks</option>
                                    <option class="range-30-40" value="11">6-8 weeks</option>
                                    <option value="custom">Custom range</option>
                                </select>
                            </div>

                            <div class="shipping_form">
                                <label for="shipping-form">Shipping from:</label>
                                <select name="ship_from_country" id="ship_from_country">
                                    <option selected value="">Select a location...</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div id="shipping_manipulate" style="display:none;">
                                <h5>Shipping to </h5>
                                <table>
                                    <tr>
                                        <td style="width:154px;">Worldwide</td>
                                        <td>$</td>
                                        <td><input type="number" placeholder="Shipping Cost"></td>
                                        <td>$</td>
                                        <td><input type="text" placeholder="With another item"></td>
                                        <td>&nbsp;</td>
                                        <td><span class="cross_x" style="color: #51BCDB;padding-left: 20px; cursor: pointer;">x</span></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="ship-to">
                                <label for="label-to">Add Location:</label>
                                <select name="ship_to_country" id="ship_to_country">
                                    <option value="">Select a location...</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="shipping-by">
                                <label for="shipping-by">Shipping Company:</label>
                                <input type="text" name="company_name">
                            </div>


                            <input type="submit" value="Submit" class="btn btn-info">

                        </form>

                    </div>
                    <!-- End of add product form -->
                    @endif
                </div>
                <!-- End of store tab- - - -  - - - - - - - - - - -->

                <!-- Start of timeline tab-->
                <div class="col-lg-9 menu_tab_content" style="display:none" id="timeline">
                    This is timeline content
                </div>
                <!-- End of timeline tab -->

                <!-- Start of timeline tab-->
                <div class="col-lg-9 menu_tab_content is_active" style="display:none" id="favorite">
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
            <div id="delete_cat_message" style="color: red;"></div>
            <form>
                <fieldset>
                    <label for="password">Password</label>
                    <input type="password" name="password1" id="password1" value="xxxxxxx" class="text ui-widget-content ui-corner-all">
                    <!-- Allow form submission with keyboard without duplicating the dialog button -->
                    <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
            </form>
        </div>

        <div id="dialog-form-profile_pic" title="Enter Picture URL">
            <div id="pro_pic_message" style="color: red;"></div>
            <form>
                <fieldset>
                    <label for="">Picture URL</label>
                    <input type="text" name="profile_pic_url" id="profile_pic_url"  class="text ui-widget-content ui-corner-all">
                    <!-- Allow form submission with keyboard without duplicating the dialog button -->
                    <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
            </form>
        </div>

        <div id="dialog-form-cover_pic" title="Enter Picture URL">
            <div id="cover_pic_message" style="color: red;"></div>
            <form>
                <fieldset>
                    <label for="">Cover URL</label>
                    <input type="text" name="cover_pic_url" id="cover_pic_url"  class="text ui-widget-content ui-corner-all">
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

        <script>
$(document).ready(function () {
    var add_category = "{{ URL::to('add_category') }}";
    var delete_category = "{{ URL::to('delete_category') }}";
    var product_list_url = "{{ URL::to('store_view') }}";
    var add_product_url = "{{ URL::to('add_product')}}";
    var category_list = "{{ URL::to('category_list') }}";
    var subcategory_list = "{{ URL::to('subcategory_list') }}";
    var add_product_url = "{{ URL::to('add_product') }}";
    //var store_view = "{{ URL::to('store_view') }}";
    var ascending_image_link = "{{ URL::to('img/down_arrow.png') }}";
    var descending_image_link = "{{ URL::to('img/up_arrow.png') }}";
    var view_change = "{{ URL::to('view_change') }}";
    var edit_category = "{{'edit_category'}}";
    var store_link = "{{ URL::to('/') }}";
    var picture_up_url = "{{ URL::to('pro_pic_up') }}";
    var cover_up_url = "{{ URL::to('cover_pic_up') }}";
    var store_name = "{{ $store_info->store_name }}";
    var store_id = "{{ $store_id }}";
    var cat_id = 0;
    var sort_order = "def";
    
    var deleting_category_id = '';
    //for menu tab custom code
    $('.timeline-title').click(function (e) {
        e.preventDefault();
        var menu_specific = $(this);
        var content_id = menu_specific.attr('href');
        $('.menu_tab_content').hide();
        $('.timeline-title').find('span').hide();
        $(content_id).show();
        //            menu_specific.removeClass('is_active');
        //            menu_specific.addClass('is_active');
    });
    //end of custom tab code

    //for first time category load
    $(function () {
        $.ajax({
            url: add_category,
            type: 'POST',
            data: {'store_id': store_id},
            success: function (data) {
                $('.category_title_area').html(data);
            }
        });
    });
    //end for first time category load
    //first time product load
    $(function () {
        $.ajax({
            url: product_list_url+'/'+store_id+'/'+cat_id+'/'+sort_order,
            type: 'GET',
            //data: {'store_id': store_id, 'sort_order': sort_order},
            success: function (data) {
                $('#product_listing').html(data);
            }
        });
    });
    //end of first time product load
    //first time product category load
    $(function () {
        $.ajax({
            url: category_list,
            type: 'POST',
            data: {'store_id': store_id},
            success: function (data) {
                $('#product_category').html(data);
            }
        });
    });
    //end of first time product category load
    //hide and show sub category
    $('body').on('click', '.fa.fa-angle-right', function () {
        $(this).parent().parent().find('.sub_category').show('300');
        $(this).removeClass('fa-angle-right').addClass('fa-angle-down');
    });
    $('body').on('click', '.fa.fa-angle-down', function () {
        $(this).parent().parent().find('.sub_category').hide('300');
        $(this).removeClass('fa-angle-down').addClass('fa-angle-right');
    });
    //end of hide show sub category

    //add category
    $('#add_category').submit(function (e) {
        e.preventDefault();
        if ($('#category').val() == '') {
            alert("Please, Enter catgory name");
        } else {
            $.ajax({
                url: add_category,
                type: 'POST',
                data: {'category_name': $('#category').val(), 'submit': 'add_category'},
                success: function (data) {
                    if (data == 1) {
                        alert('Category already exist');
                    } else {
                        $('.category_title_area').html(data);
                        $('#category').val('');
                    }
                }
            });
        }
    });
    //end of adding category

    //Delete category
    dialog = $("#dialog-form").dialog({
        autoOpen: false,
        height: 260,
        width: 250,
        modal: true,
        buttons: {
            "Submit": pass_and_delete,
            Cancel: function () {
                dialog.dialog("close");
            }
        },
        close: function () {
            //form[ 0 ].reset();
            $('#delete_cat_message').html('Password is required');
        }
    });



    function pass_and_delete() {
        var pass = $('#password1').val();
        if (pass == '') {
            $('#delete_cat_message').html('Password is required');
        } else {
            $.ajax({
                url: delete_category + '/' + deleting_category_id + '/' + encodeURI(pass),
                type: 'GET',
                success: function (data) {
                    if (data == 1) {
                        $('#delete_cat_message').html('data could not be deleted');
                    } else if (data == 2) {
                        $('#delete_cat_message').html('password does not match');
                    } else if (data == 3) {
                        $('#delete_cat_message').html('First delete product under category or it\'s subcategory');
                    } else {
                        $('.category_title_area').html(data);
                        dialog.dialog("close");
                    }
                }
            });
        }
    }

    $('body').on('click', '.cat_delete', function () {
        //var category_id = $(this).attr('id');
        deleting_category_id = $(this).attr('id');
        if (confirm("All subcategory under this category will be deleted. Are you sure want to delete?")) {
            dialog.dialog("open");
        }
    });
    //end of delete category

    //profile picture up
    dialog2 = $("#dialog-form-profile_pic").dialog({
        autoOpen: false,
        height: 260,
        width: 350,
        modal: true,
        buttons: {
            "Submit": profile_pic_up,
            Cancel: function () {
                dialog2.dialog("close");
            }
        },
        close: function () {
            //form[ 0 ].reset();
            $('#pro_pic_message').html('');
        }
    });

    $('body').on('click', '.change_camera_hover', function () {
        dialog2.dialog("open");
        });

        function profile_pic_up() {
        var pro_pic_url = $('#profile_pic_url').val();
        if (pro_pic_url == '') {
            $('#pro_pic_message').html('URL is required');
        } else {
            $.ajax({
                url: picture_up_url,
                type: 'POST',
                data: { "picture": pro_pic_url },
                success: function (data) {
                    if (data == 1) {
                        $('#pro_pic_message').html('Invalid URL');
                    } else if (data == 2) {
                        $('#pro_pic_message').html('File not exist');
                    } else {
                        $('.user-profile-pic img:first').attr('src', pro_pic_url);
                        dialog2.dialog("close");
                    }
                }
            });
        }
    }
    //end of profile pic up

    //cover pic up
    dialog3 = $("#dialog-form-cover_pic").dialog({
        autoOpen: false,
        height: 260,
        width: 350,
        modal: true,
        buttons: {
            "Submit": cover_pic_up,
            Cancel: function () {
                dialog3.dialog("close");
            }
        },
        close: function () {
            //form[ 0 ].reset();
            $('#cover_pic_message').html('');
        }
    });

    $('body').on('click', '.change_camera1_hover', function () {
        dialog3.dialog("open");
        });

        function cover_pic_up() {
        var cover_pic_url = $('#cover_pic_url').val();
        if (cover_pic_url == '') {
            $('#cover_pic_message').html('URL is required');
        } else {
            $.ajax({
                url: cover_up_url,
                type: 'POST',
                data: { "picture": cover_pic_url },
                success: function (data) {
                    if (data == 1) {
                        $('#cover_pic_message').html('Invalid URL');
                    } else if (data == 2) {
                        $('#cover_pic_message').html('File not exist');
                    } else {
                        $('.user-cover-img img:first').attr('src', cover_pic_url);
                        dialog3.dialog("close");
                    }
                }
            });
        }
    }
    //end of cover pic up

    //for creating sub menu
    $('body').on('click', '.glyphicon.glyphicon-plus', function () {
        //var category_id = $(this).parent().find('.glyphicon-minus').attr('id');
        $(this).parent().find('.add_subcat_form').show();
    });
    //end of creating sub menu

    $('body').on('click', '.sub_cat_cancel', function (e) {
        e.preventDefault();
        //$('.add_subcat_form').hide();
        $(this).parent().parent().hide();
        $(this).parent().find("input[type='text']").val('');
    });

    //start of adding subcategory
    $('body').on('submit', '.add_subcat_form', function (e) {
        e.preventDefault();
        var id = $(this).parent().find('.glyphicon-minus').attr('id');
        var sub_cat_name = $(this).parent().find("input[type='text']").val();
        if (sub_cat_name == '') {
            alert('Please , Enter sub category');
        } else {
            $.ajax({
                url: add_category,
                type: 'POST',
                data: {'category_name': sub_cat_name, 'category_id': id, 'submit': 'add_subcategory'},
                success: function (data) {
                    if (data == 1) {
                        alert('Sub Category already exist');
                    } else {
                        $('.category_title_area').html(data);
                    }
                }
            });
        }
    });
    //end of adding subcategory

    //start of delete subcategory
    dialog1 = $("#dialog-form").dialog({
        autoOpen: false,
        height: 260,
        width: 250,
        modal: true,
        buttons: {
            "Submit": pass_and_delete1,
            Cancel: function () {
                dialog.dialog("close");
            }
        },
        close: function () {
            //form[ 0 ].reset();
            $('#delete_cat_message').html('');

        }
    });

    function pass_and_delete1() {
        var pass = $('#password1').val();
        if (pass == '') {
            $('#delete_cat_message').html('Password is required');
        } else {
            $.ajax({
                url: delete_category + '/' + deleting_category_id + '/' + encodeURI(pass),
                type: 'GET',
                success: function (data) {
                    if (data == 1) {
                        $('#delete_cat_message').html('data could not be deleted');
                    } else if (data == 2) {
                        $('#delete_cat_message').html('password does not match');
                    } else if (data == 3) {
                        $('#delete_cat_message').html('First delete product under this subcategory');
                    } else {
                        $('.category_title_area').html(data);
                        dialog1.dialog("close");
                    }
                }
            });
        }
    }
    $('body').on('click', '.sub_cat_delete', function (e) {
        e.preventDefault();
        var list_element = $(this).parent().parent();
        deleting_category_id = $(this).parent().find('a').attr('id');
        if (confirm("Are you sure want to delete?")) {
            dialog1.dialog("open");
        }
    });
    //end of deleting subcategory

    //add product button action
    $('body').on('click', '#add_pro_button', function () {
        $('.product_add_form').show();
        $(this).hide();
    });
    //end of add product button action

    //adding product to list
    $('body').on('submit', '#product_add_form form', function (e) {
        e.preventDefault();
        $.ajax({
        });
    });
    //end of adding product list

    //subcategory list load wheren category selected
    $('body').on('change', '#product_category', function () {
        $.ajax({
            url: subcategory_list,
            type: 'POST',
            data: {'category_id': $('#product_category option:selected').val()},
            success: function (data) {
                $('#product_subcategory').html(data);
            }
        });
    });
    //end of subcategory load

    $('body').on('submit', '.product_add_form form', function (e) {
        e.preventDefault();
        $.ajax({
            url: add_product_url,
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
                if (data == 1) {
                    $('.product-grid-view').append('<div class="product-grid"><div class="product-description"><div class="add-wishlist"><a onclick=""><i class="fa fa-heart"></i></a></div><div class="remove-btn"><a onclick=""><i class="fa fa-times"></i></a></div><div class="clear"></div><div class="product-image"><a href="#"><img src="img/product/product1.jpg" alt="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic" title="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic"></a></div><div class="product-title"><a href="#">F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic</a></div></div><div class="product-price">TBH 527.17</div></div>');
                    $('.product-list-view').append('<div class="product-list"><div class="product-list-image"><a href="#"><img src="img/product/list_product1.jpg" alt="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic" title="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic"></a></div><div class="product-list-description"><a href="#">Hyaluronic acid face Cosmetic</a><br>By TreeChild</div><div class="product-list-viewer">25 views</div><div class="product-list-review-time">1 hour ago</div><div class="product-list-price"><span>TBH 527.17</span><div class="add-wishlist"><a onclick=""><i class="fa fa-heart"></i></a></div><div class="remove-btn"><a onclick=""><i class="fa fa-times"></i></a></div></div><div class="clear"></div></div>');
                    $('html, div.product-grid-view').animate({scrollTop: 580}, 'slow');
                    $('.product_add_form').hide();
                    $('#add_pro_button').show();
                } else {
                    //alert(data);
                    $('#add_pro_error').html(data).show();
                    //$('html, div.product-grid-view').animate({scrollTop:580}, 'slow');
                }

                //$( "div.product-grid-view" ).scrollTop(0);
            }
        });
    });

    $('body').on('click', '#grid_view', function (e) {
        e.preventDefault();
        $('.product-grid-view').show();
        //setCookie('pro_view','grid',5);

        $('.product-list-view').hide();
        $.get(view_change + '/grid');
        //alert(getCookie('pro_view'));
    });

    $('body').on('click', '#list_view', function (e) {
        e.preventDefault();
        $('.product-grid-view').hide();
        //setCookie('pro_view','list',5);
        $('.product-list-view').show();
        $.get(view_change + '/list');
        //alert(getCookie('pro_view'));
    });

    /*$('body').on('click', '.pagination a', function () {

    });*/

    $('body').on('click', '.cat_as', function (e) {
        e.preventDefault();
        var element = $(this);
        var as_des_url = element.attr('href');
        $.ajax({
            url: add_category + '/1',
            type: 'POST',
            data: {'store_id': store_id },
            success: function (data) {
                $('.category_title_area').html(data);
                $('#category').val('');
                element.removeClass('cat_as').addClass('cat_des');
                element.find('img').attr('src', descending_image_link);
            }
        });
    });

    $('body').on('click', '.cat_des', function (e) {
        e.preventDefault();
        var element = $(this);
        var as_des_url = element.attr('href');
        $.ajax({
            url: add_category,
            type: 'POST',
            data: {'store_id': store_id },
            success: function (data) {
                $('.category_title_area').html(data);
                $('#category').val('');
                element.removeClass('cat_des').addClass('cat_as');
                element.find('img').attr('src', ascending_image_link);
            }
        });
    });

    $('body').on('click', '.pagination a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET',
            data: {},
            success: function (data) {
                $('#product_listing').html(data);
            }
        });
    });

    $('body').on('click', '.cat_edit_op', function () {
        //var cat_id = $(this).parent().find('span.cat_delete').attr('id');
        $(this).parent().find('.edit_cat_form').show();
    });

    $('body').on('submit', '.editing_category', function (e) {
        e.preventDefault();
        var cat_id = $(this).parent().parent().find('span.cat_delete').attr('id');
        var category_name = $(this).find('input:text').val();
        $.ajax({
            url: edit_category,
            type: 'POST',
            data: {'category_id': cat_id, 'category_name': category_name},
            success: function (data) {
                $('.category_title_area').html(data);
            }
        });
    });

    $('body').on('click', '.subcat_edit_op', function () {
        $(this).parent().parent().find('.edit_subcat_form').show();
    });

    $('body').on('submit', '.editing_subcategory', function (e) {
        e.preventDefault();
        var cat_id = $(this).parent().parent().find('li a').attr('id');
        var category_name = $(this).find('input:text').val();
        $.ajax({
            url: edit_category,
            type: 'POST',
            data: {'category_id': cat_id, 'category_name': category_name},
            success: function (data) {
                $('.category_title_area').html(data);
            }
        });
    });

    $('body').on('change', '#sort_order', function () {
        sort_order = $(this).find('option:selected').val();
        //window.location.href = store_link + "/" +store_name +"?sort_order=" + sort_order;
        $.ajax({
            url: product_list_url+'/'+store_id+'/'+cat_id+'/'+sort_order,
            type: 'GET',
            //data: {'store_id': store_id, 'sort_order': sort_order},
            success: function (data) {
                $('#product_listing').html(data);
            }
        });
    });

    $('body').on('change', '#ship_from_country', function () {
        var selected_value = $('#ship_from_country option:selected').val();
        var selected_text = $('#ship_from_country option:selected').html();
        if (selected_value != "") {
            //$('table tr:first-child td:first-child').html(selected_text); 
            var element_html = '<tr><td style="width:154px;">' + selected_text + '</td><td>$</td><td><input type="number" name="shipping_cost[' + selected_value + ']" placeholder="Shipping Cost"></td><td>$</td><td><input type="text" name="other_cost[' + selected_value + ']" placeholder="With another item"></td><td>&nbsp;</td><td><span class="cross_x" style="color: #51BCDB; padding-left: 20px; cursor: pointer;">x</span></td></tr>';
            $('#shipping_manipulate table').prepend(element_html);
            $('#shipping_manipulate').show();
        }

    });

    $('body').on('click', '.cross_x', function () {
        $(this).parent().parent().hide();
    });

    $('body').on('change', '#ship_to_country', function () {
        var selected_value = $('#ship_to_country option:selected').val();
        var selected_text = $('#ship_to_country option:selected').html();
        if (selected_value != "") {
            //$('table tr:first-child td:first-child').html(selected_text); 
            var element_html = '<tr><td style="width:154px;">' + selected_text + '</td><td>$</td><td><input type="text" name="shipping_cost[' + selected_value + ']" placeholder="Shipping Cost"></td><td>$</td><td><input type="text" name="other_cost[' + selected_value + ']" placeholder="With another item"></td><td>&nbsp;</td><td><span class="cross_x" style="color: #51BCDB; padding-left: 20px; cursor: pointer;">x</span></td></tr>';
            $('#shipping_manipulate table').append(element_html);
            $('#shipping_manipulate').show();
        }

    });
    $('.user-profile-pic').hover(
        function(){
            $('.change_camera').hide();
            $('.change_camera_hover').show();
        },function(){
            $('.change_camera').show();
            $('.change_camera_hover').hide();
        }
     );
    $('.change_camera_hover').hover(
        function(){
            $('.change_camera').hide();
            $('.change_camera_hover').show();
        },function(){
            /*$('.change_camera').show();*/
            $('.change_camera_hover').show();
        }
     );
   $('.change_camera1').hover(
        function(){
            $(this).css('opacity',0);
            $('.change_camera1_hover').show();
            
       },function(){
            $(this).css('opacity',1);
            $('.change_camera1_hover').hide();
       }
   );
   $('.change_camera1_hover').hover(
        function(){
            $('#change_camera1').hide();
            $('.change_camera1_hover').show();
       },function(){
            $('#change_camera1').show();
            $('.change_camera1_hover').hide();
       }
   );
      
    $('.timeline-heading a').click(function(){
        var this_menu = $(this);
        $('.timeline-heading a').removeClass('is_active');
        this_menu.addClass('is_active');
    });
    
    $('body').on('click', '.category_list li > a', function (e) {
            e.preventDefault();
            cat_id = $(this).parent().find('span.cat_delete').attr('id');
            //alert(cat_id);
            //window.location.href = store_link + "/" +store_name +"?sort_order=" + sort_order;
            
             $.ajax({
                    url: product_list_url+'/'+store_id+'/'+cat_id+'/'+sort_order,
                    type: 'GET',
                    //data: {'store_id': store_id, 'sort_order': sort_order},
                    success: function (data) {
                        $('#product_listing').html(data);
                    }
                });
              
        });
     
      $('body').on('click', '.sub_category li > a', function (e) {
        e.preventDefault();
        cat_id = $(this).attr('id');
        
        $.ajax({
            url: product_list_url+'/'+store_id+'/'+cat_id+'/'+sort_order,
            type: 'GET',
            //data: {'store_id': store_id, 'sort_order': sort_order},
            success: function (data) {
                $('#product_listing').html(data);
            }
        });
    });

        

});
        </script>

    </body>
</html>