<?php
	
	session_start();
	
	//TODO Create metro_debug_log(), metro_debug_print() functions
	$debug_log = '';	
	
	// Update accordingly
	$base_url = '';
	$debug = 1; // 0, 1
	
	// Error reporting
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	
	$requestUri = $_SERVER['REQUEST_URI'];
	
	// Remove base from URI
	$requestUri = str_replace($base_url,'',$requestUri);
	
	// Strip query params
	$i = strpos($requestUri, '?');
	if($i !== false)
	{
		$requestUri = substr($requestUri, 0, $i);
	}
	
	// Create array from path
	$urlParts = explode('/', $requestUri);
	
	// Build template
	// TODO: Add security layer here 
	if (strlen($urlParts[1]))
	{ 
		$tpl = 'metro/' . $urlParts[1] . '.tpl.php';
	}
	else
	{
		$tpl = 'metro/page.tpl.php';	
	}
	// Send tpl not found to root for now
	// TODO: Add 404 support here
	if (!file_exists($tpl))
	{	
		header('Location: /' . $base_url);
	}	
	
	$debug_log = $debug_log . date("m.d.y  H.i.s") . ' ' . '<span class="debug_log">tpl= </span>' . $tpl;
	$debug_log = $debug_log . date("m.d.y  H.i.s") . ' ' . '<span class="debug_log">Bootstrap successful</span>';

?>