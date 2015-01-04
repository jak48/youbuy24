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
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="q">
                                <select class="form-control">
                                    <option selected value="">All Country</option>
                                    <option value="">Afghanistan</option>
                                    <option value="">Bangladesh</option>
                                    <option value="">Canada</option>
                                    <option value="">Pakistan</option>
                                    <option value="">United States</option>
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
                            <ul class="nav">
                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Hi, Miss Annabel</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Setting</a></li>
                                        <li><a href="#">Logout</a></li>
										<li><a href="#">Help</a></li>
                                    </ul>
                                </li>
                            </ul>

                        </div>

                        <div class="cart-area">
                            <a href="#"><i class="fa fa-shopping-cart" style="margin-right: 5px;"></i> 0 items</a>
                        </div>
                        <div class="user-img">
                            <img src="img/user.jpg">
                        </div>
                    </div>
                </div>                
            </div>            
        </header>

        <section class="user-cover-area">
            <div class="container user-profile-area">                
                <div class="user-cover">
                    <div class="user-cover-img">
                        <img src="img/cover2.jpg">
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
                        <a href="#" class="timeline-title">My Store
                            <span class="timeline-arrow"></span>
                        </a>
                        <a href="#" class="timeline-title">Timeline</a>
                        <a href="#" class="timeline-title">Favorite</a>
                        <a href="#" class="timeline-title">Followers</a>
                        <div class="follow-btn">
                            <a href="#" class="btn btn-default">+ Follow</a>
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
                                        <input type="text" class="form-control" name="category" placeholder="Add Category">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-default">Add</button>
                                </form>
                                <div class="clear"></div>
                                <div class="category_title_area">
                                    @foreach($category as $cat)
                                    <ul class="category_list">
                                        <li>                                            
                                            <a id="view_subcat" style="cursor: pointer;"><span style="margin-right: 5px;" title="View Sub-category" class="fa fa-angle-right">
                                             {{$cat->category}}
                                            </span></a>
                                            <span title="Delete Category" class="cat_icons glyphicon glyphicon-minus"></span> <span style="cursor: pointer;" id="add_subcategory_form" title="Add Sub-category" class="glyphicon glyphicon-plus"></span>
                                            <div style="display: none;" id="subcategory_form" class="add_subcat_form">
                                                <form class="">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Add SubCategory">
                                                    </div>
                                                    <button type="submit" class="btn btn-default">Add</button>
                                                    <button type="" class="btn btn-default">Cancel</button>
                                                </form>
                                                <div class="clear"></div>
                                            </div>
                                            <ul id="sub_category_list" class="sub_category" style="display: none;">
                                                <li><a title="View Products" href="#">Chanel</a><span title="Delete Sub-Category" class="cat_icons glyphicon glyphicon-minus"></span></li>
                                                <li><a title="View Products" href="#">Lancome</a><span title="Delete Sub-Category" class="cat_icons glyphicon glyphicon-minus"></span></li>
                                            </ul>
                                        </li>

                                        <!--                                        <li>
                                                                                    <a id="view_subcat" href="#"><span title="View Sub-category" style="margin-right: 5px;" class="fa fa-angle-right"></span> Perfume</a><span title="Delete Category" class="cat_icons glyphicon glyphicon-minus"></span> <span  title="Add Sub-category" class="glyphicon glyphicon-plus"></span>
                                                                                    <div style="display: none;" class="add_subcat_form">
                                                                                        <form class="">
                                                                                            <div class="form-group">
                                                                                                <input type="text" class="form-control" placeholder="Add Category">
                                                                                            </div>
                                                                                            <button type="submit" class="btn btn-default">Add</button>
                                                                                            <button type="" class="btn btn-default">Cancel</button>
                                                                                        </form>
                                                                                        <div class="clear"></div>
                                                                                    </div>
                                                                                    <ul class="sub_category">
                                                                                        <li><a title="View Products" href="#">Chanel</a><span title="Delete Category" class="cat_icons glyphicon glyphicon-minus"></span></li>
                                                                                        <li><a title="View Products" href="#">Lancome</a><span title="Delete Category" class="cat_icons glyphicon glyphicon-minus"></span></li>
                                                                                    </ul>
                                                                                </li>-->
                                    </ul>
                                    @endforeach
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
                <div class="col-lg-9">
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
                            <a title="List View" onclick=""><i class="fa fa-list"></i></a>
                            <a title="Grid View" onclick=""><i class="fa fa-th"></i></a>
                        </div>
                        <div class="product-sort">
                            <b>Sort By: </b>
                            <select onchange="">
                                <option selected="selected" value="">Default</option>
                                <option value="">Name (A - Z)</option>
                                <option value="">Name (Z - A)</option>
                                <option value="">Price (Low &gt; High)</option>
                                <option value="">Price (High &gt; Low)</option>
                                <option value="">Rating (Highest)</option>
                                <option value="">Rating (Lowest)</option>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div><!-- product-filter -->
                    <!-- ============== End of product filter =================== -->

                    <div class="product-grid-view">
                        <div class="product-grid">
                            <div class="product-description">
                                <div class="add-wishlist">
                                    <a onclick=""><i class="fa fa-heart"></i></a>
                                </div>
                                <div class="remove-btn">
                                    <a onclick=""><i class="fa fa-times"></i></a>
                                </div>
                                <div class="clear"></div>
                                <div class="product-image">
                                    <a href="#"><img src="img/product/product1.jpg" alt="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic" title="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic"></a>

                                </div>
                                <div class="product-title">
                                    <a href="#">F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic</a>
                                </div>
                            </div>
                            <div class="product-price">
                                TBH 527.17
                            </div>
                        </div>

                        <!--2nd product-->
                        <div class="product-grid">
                            <div class="product-description">
                                <div class="add-wishlist">
                                    <a onclick=""><i class="fa fa-heart"></i></a>
                                </div>
                                <div class="remove-btn">
                                    <a onclick=""><i class="fa fa-times"></i></a>
                                </div>
                                <div class="clear"></div>
                                <div class="product-image">
                                    <a href="#"><img src="img/product/product2.jpg" alt="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic" title="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic"></a>

                                </div>
                                <div class="product-title">
                                    <a href="#">F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic</a>
                                </div>
                            </div>
                            <div class="product-price">
                                TBH 527.17
                            </div>
                        </div>

                        <!--3rd product-->
                        <div class="product-grid">
                            <div class="product-description">
                                <div class="add-wishlist">
                                    <a onclick=""><i class="fa fa-heart"></i></a>
                                </div>
                                <div class="remove-btn">
                                    <a onclick=""><i class="fa fa-times"></i></a>
                                </div>
                                <div class="clear"></div>
                                <div class="product-image">
                                    <a href="#"><img src="img/product/product3.jpg" alt="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic" title="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic"></a>

                                </div>
                                <div class="product-title">
                                    <a href="#">F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic</a>
                                </div>
                            </div>
                            <div class="product-price">
                                TBH 527.17
                            </div>
                        </div>

                        <!--4th product-->
                        <div class="product-grid">
                            <div class="product-description">
                                <div class="add-wishlist">
                                    <a onclick=""><i class="fa fa-heart"></i></a>
                                </div>
                                <div class="remove-btn">
                                    <a onclick=""><i class="fa fa-times"></i></a>
                                </div>
                                <div class="clear"></div>
                                <div class="product-image">
                                    <a href="#"><img src="img/product/product2.jpg" alt="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic" title="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic"></a>

                                </div>
                                <div class="product-title">
                                    <a href="#">F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic</a>
                                </div>
                            </div>
                            <div class="product-price">
                                TBH 527.17
                            </div>
                        </div>

                        <!--5th product-->
                        <div class="product-grid">
                            <div class="product-description">
                                <div class="add-wishlist">
                                    <a onclick=""><i class="fa fa-heart"></i></a>
                                </div>
                                <div class="remove-btn">
                                    <a onclick=""><i class="fa fa-times"></i></a>
                                </div>
                                <div class="clear"></div>
                                <div class="product-image">
                                    <a href="#"><img src="img/product/product3.jpg" alt="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic" title="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic"></a>

                                </div>
                                <div class="product-title">
                                    <a href="#">F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic</a>
                                </div>
                            </div>
                            <div class="product-price">
                                TBH 527.17
                            </div>
                        </div>

                    </div><!-- .product-grid-view -->

                    <!-- ================= End of product grid view ================== -->

                    <div class="product-list-view">
                        <div class="product-list">
                            <div class="product-list-image">
                                <a href="#"><img src="img/product/list_product1.jpg" alt="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic" title="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic"></a>
                            </div>
                            <div class="product-list-description">
                                <a href="#">Hyaluronic acid face Cosmetic</a><br>
                                By TreeChild
                            </div>
                            <div class="product-list-viewer">
                                25 views
                            </div>
                            <div class="product-list-review-time">
                                1 hour ago
                            </div>
                            <div class="product-list-price">
                                <span>TBH 527.17</span>
                                <div class="add-wishlist">
                                    <a onclick=""><i class="fa fa-heart"></i></a>
                                </div>
                                <div class="remove-btn">
                                    <a onclick=""><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div><!-- .product-list -->

                        <!--2nd product-->

                        <div class="product-list">
                            <div class="product-list-image">
                                <a href="#"><img src="img/product/list_product2.jpg" alt="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic" title="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic"></a>
                            </div>
                            <div class="product-list-description">
                                <a href="#">Hyaluronic acid face Cosmetic</a><br>
                                By TreeChild
                            </div>
                            <div class="product-list-viewer">
                                25 views
                            </div>
                            <div class="product-list-review-time">
                                1 hour ago
                            </div>
                            <div class="product-list-price">
                                <span>TBH 527.17</span>
                                <div class="add-wishlist">
                                    <a onclick=""><i class="fa fa-heart"></i></a>
                                </div>
                                <div class="remove-btn">
                                    <a onclick=""><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div><!-- .product-list -->

                        <!--3rd product-->

                        <div class="product-list">
                            <div class="product-list-image">
                                <a href="#"><img src="img/product/list_product3.jpg" alt="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic" title="F.S ROHTO HADA LABO Hyaluronic acid face Lotion Skin care Cosmetic"></a>
                            </div>
                            <div class="product-list-description">
                                <a href="#">Hyaluronic acid face Cosmetic</a><br>
                                By TreeChild
                            </div>
                            <div class="product-list-viewer">
                                25 views
                            </div>
                            <div class="product-list-review-time">
                                1 hour ago
                            </div>
                            <div class="product-list-price">
                                <span>TBH 527.17</span>
                                <div class="add-wishlist">
                                    <a onclick=""><i class="fa fa-heart"></i></a>
                                </div>
                                <div class="remove-btn">
                                    <a onclick=""><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div><!-- .product-list -->
                    </div><!-- .product-list-view -->
                    <!-- ================End of product list view ====================== -->


                    <div class="product_add_form">
                        <h2>List an Item</h2>
                        <form action="#" method="POST" role="form">                            
                            <div class="product_name">
                                <label for="product-name">Name of Products:</label>
                                <input id="item-title-en-US" class="text title primary" maxlength="255" value="" data-language="en-US" name="product_name">
                            </div>

                            <div class="image_path">
                                <label for="image-path">Image Path:</label>
                                <input id="item-title-en-US" class="text title primary" maxlength="255" value="" data-language="en-US" name="image_path">


                            </div>

                            <div class="description_part">
                                <label for="description-parent">Description :</label>
                                <p class="inline-message">Try to answer the questions buyers will have. Tell the item's story and explain why it's special.</p>
                                <label></label>
                                <textarea id="item-description-en-US" class="text description primary" data-language="en-US" name="product_description" style="overflow: hidden; height: 75px;"></textarea><br>
                                <label></label><p style="margin-bottom: 10px;"class="inline-message">
                                    Preview how your listing will appear in Google search results.
                                    <a class="google-preview-toggle" data-language="en-US" href="#">Hide preview</a>
                                </p>
                            </div>

                            <div class="keyowrds">
                                <label for="keyword">Keywords:</label>
                                <input id="tags-input-text-0" class="text tags-input-element" type="text" data-language="0" name="keywodrs">
                                <span class="button-medium">
                                    <input class="button-medium btn btn-default" type="button" value="Add">
                                </span>
                            </div>

                            <div class="price">
                                <label for="price">Price:</label>
                                <input id="price" class="input_price money text text-small" type="text"  name="product_price"><span> THB</span>
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
                                <select name="ship_from_country">
                                    <option value="">Select a location...</option>
                                    <optgroup label="----------------">
                                        <option value="61">Australia</option>
                                        <option value="79">Canada</option>
                                        <option value="103">France</option>
                                        <option value="91">Germany</option>
                                        <option value="112">Greece</option>
                                        <option value="123">Ireland</option>
                                        <option value="128">Italy</option>
                                        <option value="131">Japan</option>
                                        <option value="167">New Zealand</option>
                                        <option value="177">Portugal</option>
                                        <option value="181">Russia</option>
                                        <option value="99">Spain</option>
                                        <option value="164">The Netherlands</option>
                                        <option value="105">United Kingdom</option>
                                        <option value="209">United States</option>
                                    </optgroup>
                                    <optgroup label="----------------">
                                        <option value="55">Afghanistan</option>
                                        <option value="57">Albania</option>
                                        <option value="95">Algeria</option>
                                        <option value="250">American Samoa</option>
                                        <option value="228">Andorra</option>
                                        <option value="56">Angola</option>
                                        <option value="251">Anguilla</option>
                                        <option value="252">Antigua and Barbuda</option>
                                        <option value="59">Argentina</option>
                                        <option value="60">Armenia</option>
                                        <option value="253">Aruba</option>
                                        <option value="61">Australia</option>
                                        <option value="62">Austria</option>
                                        <option value="63">Azerbaijan</option>
                                        <option value="229">Bahamas</option>
                                        <option value="232">Bahrain</option>
                                        <option value="68">Bangladesh</option>
                                        <option value="237">Barbados</option>
                                        <option value="71">Belarus</option>
                                        <option value="65">Belgium</option>
                                        <option value="72">Belize</option>
                                        <option value="66">Benin</option>
                                        <option value="225">Bermuda</option>
                                        <option value="76">Bhutan</option>
                                        <option value="73">Bolivia</option>
                                        <option value="70">Bosnia and Herzegovina</option>
                                        <option value="77">Botswana</option>
                                        <option value="254">Bouvet Island</option>
                                        <option value="74">Brazil</option>
                                        <option value="255">British Indian Ocean Territory</option>
                                        <option value="231">British Virgin Islands</option>
                                        <option value="75">Brunei</option>
                                        <option value="69">Bulgaria</option>
                                        <option value="67">Burkina Faso</option>
                                        <option value="64">Burundi</option>
                                        <option value="135">Cambodia</option>
                                        <option value="84">Cameroon</option>
                                        <option value="79">Canada</option>
                                        <option value="222">Cape Verde</option>
                                        <option value="247">Cayman Islands</option>
                                        <option value="78">Central African Republic</option>
                                        <option value="196">Chad</option>
                                        <option value="81">Chile</option>
                                        <option value="82">China</option>
                                        <option value="257">Christmas Island</option>
                                        <option value="258">Cocos (Keeling) Islands</option>
                                        <option value="86">Colombia</option>
                                        <option value="259">Comoros</option>
                                        <option value="85">Congo, Republic of</option>
                                        <option value="260">Cook Islands</option>
                                        <option value="87">Costa Rica</option>
                                        <option value="118">Croatia</option>
                                        <option value="88">Cuba</option>
                                        <option value="338">CuraÃ§ao</option>
                                        <option value="89">Cyprus</option>
                                        <option value="90">Czech Republic</option>
                                        <option value="93">Denmark</option>
                                        <option value="92">Djibouti</option>
                                        <option value="261">Dominica</option>
                                        <option value="94">Dominican Republic</option>
                                        <option value="96">Ecuador</option>
                                        <option value="97">Egypt</option>
                                        <option value="187">El Salvador</option>
                                        <option value="111">Equatorial Guinea</option>
                                        <option value="98">Eritrea</option>
                                        <option value="100">Estonia</option>
                                        <option value="101">Ethiopia</option>
                                        <option value="262">Falkland Islands (Malvinas)</option>
                                        <option value="241">Faroe Islands</option>
                                        <option value="234">Fiji</option>
                                        <option value="102">Finland</option>
                                        <option value="103">France</option>
                                        <option value="115">French Guiana</option>
                                        <option value="263">French Polynesia</option>
                                        <option value="264">French Southern Territories</option>
                                        <option value="104">Gabon</option>
                                        <option value="109">Gambia</option>
                                        <option value="106">Georgia</option>
                                        <option value="91">Germany</option>
                                        <option value="107">Ghana</option>
                                        <option value="226">Gibraltar</option>
                                        <option value="112">Greece</option>
                                        <option value="113">Greenland</option>
                                        <option value="245">Grenada</option>
                                        <option value="265">Guadeloupe</option>
                                        <option value="266">Guam</option>
                                        <option value="114">Guatemala</option>
                                        <option value="108">Guinea</option>
                                        <option value="110">Guinea-Bissau</option>
                                        <option value="116">Guyana</option>
                                        <option value="119">Haiti</option>
                                        <option value="267">Heard Island and McDonald Islands</option>
                                        <option value="268">Holy See (Vatican City State)</option>
                                        <option value="117">Honduras</option>
                                        <option value="219">Hong Kong</option>
                                        <option value="120">Hungary</option>
                                        <option value="126">Iceland</option>
                                        <option value="122">India</option>
                                        <option value="121">Indonesia</option>
                                        <option value="124">Iran</option>
                                        <option value="125">Iraq</option>
                                        <option value="123">Ireland</option>
                                        <option value="269">Isle of Man</option>
                                        <option value="127">Israel</option>
                                        <option value="128">Italy</option>
                                        <option value="83">Ivory Coast</option>
                                        <option value="129">Jamaica</option>
                                        <option value="131">Japan</option>
                                        <option value="130">Jordan</option>
                                        <option value="132">Kazakhstan</option>
                                        <option value="133">Kenya</option>
                                        <option value="270">Kiribati</option>
                                        <option value="271">Kosovo</option>
                                        <option value="137">Kuwait</option>
                                        <option value="134">Kyrgyzstan</option>
                                        <option value="138">Laos</option>
                                        <option value="146">Latvia</option>
                                        <option value="139">Lebanon</option>
                                        <option value="143">Lesotho</option>
                                        <option value="140">Liberia</option>
                                        <option value="141">Libya</option>
                                        <option value="272">Liechtenstein</option>
                                        <option value="144">Lithuania</option>
                                        <option value="145">Luxembourg</option>
                                        <option value="273">Macao</option>
                                        <option value="151">Macedonia</option>
                                        <option value="149">Madagascar</option>
                                        <option value="158">Malawi</option>
                                        <option value="159">Malaysia</option>
                                        <option value="238">Maldives</option>
                                        <option value="152">Mali</option>
                                        <option value="227">Malta</option>
                                        <option value="274">Marshall Islands</option>
                                        <option value="275">Martinique</option>
                                        <option value="157">Mauritania</option>
                                        <option value="239">Mauritius</option>
                                        <option value="276">Mayotte</option>
                                        <option value="150">Mexico</option>
                                        <option value="277">Micronesia, Federated States of</option>
                                        <option value="148">Moldova</option>
                                        <option value="278">Monaco</option>
                                        <option value="154">Mongolia</option>
                                        <option value="155">Montenegro</option>
                                        <option value="279">Montserrat</option>
                                        <option value="147">Morocco</option>
                                        <option value="156">Mozambique</option>
                                        <option value="153">Myanmar (Burma)</option>
                                        <option value="160">Namibia</option>
                                        <option value="280">Nauru</option>
                                        <option value="166">Nepal</option>
                                        <option value="243">Netherlands Antilles</option>
                                        <option value="233">New Caledonia</option>
                                        <option value="167">New Zealand</option>
                                        <option value="163">Nicaragua</option>
                                        <option value="161">Niger</option>
                                        <option value="162">Nigeria</option>
                                        <option value="281">Niue</option>
                                        <option value="282">Norfolk Island</option>
                                        <option value="283">Northern Mariana Islands</option>
                                        <option value="176">North Korea</option>
                                        <option value="165">Norway</option>
                                        <option value="168">Oman</option>
                                        <option value="169">Pakistan</option>
                                        <option value="284">Palau</option>
                                        <option value="285">Palestinian Territory, Occupied</option>
                                        <option value="170">Panama</option>
                                        <option value="173">Papua New Guinea</option>
                                        <option value="178">Paraguay</option>
                                        <option value="171">Peru</option>
                                        <option value="172">Philippines</option>
                                        <option value="174">Poland</option>
                                        <option value="177">Portugal</option>
                                        <option value="175">Puerto Rico</option>
                                        <option value="179">Qatar</option>
                                        <option value="304">Reunion</option>
                                        <option value="180">Romania</option>
                                        <option value="181">Russia</option>
                                        <option value="182">Rwanda</option>
                                        <option value="286">Saint Helena</option>
                                        <option value="287">Saint Kitts and Nevis</option>
                                        <option value="244">Saint Lucia</option>
                                        <option value="288">Saint Martin (French part)</option>
                                        <option value="289">Saint Pierre and Miquelon</option>
                                        <option value="249">Saint Vincent and the Grenadines</option>
                                        <option value="290">Samoa</option>
                                        <option value="291">San Marino</option>
                                        <option value="292">Sao Tome and Principe</option>
                                        <option value="183">Saudi Arabia</option>
                                        <option value="185">Senegal</option>
                                        <option value="189">Serbia</option>
                                        <option value="293">Seychelles</option>
                                        <option value="186">Sierra Leone</option>
                                        <option value="220">Singapore</option>
                                        <option value="337">Sint Maarten (Dutch part)</option>
                                        <option value="191">Slovakia</option>
                                        <option value="192">Slovenia</option>
                                        <option value="242">Solomon Islands</option>
                                        <option value="188">Somalia</option>
                                        <option value="215">South Africa</option>
                                        <option value="294">South Georgia and the South Sandwich Islands</option>
                                        <option value="136">South Korea</option>
                                        <option value="339">South Sudan</option>
                                        <option value="99">Spain</option>
                                        <option value="142">Sri Lanka</option>
                                        <option value="184">Sudan</option>
                                        <option value="190">Suriname</option>
                                        <option value="295">Svalbard and Jan Mayen</option>
                                        <option value="194">Swaziland</option>
                                        <option value="193">Sweden</option>
                                        <option value="80">Switzerland</option>
                                        <option value="195">Syria</option>
                                        <option value="204">Taiwan</option>
                                        <option value="199">Tajikistan</option>
                                        <option value="205">Tanzania</option>
                                        <option value="198">Thailand</option>
                                        <option value="164">The Netherlands</option>
                                        <option value="296">Timor-Leste</option>
                                        <option value="197">Togo</option>
                                        <option value="297">Tokelau</option>
                                        <option value="298">Tonga</option>
                                        <option value="201">Trinidad</option>
                                        <option value="202">Tunisia</option>
                                        <option value="203">Turkey</option>
                                        <option value="200">Turkmenistan</option>
                                        <option value="299">Turks and Caicos Islands</option>
                                        <option value="300">Tuvalu</option>
                                        <option value="206">Uganda</option>
                                        <option value="207">Ukraine</option>
                                        <option value="58">United Arab Emirates</option>
                                        <option value="105">United Kingdom</option>
                                        <option value="209">United States</option>
                                        <option value="302">United States Minor Outlying Islands</option>
                                        <option value="208">Uruguay</option>
                                        <option value="248">U.S. Virgin Islands</option>
                                        <option value="210">Uzbekistan</option>
                                        <option value="221">Vanuatu</option>
                                        <option value="211">Venezuela</option>
                                        <option value="212">Vietnam</option>
                                        <option value="224">Wallis and Futuna</option>
                                        <option value="213">Western Sahara</option>
                                        <option value="214">Yemen</option>
                                        <option value="216">Zaire (Democratic Republic of Congo)</option>
                                        <option value="217">Zambia</option>
                                        <option value="218">Zimbabwe</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="ship-to">
                                <label for="label-to">Ship To:</label>
                                <select name="ship_from_country">
                                    <option value="">Select a location...</option>
                                    <optgroup label="----------------">
                                        <option value="61">Australia</option>
                                        <option value="79">Canada</option>
                                        <option value="103">France</option>
                                        <option value="91">Germany</option>
                                        <option value="112">Greece</option>
                                        <option value="123">Ireland</option>
                                        <option value="128">Italy</option>
                                        <option value="131">Japan</option>
                                        <option value="167">New Zealand</option>
                                        <option value="177">Portugal</option>
                                        <option value="181">Russia</option>
                                        <option value="99">Spain</option>
                                        <option value="164">The Netherlands</option>
                                        <option value="105">United Kingdom</option>
                                        <option value="209">United States</option>
                                    </optgroup>
                                    <optgroup label="----------------">
                                        <option value="55">Afghanistan</option>
                                        <option value="57">Albania</option>
                                        <option value="95">Algeria</option>
                                        <option value="250">American Samoa</option>
                                        <option value="228">Andorra</option>
                                        <option value="56">Angola</option>
                                        <option value="251">Anguilla</option>
                                        <option value="252">Antigua and Barbuda</option>
                                        <option value="59">Argentina</option>
                                        <option value="60">Armenia</option>
                                        <option value="253">Aruba</option>
                                        <option value="61">Australia</option>
                                        <option value="62">Austria</option>
                                        <option value="63">Azerbaijan</option>
                                        <option value="229">Bahamas</option>
                                        <option value="232">Bahrain</option>
                                        <option value="68">Bangladesh</option>
                                        <option value="237">Barbados</option>
                                        <option value="71">Belarus</option>
                                        <option value="65">Belgium</option>
                                        <option value="72">Belize</option>
                                        <option value="66">Benin</option>
                                        <option value="225">Bermuda</option>
                                        <option value="76">Bhutan</option>
                                        <option value="73">Bolivia</option>
                                        <option value="70">Bosnia and Herzegovina</option>
                                        <option value="77">Botswana</option>
                                        <option value="254">Bouvet Island</option>
                                        <option value="74">Brazil</option>
                                        <option value="255">British Indian Ocean Territory</option>
                                        <option value="231">British Virgin Islands</option>
                                        <option value="75">Brunei</option>
                                        <option value="69">Bulgaria</option>
                                        <option value="67">Burkina Faso</option>
                                        <option value="64">Burundi</option>
                                        <option value="135">Cambodia</option>
                                        <option value="84">Cameroon</option>
                                        <option value="79">Canada</option>
                                        <option value="222">Cape Verde</option>
                                        <option value="247">Cayman Islands</option>
                                        <option value="78">Central African Republic</option>
                                        <option value="196">Chad</option>
                                        <option value="81">Chile</option>
                                        <option value="82">China</option>
                                        <option value="257">Christmas Island</option>
                                        <option value="258">Cocos (Keeling) Islands</option>
                                        <option value="86">Colombia</option>
                                        <option value="259">Comoros</option>
                                        <option value="85">Congo, Republic of</option>
                                        <option value="260">Cook Islands</option>
                                        <option value="87">Costa Rica</option>
                                        <option value="118">Croatia</option>
                                        <option value="88">Cuba</option>
                                        <option value="338">CuraÃ§ao</option>
                                        <option value="89">Cyprus</option>
                                        <option value="90">Czech Republic</option>
                                        <option value="93">Denmark</option>
                                        <option value="92">Djibouti</option>
                                        <option value="261">Dominica</option>
                                        <option value="94">Dominican Republic</option>
                                        <option value="96">Ecuador</option>
                                        <option value="97">Egypt</option>
                                        <option value="187">El Salvador</option>
                                        <option value="111">Equatorial Guinea</option>
                                        <option value="98">Eritrea</option>
                                        <option value="100">Estonia</option>
                                        <option value="101">Ethiopia</option>
                                        <option value="262">Falkland Islands (Malvinas)</option>
                                        <option value="241">Faroe Islands</option>
                                        <option value="234">Fiji</option>
                                        <option value="102">Finland</option>
                                        <option value="103">France</option>
                                        <option value="115">French Guiana</option>
                                        <option value="263">French Polynesia</option>
                                        <option value="264">French Southern Territories</option>
                                        <option value="104">Gabon</option>
                                        <option value="109">Gambia</option>
                                        <option value="106">Georgia</option>
                                        <option value="91">Germany</option>
                                        <option value="107">Ghana</option>
                                        <option value="226">Gibraltar</option>
                                        <option value="112">Greece</option>
                                        <option value="113">Greenland</option>
                                        <option value="245">Grenada</option>
                                        <option value="265">Guadeloupe</option>
                                        <option value="266">Guam</option>
                                        <option value="114">Guatemala</option>
                                        <option value="108">Guinea</option>
                                        <option value="110">Guinea-Bissau</option>
                                        <option value="116">Guyana</option>
                                        <option value="119">Haiti</option>
                                        <option value="267">Heard Island and McDonald Islands</option>
                                        <option value="268">Holy See (Vatican City State)</option>
                                        <option value="117">Honduras</option>
                                        <option value="219">Hong Kong</option>
                                        <option value="120">Hungary</option>
                                        <option value="126">Iceland</option>
                                        <option value="122">India</option>
                                        <option value="121">Indonesia</option>
                                        <option value="124">Iran</option>
                                        <option value="125">Iraq</option>
                                        <option value="123">Ireland</option>
                                        <option value="269">Isle of Man</option>
                                        <option value="127">Israel</option>
                                        <option value="128">Italy</option>
                                        <option value="83">Ivory Coast</option>
                                        <option value="129">Jamaica</option>
                                        <option value="131">Japan</option>
                                        <option value="130">Jordan</option>
                                        <option value="132">Kazakhstan</option>
                                        <option value="133">Kenya</option>
                                        <option value="270">Kiribati</option>
                                        <option value="271">Kosovo</option>
                                        <option value="137">Kuwait</option>
                                        <option value="134">Kyrgyzstan</option>
                                        <option value="138">Laos</option>
                                        <option value="146">Latvia</option>
                                        <option value="139">Lebanon</option>
                                        <option value="143">Lesotho</option>
                                        <option value="140">Liberia</option>
                                        <option value="141">Libya</option>
                                        <option value="272">Liechtenstein</option>
                                        <option value="144">Lithuania</option>
                                        <option value="145">Luxembourg</option>
                                        <option value="273">Macao</option>
                                        <option value="151">Macedonia</option>
                                        <option value="149">Madagascar</option>
                                        <option value="158">Malawi</option>
                                        <option value="159">Malaysia</option>
                                        <option value="238">Maldives</option>
                                        <option value="152">Mali</option>
                                        <option value="227">Malta</option>
                                        <option value="274">Marshall Islands</option>
                                        <option value="275">Martinique</option>
                                        <option value="157">Mauritania</option>
                                        <option value="239">Mauritius</option>
                                        <option value="276">Mayotte</option>
                                        <option value="150">Mexico</option>
                                        <option value="277">Micronesia, Federated States of</option>
                                        <option value="148">Moldova</option>
                                        <option value="278">Monaco</option>
                                        <option value="154">Mongolia</option>
                                        <option value="155">Montenegro</option>
                                        <option value="279">Montserrat</option>
                                        <option value="147">Morocco</option>
                                        <option value="156">Mozambique</option>
                                        <option value="153">Myanmar (Burma)</option>
                                        <option value="160">Namibia</option>
                                        <option value="280">Nauru</option>
                                        <option value="166">Nepal</option>
                                        <option value="243">Netherlands Antilles</option>
                                        <option value="233">New Caledonia</option>
                                        <option value="167">New Zealand</option>
                                        <option value="163">Nicaragua</option>
                                        <option value="161">Niger</option>
                                        <option value="162">Nigeria</option>
                                        <option value="281">Niue</option>
                                        <option value="282">Norfolk Island</option>
                                        <option value="283">Northern Mariana Islands</option>
                                        <option value="176">North Korea</option>
                                        <option value="165">Norway</option>
                                        <option value="168">Oman</option>
                                        <option value="169">Pakistan</option>
                                        <option value="284">Palau</option>
                                        <option value="285">Palestinian Territory, Occupied</option>
                                        <option value="170">Panama</option>
                                        <option value="173">Papua New Guinea</option>
                                        <option value="178">Paraguay</option>
                                        <option value="171">Peru</option>
                                        <option value="172">Philippines</option>
                                        <option value="174">Poland</option>
                                        <option value="177">Portugal</option>
                                        <option value="175">Puerto Rico</option>
                                        <option value="179">Qatar</option>
                                        <option value="304">Reunion</option>
                                        <option value="180">Romania</option>
                                        <option value="181">Russia</option>
                                        <option value="182">Rwanda</option>
                                        <option value="286">Saint Helena</option>
                                        <option value="287">Saint Kitts and Nevis</option>
                                        <option value="244">Saint Lucia</option>
                                        <option value="288">Saint Martin (French part)</option>
                                        <option value="289">Saint Pierre and Miquelon</option>
                                        <option value="249">Saint Vincent and the Grenadines</option>
                                        <option value="290">Samoa</option>
                                        <option value="291">San Marino</option>
                                        <option value="292">Sao Tome and Principe</option>
                                        <option value="183">Saudi Arabia</option>
                                        <option value="185">Senegal</option>
                                        <option value="189">Serbia</option>
                                        <option value="293">Seychelles</option>
                                        <option value="186">Sierra Leone</option>
                                        <option value="220">Singapore</option>
                                        <option value="337">Sint Maarten (Dutch part)</option>
                                        <option value="191">Slovakia</option>
                                        <option value="192">Slovenia</option>
                                        <option value="242">Solomon Islands</option>
                                        <option value="188">Somalia</option>
                                        <option value="215">South Africa</option>
                                        <option value="294">South Georgia and the South Sandwich Islands</option>
                                        <option value="136">South Korea</option>
                                        <option value="339">South Sudan</option>
                                        <option value="99">Spain</option>
                                        <option value="142">Sri Lanka</option>
                                        <option value="184">Sudan</option>
                                        <option value="190">Suriname</option>
                                        <option value="295">Svalbard and Jan Mayen</option>
                                        <option value="194">Swaziland</option>
                                        <option value="193">Sweden</option>
                                        <option value="80">Switzerland</option>
                                        <option value="195">Syria</option>
                                        <option value="204">Taiwan</option>
                                        <option value="199">Tajikistan</option>
                                        <option value="205">Tanzania</option>
                                        <option value="198">Thailand</option>
                                        <option value="164">The Netherlands</option>
                                        <option value="296">Timor-Leste</option>
                                        <option value="197">Togo</option>
                                        <option value="297">Tokelau</option>
                                        <option value="298">Tonga</option>
                                        <option value="201">Trinidad</option>
                                        <option value="202">Tunisia</option>
                                        <option value="203">Turkey</option>
                                        <option value="200">Turkmenistan</option>
                                        <option value="299">Turks and Caicos Islands</option>
                                        <option value="300">Tuvalu</option>
                                        <option value="206">Uganda</option>
                                        <option value="207">Ukraine</option>
                                        <option value="58">United Arab Emirates</option>
                                        <option value="105">United Kingdom</option>
                                        <option value="209">United States</option>
                                        <option value="302">United States Minor Outlying Islands</option>
                                        <option value="208">Uruguay</option>
                                        <option value="248">U.S. Virgin Islands</option>
                                        <option value="210">Uzbekistan</option>
                                        <option value="221">Vanuatu</option>
                                        <option value="211">Venezuela</option>
                                        <option value="212">Vietnam</option>
                                        <option value="224">Wallis and Futuna</option>
                                        <option value="213">Western Sahara</option>
                                        <option value="214">Yemen</option>
                                        <option value="216">Zaire (Democratic Republic of Congo)</option>
                                        <option value="217">Zambia</option>
                                        <option value="218">Zimbabwe</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="shipping-by">
                                <label for="shipping-by">Shipping By:</label>
                                <input type="text" name="company_name">
                            </div>


                            <input type="submit" value="Submit" class="btn btn-info">

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

        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        {{ HTML::script('js/bootstrap.min.js')}}

      <!--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->

            <script>
                $(document).ready(function(){


                    var new_room_type_link = "{{ URL::to('add_category') }}";

                    $('body').on('submit','#add_category',function(e){

                        e.preventDefault();
                        //alert($('#new_user_group_from').serialize());

                        var fd = new FormData();
                        //find files for send
                       // var file_data = $('input[type="file"]')[0].files; // for multiple files
                        //found files added to formdata
                       /* for(var i = 0;i<file_data.length;i++){
                           fd.append("images[]", file_data[i]);
                        }
                       */ //other data without file added to formdata
                        var other_data = $('form').serializeArray();
                        $.each(other_data,function(key,input){
                            fd.append(input.name,input.value);
                        });

                        
                        $('#ajax_loader').show();
                        $.ajax({
                            
                            /*type: "POST",
                            url: new_room_type_link,
                            data: fd,           
                            cache: false,*/

                           url: new_room_type_link,
                           data: fd,
                           contentType: false,
                           processData: false,
                           type: 'POST',
                           
                           success: function(data)
                            {   

                                $('#ajax_loader').hide();
                                $('.category_title_area').append('<a id="view_subcat" style="cursor: pointer;"><span style="margin-right: 5px;" title="View Sub-category" class="fa fa-angle-right">'+
                                             
                                            data+'</span></a>');
                                //if(data == '1'){
                                    /*$('#message').html("Successfully Added").removeClass('alert alert-danger').addClass('alert alert-success');
                                    $('input:text').val('');*/
                                    /*
                                }else{
                                    $('#message').html(data).removeClass('alert alert-success').addClass('alert alert-danger');
                                }
                                $('html, body').animate({scrollTop:0}, 'slow');*/
                            }
                        }); 

                    });
                    
                    //end of first time user list
                });
            </script>

    </body>
</html>