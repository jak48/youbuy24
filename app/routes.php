<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('home',array('as'=>'home','uses'=>'HomeController@home'));
Route::post('register',array('uses'=>'HomeController@register'));
Route::get('captcha',array('uses'=>'HomeController@captcha'));
Route::get('setimage',array('uses'=>'HomeController@setImage'));
Route::get('register_confirm/{id1}/{security_code}',array('uses'=>'HomeController@register_confirm'));
Route::post('login',array('uses'=>'HomeController@login'));
Route::post('forget_pass_mail',array('uses'=>'HomeController@forget_pass_mail'));
Route::get('set_password/{user_id}/{security_code}',array('uses'=>'HomeController@set_password'));
Route::post('reset_password',array('uses'=>'HomeController@reset_password'));
//for testing
Route::get('cart_testing',array('uses'=>'TesterController@cart_testing'));
Route::get('search_result/{search_string?}',array('uses'=>'HomeController@search'));
Route::get('single_product',array('uses'=>'HomeController@single_product'));

//for customers actions that is checked for session
Route::group(array('before' => 'checked'), function(){
	Route::get('delete_category/{category_id}/{password}',array('uses'=>'HomeController@delete_category'));
	Route::get('logout',array('uses'=>'HomeController@logout'));
	Route::any('add_category/{store_id?}/{flag?}',array('as'=>'category','uses'=>'HomeController@add_category'));
	Route::get('store_view/{store_id}/{category_id}/{sort_order}',array('uses'=>'HomeController@store_view'));
	Route::post('category_list',array('uses'=>'HomeController@category_list'));
	Route::post('subcategory_list',array('uses'=>'HomeController@subcategory_list'));
	Route::post('add_product',array('uses'=>'HomeController@add_product'));
	Route::get('view_change/{pro_view}',array('uses'=>'HomeController@view_change'));
	Route::post('edit_category',array('uses'=>'HomeController@edit_category'));
	Route::post('pro_pic_up',array('uses'=>'HomeController@pro_pic_up'));
	Route::post('cover_pic_up',array('uses'=>'HomeController@cover_pic_up'));
	// From rinku
	 Route::post('shop_check',array('uses'=>'HomeController@shop_check'));
	 Route::get('settings',array('uses'=>'HomeController@settings'));
	 Route::get('shop_profile',array('uses'=>'HomeController@shop_profile'));
	 Route::post('edit_shop_profile/{id}',array('uses'=>'HomeController@edit_shop_profile'));
	 Route::get('security',array('uses'=>'HomeController@security'));
	 Route::get('change_email',array('uses'=>'HomeController@change_email'));
	 Route::get('change_password',array('uses'=>'HomeController@change_password'));
	 Route::post('change_password_action/{id}',array('uses'=>'HomeController@change_password_action'));
	 Route::post('change_email_action/{id}',array('uses'=>'HomeController@change_email_action'));
	 Route::get('delete_account',array('uses'=>'HomeController@delete_account'));
	 Route::get('check_out',array('uses'=>'HomeController@check_out'));
	 //end of route from rinku
	Route::get('/{store_name?}',array('uses'=>'HomeController@store'));
	});
//For customer session filtering
Route::filter('checked', function($route, $request)
{
    if(!Session::has('isLoggedIn')){
		return Redirect::to('home');
	}
});









