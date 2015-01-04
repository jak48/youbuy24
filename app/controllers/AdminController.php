<?php

class AdminController  extends  BaseController{

/*	homepage controller*/

	   public function log_in(){

	   		$category = DB::table('category')->get();
			return View::make('admin.profile',array('category'=>$category))
			->with('title','Landing Page');
		}


		public function add_category(){
			/*$validator = Validator::make(
			   array(
			   		'category' => Input::get('category'),
			   		
			   	),
			    array(
			    	'category' => 'required|min:3'
			    )
			);

			if ($validator->fails())
			{	
				//for printing validation for required fields
				if(!empty($validator->messages()->getMessages()['category']))
					echo $validator->messages()->getMessages()['category'][0]."<br />";
				//end of printing errors
			}else{*/
				//$user_id = Session::get('admin_id');*/
				try{
					DB::table('category')->insert(array(
                	'category'=>Input::get('category')));
                	echo Input::get('category');	
                }catch(\Exception $e){
                 	echo "Problem in category";
                }
            }
		//}



}
