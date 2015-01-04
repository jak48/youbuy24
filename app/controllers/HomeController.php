<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/*public function showWelcome()
	{
		return View::make('hello');
	}*/

	public function home(){
			function getRandomWord($len = 5) {
			    $word = array_merge(range('0', '9'), range('A', 'Z'));
			    shuffle($word);
			    return substr(implode($word), 0, $len);
			}

			$ranStr = getRandomWord();
			//$_SESSION["vercode"] = $ranStr;
			Session::put('vercode', $ranStr);
			/*echo $_SESSION["vercode"];*/
			return View::make('front.index')
			->with('title','Home Page');
		}

	public function register(){

		$validator = Validator::make(
			array(
				'shop_name' => Input::get('shop_name'),
				'email' => Input::get('email'),
				'password' => Input::get('pass'),
				'password_confirmation' => Input::get('pass_confirmation'),
				'captcha' => Input::get('captcha')
				),
			array(
				'shop_name' => 'required|min:3|"',
				'email' => 'required|email',
				'password' => 'required|min:10|confirmed',
				'password_confirmation' => 'required',
				'captcha'  => 'required'
				)
			);

			if(Session::get('vercode') != Input::get('captcha')){
				echo "Wrong Captcha";
				exit;
			}

		if($validator->fails()){
			if(!empty($validator->messages()->getMessages()['shop_name'])) echo $validator->messages()->getMessages()['shop_name'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['email'])) echo $validator->messages()->getMessages()['email'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['password'])) echo $validator->messages()->getMessages()['password'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['captcha'])) echo $validator->messages()->getMessages()['captcha'][0]."<br />";
		}else{
			$check_store = DB::table('store')->where('store_name','=', Input::get('shop_name'))->get();
			if(!empty($check_store)){
				echo "This store already exist";
				exit;
			}

			$security_code = md5(time());
			if(DB::table('store')->insert(array('email'=>Input::get('email'),'password'=>md5(Input::get('pass')),'store_name'=>Input::get('shop_name'),'security_code'=>$security_code,'created_at'=>date('Y-m-d'),'status'=>0 ))) 
				{
					$last_id = DB::select(DB::raw('SELECT LAST_INSERT_ID() as last_id'));
					$last_id = $last_id[0]->last_id;
					App::error(function(Exception $exception, $code)
					{
						Mail::send('emails.register', array('click_url' => URL::to('register_confirm/'.$last_id.'/'.$security_code), 'name'=>Input::get('shop_name')), function($message)
						{
						    $message->to(Input::get('email'), Input::get('shop_name'))->subject('Welcome to Youbuy24');
						});
					Log::error($exception);
					});

					echo "1";
				}
			//else echo "Problem in inserting";
						
			/*Mail::send('emails.register', array('click_url' => URL::to('register_confirm/'.$last_id.'/'.$security_code), 'name'=>Input::get('shop_name')), function($message)
			{
			    $message->to(Input::get('email'), Input::get('shop_name'))->subject('Welcome to Youbuy24');
			});*/
		}
	}

	public function captcha(){

		function getRandomWord($len = 5) {
			    $word = array_merge(range('0', '9'), range('A', 'Z'));
			    shuffle($word);
			    return substr(implode($word), 0, $len);
			}

			$ranStr = getRandomWord();
			//$_SESSION["vercode"] = $ranStr;
			Session::put('vercode', $ranStr);
			/*echo $_SESSION["vercode"];*/
	}

	public function setImage(){
			$height = 35; //CAPTCHA image height
			$width = 150; //CAPTCHA image width
			$font_size = 24; 

			$image_p = imagecreate($width, $height);
			$graybg = imagecolorallocate($image_p, 245, 245, 245);
			$textcolor = imagecolorallocate($image_p, 34, 34, 34);
			imagefttext($image_p, $font_size, -2, 15, 26, $textcolor, 'fonts/mono.ttf', Session::get('vercode'));
			//imagestring($image_p, $font_size, 5, 3, $ranStr, $white);
			imagepng($image_p);
		}

	public function register_confirm(){
		$user_id = Request::segment(2);
		$security_code = Request::segment(3);
		// echo $user_id."<br />";
		// echo $security_code; exit;
		$user_info = DB::table('store')->where('id','=',$user_id)->where('security_code','=',$security_code)->get();
		//print_r($user_info); exit;
		if(!empty($user_info)){
			DB::table('store')->where('id','=',$user_id)->update(array('status'=>'1','security_code'=>''));
			return Redirect::to('home')->with('success','You have successfully registered, Thanks');
		}else{
			return Redirect::to('home')->with('error','This url is invalid');
		}
	}

	public function login(){
		$validator = Validator::make(
			array(
				'email' => Input::get('username'),
				'password' => Input::get('password')
				),
			array(
				'email' => 'required|email',
				'password' => 'required|min:5',
				)
			);

		if($validator->fails()){
			if(!empty($validator->messages()->getMessages()['email'])) echo $validator->messages()->getMessages()['email'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['password'])) echo $validator->messages()->getMessages()['password'][0]."<br />";
		}else{
			$user_info = DB::table('store')->where('email','=',Input::get('username'))->where('password','=',md5(Input::get('password')))->get();
			//echo "<pre>";print_r($user_info); echo "</pre>"; exit;
			if(!empty($user_info)){
				Session::put('isLoggedIn',true);
				Session::put('store_id',$user_info[0]->id);
				$data['success'] = 1;
				$data['store_name'] = $user_info[0]->store_name;
				echo json_encode($data);
				//echo "1";
			}else{ 
				$data['success'] = 0;
				$data['store_name'] = "";
				echo json_encode($data);
				//echo "Email or Password is incorrect";
			}
		}
	}

	public function store(){
		$store_name = Request::segment(1); //echo $store_name; exit;
		if(!empty($store_name)){
			$store_name = implode(' ',explode('-',$store_name));
			$store = DB::table('store')->where('store_name','=',$store_name)->select('id')->first();
			$store_id = $store->id;
		}else{
			$store_id = Session::get('store_id');
		}
		$countries = DB::table('country')->get();
		//echo $store_id; exit;
		$store_info = DB::table('store')->where('id','=',$store_id)->first();
		return View::make('front.store',array('store_id'=>$store_id,'store_info'=>$store_info,'countries'=>$countries))->with('title','My Store');
	}

	public function store_view(){
		//$store_id = Input::get('store_id');
		$store_id = Request::segment(2);
		$category_id = Request::segment(3);
		$sort_order = Request::segment(4);
		
		if(empty($store_id)) {
			$store_id = Session::get('store_id');
		}
		$view_value = Session::get('pro_view');
		if(empty($view_value)){
			Session::put('pro_view', 'list');	
		}
		$per_page = 1;
		/*if(Input::has('category_id')){
			$url = $url ."/".$;
		}*/

		//$product_list->setBaseUrl('');
		$product_list = DB::table('product')->leftJoin('category','category.id','=','product.category_id')->where('category.store_id','=',$store_id);
		if($category_id > 0) {
			$product_list = $product_list->where('product.category_id','=',$category_id)->orWhere('category.parent_id','=',$category_id);
		}
		if($sort_order == 'z2a'){
			$product_list = $product_list->orderBy('product.name','desc')->paginate($per_page);
		}elseif($sort_order == 'a2z'){
			$product_list = $product_list->orderBy('product.name','asc')->paginate($per_page);
		}elseif($sort_order == 'pl2h'){
			$product_list = $product_list->orderBy('product.price','desc')->paginate($per_page);
		}elseif($sort_order == 'ph2l'){
			$product_list = $product_list->orderBy('product.price','asc')->paginate($per_page);
		}else{
			$product_list = $product_list->paginate($per_page);
		}
		
		//echo $product_list; exit;
		return View::make('front.store_view',array('product_list'=>$product_list));
	}

	public function add_category(){
		$flag = Request::segment(2);
		$store_id = Input::get('store_id');
		if(empty($store_id)) {
			$store_id = Session::get('store_id');
		}
		$submit = Input::get('submit'); 
		if(!empty($submit) && $submit == 'add_category'){
			$check_info = DB::table('category')->where('store_id','=', $store_id)->where('category_name','=',Input::get('category_name'))->get();
			if(!empty($check_info)){
				echo "1"; exit;
			}else{
				DB::table('category')->insert(array('category_name'=>Input::get('category_name'),'store_id'=>$store_id,'parent_id'=>0));
			}
		}

		if(!empty($submit) && $submit == 'add_subcategory'){
			//print_r(Input::all()); exit;
			$check_info = DB::table('category')->where('store_id','=',$store_id)->where('category_name','=',Input::get('category_name'))->where('parent_id','=',Input::get('category_id'))->get();
			if(!empty($check_info)){
				echo "1"; exit;
			}else{
				DB::table('category')->insert(array('category_name'=>Input::get('category_name'),'store_id'=>$store_id,'parent_id'=>Input::get('category_id')));
			}
		}

		if(!empty($flag)){
			$category_list = DB::table('category')->where('store_id','=',$store_id)->where('parent_id','=','0')->orderBy('category_name','desc')->get();
		}else{
			$category_list = DB::table('category')->where('store_id','=',$store_id)->where('parent_id','=','0')->orderBy('category_name')->get();
		}
		
		$sub_cat_list = array();
		foreach($category_list as $cat){
			$sub_cat_list[$cat->category_name] = DB::table('category')->where('parent_id','=',$cat->id)->get();
			//print_r($sub_cat_list[$cat->category_name]); exit;
		}
		return View::make('front.category_view',array('category_list'=>$category_list,'sub_cat_list'=>$sub_cat_list,'store_id'=>$store_id));
	}

	public function delete_category(){
		$category_id = Request::segment(2);
		$password = Request::segment(3);
		$store_info = DB::table('store')->where('id','=',Session::get('store_id'))->first();
		if($store_info->password == md5($password)){
			$check_pro_cat_subcat = DB::table('product')->leftJoin('category','category.id','=','product.category_id')->where('category.id','=',$category_id)->orWhere('category.parent_id','=',$category_id)->get();
			if(!empty($check_pro_cat_subcat)){
				echo "3";exit;
			}
			try{	
				DB::table('category')->where('id','=',$category_id)->orWhere('parent_id','=',$category_id)->delete();
				$category_list = DB::table('category')->where('store_id','=',Session::get('store_id'))->where('parent_id','=','0')->get();
				$sub_cat_list = array();
				foreach($category_list as $cat){
					$sub_cat_list[$cat->category_name] = DB::table('category')->where('parent_id','=',$cat->id)->get();
					//print_r($sub_cat_list[$cat->category_name]); exit;
				}
				return View::make('front.category_view',array('category_list'=>$category_list,'sub_cat_list'=>$sub_cat_list));
			}catch(\Exception $e){
				echo "1";
			}
		}else{
			echo "2";
		}	
			
	}

	public function logout(){
		Session::forget('isLoggedIn');
		Session::forget('store_id');
		return Redirect::to('home');
	}

	public function category_list(){
		$store_id = Input::get('store_id');
		if(empty($store_id)) {
			$store_id = Session::get('store_id');
		}
		$categories = DB::table('category')->where('store_id','=',$store_id)->where('parent_id','=',0)->select('id','category_name')->get();
		
		//print_r($categories);
		$content = "<option value=''>Select</option>";
		if(!empty($categories))
        $content .= "<optgroup label='----------------------------'></optgroup>";                                
                                       
		foreach($categories as $cat){
			$content .= "<option class='range-1-1' value='".$cat->id."'>".$cat->category_name."</option>";
		}
		echo $content;
	}

	public function subcategory_list(){
		$category_id = Input::get('category_id');
		$subcategories = DB::table('category')->where('parent_id','=',$category_id)->select('id','category_name')->get();
		
		//print_r($categories);
		$content = "<option value=''>Select</option>";
		if(!empty($subcategories))
        $content .= "<optgroup label='----------------------------'></optgroup>";                                
                                       
		foreach($subcategories as $cat){
			$content .= "<option class='range-1-1' value='".$cat->id."'>".$cat->category_name."</option>";
		}
		echo $content;
	}

	public function add_product(){
		//echo "<pre>";print_r(Input::all());echo "</pre>"; exit;
		$validator = Validator::make(
			array(
				'product_name' => Input::get('product_name'),
				'image_path' => Input::get('image_path'),
				'image_path1' => Input::get('image_path1'),
				'image_path2' => Input::get('image_path2'),
				'image_path3' => Input::get('image_path3'),
				'image_path4' => Input::get('image_path4'),
				'product_description'=> Input::get('product_description'),
				'product_price'=>Input::get('product_price'),
				'category' => Input::get('product_category'),
				'subcategory'=>Input::get('product_subcategory')
				),
			array(
				'product_name' => 'required',
				'image_path' => 'required|url',
				'image_path1' => 'url',
				'image_path2' => 'url',
				'image_path3' => 'url',
				'image_path4' => 'url',
				'product_description'=> 'required|min:10',
				'product_price'=>'required|numeric',
				'category' => 'required|numeric',
				'subcategory'=>'numeric'
				)
			);

		if($validator->fails()){
			if(!empty($validator->messages()->getMessages()['product_name'])) echo $validator->messages()->getMessages()['product_name'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['image_path'])) echo $validator->messages()->getMessages()['image_path'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['product_description'])) echo $validator->messages()->getMessages()['product_description'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['product_price'])) echo $validator->messages()->getMessages()['product_price'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['category'])) echo $validator->messages()->getMessages()['category'][0]."<br />";
		}else{
			
			if(!empty(Input::get('product_subcategory'))){
				$category_id = Input::get('product_subcategory');
			}else{
				$category_id = Input::get('product_category');
			}
			
			$last_id = DB::table('product')->insertGetId(array('name'=>Input::get('product_name'),'category_id'=>$category_id, 'description'=>Input::get('product_description'),'image'=>Input::get('image_path'),'price'=>Input::get('product_price'),'created_at'=>date('Y-m-d'),'status'=>1));
			if($last_id){
				if(Input::has('image_path1')) {
					DB::table('product_more_image')->insert(array('product_id'=>$last_id,'image'=>Input::get('image_path1')));
				}
				if(Input::has('image_path2')) {
					DB::table('product_more_image')->insert(array('product_id'=>$last_id,'image'=>Input::get('image_path2')));
				}
				if(Input::has('image_path3')) {
					DB::table('product_more_image')->insert(array('product_id'=>$last_id,'image'=>Input::get('image_path3')));
				}
				if(Input::has('image_path4')) {
					DB::table('product_more_image')->insert(array('product_id'=>$last_id,'image'=>Input::get('image_path4')));
				}
				echo "1";
			}else{
				echo "Database Problem";
			}
		}
	}

	public function view_change(){
		$pro_view = Request::segment(2);
		Session::forget('pro_view');
		Session::put('pro_view',$pro_view);
	}

	public function edit_category(){
		$category_id = Input::get('category_id');
		$category_name = Input::get('category_name');
		DB::table('category')->where('id','=',$category_id)->update(array('category_name'=>$category_name));
		return Redirect::to('add_category');
	}

	public function forget_pass_mail(){
		$validator = Validator::make(
			array('email' => Input::get('email')),
			array('email' => 'required|email'));

		if($validator->fails()){
			if(!empty($validator->messages()->getMessages()['email'])) echo $validator->messages()->getMessages()['email'][0]."<br />";
		}else{
			$login_info = DB::table('store')->where('email','=',Input::get('email'))->get();
			if(empty($login_info)){
				echo "Email Does not exist";
				exit;
			}
			$security_code = md5(time());
			DB::table('store')->where('email','=', $login_info[0]->email)->update(array('security_code'=>$security_code));
			$set_url = URL::to('set_password/'.$login_info[0]->id.'/'.$security_code);

			echo $set_url;
			/*Mail::send('emails.register', array('click_url' => URL::to('register_confirm/'.$last_id.'/'.$security_code), 'name'=>Input::get('shop_name')), function($message)
			{
			    $message->to(Input::get('email'), Input::get('shop_name'))->subject('Welcome to Youbuy24');
			});*/
		}

	}

	public function set_password(){
		$store_id = Request::segment(2);
		$security_code = Request::segment(3);
		$check = DB::table('store')->where('id','=',$store_id)->where('security_code','=',$security_code)->get();
		if(empty($check)){
			Redirect::to('home')->with('error','Invalid URL');
		}else{
			Session::put('store_id_reset_password',$store_id);
			Redirect::to('home')->with('set_password','set_password');
		}		
	}

	public function reset_password(){
		$validator = Validator::make(
			array('new_password' => Input::get('new_password')),
			array('new_password' => 'required|confirmed'));

		if($validator->fails()){
			if(!empty($validator->messages()->getMessages()['new_password'])) echo $validator->messages()->getMessages()['new_password'][0]."<br />";
		}else{
			try{
			DB::table('store')->where('id','=',Session::get('store_id_reset_password'))->update(array('password'=>md5(Input::get('new_password')), 'security_code'=>"" ));
			Session::forget('store_id_reset_password');
			echo "1";
			}
			catch(\Exception $e){
				echo "Error Occured";
			}
		}
	}

	public function pro_pic_up(){
		$picture = Input::get('picture');

		$validator = Validator::make(
			array('email' => $picture),
			array('email' => 'required|url')
			);
		if($validator->fails()){
			echo "1";
		}else{
			if (false === file_get_contents($picture,0,null,0,1)) {
			    echo "2"; exit;
			}else{
				DB::table('store')->where('id','=',Session::get('store_id'))->update(array('profile_pic'=>$picture));
			}

		}

	}

	public function cover_pic_up(){
		$picture = Input::get('picture');

		$validator = Validator::make(
			array('email' => $picture),
			array('email' => 'required|url')
			);
		if($validator->fails()){
			echo "1";
		}else{
			if (false === file_get_contents($picture,0,null,0,1)) {
			    echo "2"; exit;
			}else{
				DB::table('store')->where('id','=',Session::get('store_id'))->update(array('cover_pic'=>$picture));
			}

		}

	}

	public function search(){
		$search_string = Input::get('q');
		if(empty($search_string)) {
			$search_string = Request::segment(2);
		}
		$per_page = 1;
		//echo $search_string; exit;
		$results = Product::where('name','like','%'.$search_string.'%')->paginate($per_page);
		$results->setBaseUrl(URL::to('search_result/'.$search_string));
		$stores = Store::where('store_name','like','%'.$search_string.'%')->get();
		//echo "<pre>";print_r($results);echo "</pre>"; exit;
		return View::make('front.search_result',array('results'=>$results,'stores'=>$stores,'search_string'=>$search_string));
	}

	/*Shop check by rinku*/
	public function shop_check(){
		  $shop_name = Input::get('storename');
		  $check_shop = DB::table('store')->where('store_name', '=', $shop_name)->get();

		  //echo '<pre>'; print_r($check_shop);

		  if(count($check_shop)>0){
		   echo 'Shopname already exists. Try with a new name.';
		  }
		 }


	public function settings(){
		$countries = DB::table('country')->get();
		$products  = DB::table('store')
            ->join('category', 'store.id', '=', 'category.store_id')
            ->join('product', 'category.id', '=', 'product.category_id')
            ->select('product.id', 'product.name', 'product.image', 'product.image')
            ->get();


        //echo '<pre>'; print_r($products);exit;
		return View::make('front.settings',array('countries'=>$countries, 'products'=> $products))->with('title', 'Settings Page');
	}

	public function shop_profile(){
		$store_id = Session::get('store_id');
		$countries = DB::table('country')->get();
		
		return View::make('front.shop_profile',array('store_id'=>$store_id,'countries'=>$countries))->with('title', 'Settings Page');
	}

	public function edit_shop_profile(){
		$store_id = Request::segment(2);
		$payment_methods = Input::get('payment_method');

		$validator = Validator::make(
			array(
				'store_name' 		  => Input::get('shop_name'),
				'current_password' 	  => Input::get('current_password'),
				'profile_image' 	  => Input::get('profile_image'),
				'cover_picture' 	  => Input::get('cover_image'),
				'store_details' 	  => Input::get('detail_about'),
				'payment_method_name' => Input::get('payment_method'),
				'additional_info' 	  => Input::get('additional_information'),
				'shipping_policy' 	  => Input::get('shipping_policy'),
				'refund_exchange'	  => Input::get('refunds_exchanges')
				),
			array(
				'store_name' 			=> 'required',
				'current_password' 		=> 'required',
				'profile_image' 		=> 'url',
				'cover_picture' 		=> 'url',
				'store_details' 		=> 'required',
				'payment_method_name' 	=> 'required',
				'additional_info' 		=> 'required|min:10',
				'shipping_policy' 		=> 'required',
				'refund_exchange'   	=> 'required'
				)
			);

		if($validator->fails()){
			if(!empty($validator->messages()->getMessages()['store_name'])) echo $validator->messages()->getMessages()['store_name'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['current_password'])) echo $validator->messages()->getMessages()['current_password'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['profile_image'])) echo $validator->messages()->getMessages()['profile_image'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['cover_picture'])) echo $validator->messages()->getMessages()['cover_picture'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['store_details'])) echo $validator->messages()->getMessages()['store_details'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['payment_method_name'])) echo $validator->messages()->getMessages()['payment_method_name'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['additional_info'])) echo $validator->messages()->getMessages()['additional_info'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['refund_exchange'])) echo $validator->messages()->getMessages()['refund_exchange'][0]."<br />";
		}else{
			//echo '<pre>';print_r($_POST);


			$password = DB::table('store')->where('id', '=', $store_id)->where('password','=',md5(Input::get('current_password')))->get();
			
			if(count($password)>0){
				$update_store = DB::table('store')->where('id','=', $store_id)->update(
				    array(
						'store_name' 		=> Input::get('shop_name'),
						'profile_pic' 	=> Input::get('profile_image'),
						'cover_pic' 	=> Input::get('cover_image'),
						'store_details' 	=> Input::get('detail_about'),
						'additional_info' 	=> Input::get('additional_information'),
						'refund_exchange'	=> Input::get('refunds_exchanges')
						
						));

				if($update_store){
					$payment_info = DB::table('store_payment_method')->where('store_id', '=', $store_id)->get();

					if(count($payment_info) > 0){
						if(is_array($payment_methods)){
							for($i=0; $i<count($payment_methods); $i++) {
								DB::table('store_payment_method')->where('store_id', '=', $store_id)->update(
									array(
										'payment_method_name' =>$payment_methods[$i],
										'store_id'		  	  => $store_id,
										'created_at'	  	  => date('Y-m-d')
									)
								);
							}
						}
					}else{
						if(is_array($payment_methods)){
							for($i=0; $i<count($payment_methods); $i++) {
								DB::table('store_payment_method')->insert(
									array(
										'payment_method_name' =>$payment_methods[$i],
										'store_id'		  	  => $store_id,
										'created_at'	  	  => date('Y-m-d')
									)
								);
							}
						}
					}

					$shipping_info = DB::table('store_shipping_method')->where('store_id', '=', $store_id)->get();
					//$shipping_info = DB::table('store_shipping_method')->where('store_id', '=', $store_id)->get();
					
					if(count($shipping_info) > 0){
						DB::table('store_shipping_method')->where('store_id', '=', $store_id)->update(
							array(
								'method_name'     => Input::get('shipping_policy'),
								'store_id'		  => $store_id,
								'created_at'	  => date('Y-m-d')
							)
						);
					}else{
						DB::table('store_shipping_method')->insert(
							array(
								'method_name'     => Input::get('shipping_policy'),
								'store_id'		  => $store_id,
								'created_at'	  => date('Y-m-d')
							)
						);
					}
					return Redirect::to('shop_profile')->with('success','Successfully updated');
				}
			}else{
				return Redirect::to('shop_profile')->with('error','Error occurred');
			}
		}
	}

	public function security(){
		//echo 'hello';
	}

	public function change_email(){
		$store_id = Session::get('store_id');
		$countries = DB::table('country')->get();

		return View::make('front.change_email', array('store_id'=>$store_id,'countries'=>$countries))->with('title', 'Change Email');
	}

	public function change_email_action(){
		$store_id = Request::segment(2);
		$countries = DB::table('country')->get();

		$validator = Validator::make(
			array(
				'current_email' 	  => Input::get('current_email'),
				'new_email' 	  	  => Input::get('new_email'),
				'current_password' 	  => Input::get('current_password')
				),
			array(
				'current_email' 	  => 'required|email',
				'new_email' 	  	  => 'required|email',
				'current_password' 	  => 'required|min:8'
				)
			);

		if($validator->fails()){
			if(!empty($validator->messages()->getMessages()['current_email'])) echo $validator->messages()->getMessages()['current_email'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['new_email'])) echo $validator->messages()->getMessages()['new_email'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['current_password'])) echo $validator->messages()->getMessages()['current_password'][0]."<br />";
		}else{
			$user_check = DB::table('store')->where('email', '=', Input::get('current_email'))->where('password', '=', md5(Input::get('current_password')))->get();
			//echo '<pre>'; print_r($user_check);exit;
			if(count($user_check) > 0){
				DB::table('store')->where('id', '=', $store_id)->update(
					array('email'=>Input::get('new_email'))
				);
				return Redirect::to('change_email')->with('success', 'Email updated successfully.');
			}else{
				return Redirect::to('change_email')->with('error', 'Email updated failed.');
			}
		}
	}

	public function change_password(){
		$store_id = Session::get('store_id');
		$countries = DB::table('country')->get();

		return View::make('front.change_password', array('store_id'=>$store_id,'countries'=>$countries))->with('title', 'Change Password');
	}

	public function change_password_action(){
		//$store_id = Session::get('store_id');
		$store_id = Request::segment(2);
		//echo $store_id;
		$countries = DB::table('country')->get();


		$validator = Validator::make(
			array(
				'new_password' 		  => Input::get('new_password'),
				'confirm_password' 	  => Input::get('confirm_password'),
				'current_password' 	  => Input::get('current_password')
				),
			array(
				'new_password' 		  => 'required|min:8',
				'confirm_password' 	  => 'required|min:8|same:new_password',
				'current_password' 	  => 'required|min:8'
				)
			);

		if($validator->fails()){
			if(!empty($validator->messages()->getMessages()['new_password'])) echo $validator->messages()->getMessages()['new_password'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['confirm_password'])) echo $validator->messages()->getMessages()['confirm_password'][0]."<br />";
			if(!empty($validator->messages()->getMessages()['current_password'])) echo $validator->messages()->getMessages()['current_password'][0]."<br />";
		}else{
			
			$check_password = DB::table('store')->where('id', '=', $store_id)->where('password', '=', md5(Input::get('current_password')))->get();
			
			//echo '<pre>'; print_r($check_password)
			if(count($check_password) > 0){
				DB::table('store')->where('id', '=', $store_id)->update(
					array(
						'password' => md5(Input::get('new_password'))
					)
				);

				return Redirect::to('change_password')->with('success','Password updated successfully.');
			}else{
				return Redirect::to('change_password')->with('error','Password updated failed.');
			}
		}
	}

	public function delete_account(){

	}


	public function check_out(){
	  $countries = DB::table('country')->get();
	  return View::make('front.checkout',array('countries'=>$countries))->with('title', 'Settings Page');
	}

	public function single_product(){
        $countries = DB::table('country')->get();
        return View::make('front.single_product',array('countries'=>$countries))->with('title', 'single_product');
    }

}

