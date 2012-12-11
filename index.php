<?php
	session_start();
	
	// Bootstrap Metro
	require_once('metro/bootstrap.php');
	
	// Update accordingly
	$base_url = 'h5bp/';
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
	if (strlen($urlParts[1]))
	{ 
		$tpl = 'metro/' . $urlParts[1] . '.tpl.php';
	}
	else
	{
		$tpl = 'metro/page.tpl.php';	
	}
	// Send tpl not found to root for now
	// TODO: add 404 support here
	if (!file_exists($tpl))
	{	
		header('Location: /' . $base_url);
	}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <?php require_once('metro/head.php'); ?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <?php 
					if (file_exists($tpl))				
					{			
						require_once($tpl);
					} 						
				?>

		<?php require_once('metro/close.php'); ?>
    </body>
</html>
