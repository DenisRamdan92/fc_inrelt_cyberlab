<?php 

$CI='';


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('Check_menu'))
{
    function check_menu($menu = '')
    {
		$CI =& get_instance();
		if(in_array($menu,$CI->session->roles_sess)){
			return true;
		}else{
            return false;
        }
    }
}