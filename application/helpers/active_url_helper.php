<?php 

$CI='';


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('Active_url'))
{
    function active_url($slug = '', $target = 1)
    {
		$CI =& get_instance();
		$segment = $CI->uri->segment($target);
		if($segment==$slug){
			echo "class='active'";
		}
		}
		function active_url1($slug = '', $target = 1)
    {
		$CI =& get_instance();
		$segment = $CI->uri->segment($target);
		if($segment==$slug){
			echo "class='home'";
		}
    }
}