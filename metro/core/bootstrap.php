<?php
	
	session_start();

	require_once('functions.php');
	
	// Global PDO connection for now
	metroConnect();
	
	
	$request_uri = $_SERVER['REQUEST_URI'];
	
	// Remove base from URI
	$request_uri_stripped = str_replace($base_url,'',$request_uri);
	
	// Strip query params
	$i = strpos($request_uri, '?');
	if($i !== false)
	{
		$request_uri_stripped = substr($request_uri, 0, $i);
	}
	
	// Create array from path
	$url_parts = explode('/', $request_uri_stripped);
	
	// Build template
	// TODO: Add security layer here 
	if (strlen($url_parts[1]))
	{ 
		$tpl = 'metro/' . $url_parts[1] . '.tpl.php';
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
	
	//DEBUG
	$debug_log = '';		
	$debug_log = $debug_log . date("m.d.y  H.i.s") . ' ' . '<span class="debug_log">tpl= </span>' . $tpl;
	$debug_log = $debug_log . date("m.d.y  H.i.s") . ' ' . '<span class="debug_log">Bootstrap successful</span>';

?>