<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Result | youbuy24</title>


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
                    <form class="navbar-form" role="search" method="get" action="{{ URL::to('search_result') }}">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="q">
                            <select class="form-control">
                                <option selected value="">All Country</option>
                                
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
                Search Resut for <b>{{ $search_string }}</b>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="col-md-12 setting_page_content">
            <div class="store-content-area">
                
                <div class="store-item-area">
                    <div class="col-md-12"> 
                    @if(!empty($results))
                        @foreach($results as $res)
                            <div class="col-md-12 fullwidth-cart">  
                                <div class="item master-item">
                                    <a href="">
                                        <img width="170" height="135" alt="{{ $res->name }}" src="{{ $res->image }}">
                                    </a>
                                    <div class="item-details">

                                               <div class="product_name"><span>{{ $res->name }}</span> -THB 50</div>

                                               <div class="store_link"><a style="color:grey;" href="{{ URL::to($res->category->store->store_name) }}">{{ URL::to($res->category->store->store_name) }}</a></div>

                                               <div class="details">
                                                    {{ $res->description }}
                                                </div>
                                                <input type="hidden" value="1" name="has_variations">
                                               
                                    </div>
                                        

                                    </div>



                                </div>
                            @endforeach
                            {{ $results->links() }}
                    @else
                        No Result Found
                    @endif

                   <!--          <div class="col-md-12 fullwidth-cart">  
                       <div class="item master-item">
                           <a href="">
                               <img width="170" height="135" alt="Colorful Geometric Pillow Cover in Lime Green, Teal, Brown, Gray, Brown, Fuchsia, Pink / Geometric Cushion Cover / Chevron Pillow / 18x18" src="https://img0.etsystatic.com/051/0/7854494/il_170x135.675819484_mwv4.jpg">
                           </a>
                           <div class="item-details">
                   
                                  <div class="product_name"><span>Product Name</span> -THB 50</div>
                   
                                  <div class="store_link"><a href="#">http://youbuy24.com/storename</a></div>
                   
                                  <div class="details">
                                       Colorful Geometric Pillow Cover in Lime Green
                                   </div>
                                   <input type="hidden" value="1" name="has_variations">
                                  
                   
                               </div>
                            </div>
                       </div> -->


                            </div>

                              <div class="clearfix"></div>

                            </div>
                        </section>
                        <b>Shops</b>: 
                        <?php 
                            $per_column1 = $per_column2 = $per_column3 = floor(count($stores)/3); 
                            if(count($stores) % 3 == 1 ) $per_column1 += 1;
                            else if(count($stores) % 3 == 2 ) { $per_column1 +=1;$per_column2 +=1;}
                            //echo $per_column1.'--'.$per_column2.'--'.$per_column3; 
                            //exit;*/
                        ?>
                        @if(count($stores)>0)
                        <div style="height:50px; width:100%;">
                            
                            <div style="width:32%;border-right:1px solid grey;float:left;padding-left:15px;">
                                @for($i = 0; $i < $per_column1 ; $i++)
                                    @if(isset($stores[$i]->store_name)) <a style="color:#049CD6;" href="{{ URL::to($stores[$i]->store_name) }}">{{ $stores[$i]->store_name }}</a><br /> @endif
                                @endfor
                            </div>
                             <div style="width:32%;border-right:1px solid grey;float:left;padding-left:15px;">
                                @for($i = $per_column1; $i < $per_column1+$per_column2; $i++)
                                   @if(isset($stores[$i]->store_name)) <a style="color:#049CD6;" href="{{ URL::to($stores[$i]->store_name) }}">{{ $stores[$i]->store_name }}</a> @endif
                                @endfor
                            </div>
                            <div style="width:32%;float:left;padding-left:15px;">
                                @for($i = $per_column1+$per_column2; $i < count($stores); $i++)
                                    @if(isset($stores[$i]->store_name)) <a style="color:#049CD6;" href="{{ URL::to($stores[$i]->store_name) }}">{{ $stores[$i]->store_name }}</a> @endif
                                @endfor
                            </div>
                          
                            <br style="clear:both;">
                        </div>
                        @else
                            No Shop Found
                        @endif

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