<?php
// Pulled directly from HTML5 Boilerplate and updated paths
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.8.3.min.js"><\/script>')</script>
<script src="../js/plugins.js"></script>
<script src="../js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<?php
if ($debug == 1)
{
		echo '<h1>DEBUG INFORMATION</h1>';
		echo 'URI= ' . $requestUri;
		echo '<br/>';
		echo 'Template= ' . $tpl;
		echo '<br/><br/><h3>Debug Log:</h3>' . $debug_log;
		//phpinfo();
}
?>
