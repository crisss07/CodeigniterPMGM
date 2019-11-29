<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ip_address extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

		function get_client_ip() 
		{
		  $ipaddress = '';
		  if (getenv('HTTP_CLIENT_IP'))
		      $ipaddress = getenv('HTTP_CLIENT_IP');

		  else if(getenv('HTTP_X_FORWARDED_FOR'))
		      $ipaddress = getenv('HTTP_X_FORWARDED_FOR');

		  else if(getenv('HTTP_X_FORWARDED'))
		      $ipaddress = getenv('HTTP_X_FORWARDED');

		  else if(getenv('HTTP_FORWARDED_FOR'))
		      $ipaddress = getenv('HTTP_FORWARDED_FOR');

		  else if(getenv('HTTP_FORWARDED'))
		     $ipaddress = getenv('HTTP_FORWARDED');

		  else if(getenv('REMOTE_ADDR'))
		      $ipaddress = getenv('REMOTE_ADDR');
		  else
		      $ipaddress = 'UNKNOWN';
		  if (strpos($ipaddress, ",") !== false) :
		    $ipaddress = strtok($ipaddress, ",");
		  endif;
			 return $ipaddress;
		}

		function get_public_ip()
		{
		  $externalContent = file_get_contents('http://checkip.dyndns.com/');
		  preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
		  $externalIp = $m[1];
		  return $externalIp;
		}

		function ObtenerIP()
        {
          
		  $externalContent = file_get_contents('http://checkip.dyndns.com/');
		  preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
		  $externalIp = $m[1];
		   echo $externalIp;
        }
	
}
?>