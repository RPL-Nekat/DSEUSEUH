<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('active_link')) {
	
	function activate_link($controller) {   
		// Getting CI class instance.
		$CI = get_instance();
		// Getting router class to active.
		// $class = $CI->router->fetch_class(); 
		$class = $CI->uri->segment(2); 
		return ($class == $controller) ? 'bg-merah actived' : '';
	}
}