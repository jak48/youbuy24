<?php

class TesterController extends  BaseController {
	
	public function cart_testing(){
		// Format array of required info for item to be added to basket...
		$items = array(
		    'id' => 1,
		    'name' => 'Juicy Picnic Hamper',
		    'price' => 120.00,
		    'quantity' => 1
		);

		// Make the insert...
		Cart::insert($items);

		// Let's see what we have have in there...
		echo "<pre>";print_r(Cart::contents());
	}
}
?>