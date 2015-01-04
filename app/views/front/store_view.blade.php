@if(count($product_list)>0)
	<?php $pro_view =  Session::get('pro_view'); ?>
	<div class="product-grid-view" @if($pro_view == 'list') {{ 'style="display:none;"'}} @endif>
			@foreach($product_list as $product)
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
	                    <a href="#"><img src="{{ $product->image }}" alt="{{ $product->name }}" title="{{ $product->name }}"></a>

	                </div>
	                <div class="product-title">
	                    <a href="#">{{ $product->name }}</a>
	                </div>
	            </div>
	            <div class="product-price">
	                TBH {{ $product->price }}
	            </div>
	        </div>
			@endforeach
		</div>
	
	<div class="product-list-view" @if($pro_view == 'grid')) {{ 'style="display:none;"'}} @endif>
		@foreach($product_list as $product)
            <div class="product-list">
                <div class="product-list-image">
                    <a href="#"><img src="{{ $product->image }}" alt="{{ $product->name }}" title="{{ $product->name }}"></a>
                </div>
                <div class="product-list-description">
                    <a href="#">{{ $product->name }}</a><br>
                    By TreeChild
                </div>
                <div class="product-list-viewer">
                    25 views
                </div>
                <div class="product-list-review-time">
                    1 hour ago
                </div>
                <div class="product-list-price">
                    <span>TBH {{ $product->price }}</span>
                    <div class="add-wishlist">
                        <a onclick=""><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="remove-btn">
                        <a onclick=""><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            @endforeach
        </div>
  
        <!--2nd product-->
        <!-- <div class="product-grid">
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
        
        3rd product
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
        
        4th product
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
        
        5th product
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
        </div> -->

    <!-- </div> --><!-- .product-grid-view -->
    <!-- <div class="product-list-view">
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
                        </div>.product-list
    
                        2nd product
    
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
                        </div>.product-list
    
                        3rd product
    
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
                        </div>.product-list
                    </div>.product-list-view
                    ================End of product list view ====================== -->
    {{ $product_list->links() }}
@else
    {{ 'No product found' }}
@endif