<?php

class FrontController extends BaseController {

/*	homepage controller*/

	    public function home(){
			return View::make('front.index')
			->with('title','Home Page');
		}

}
