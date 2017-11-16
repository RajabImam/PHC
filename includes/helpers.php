<?php

	/*Functions that display footer, called renderFooter*/

	
function renderFooter($data = [])
{
	extract($data);
	require('footer.php');
}


	/*Functions that display header, called renderHeader
	extract function allows us to parse the $data variable in hearder.php*/


function renderHeader($data = [])
{
	extract($data);
	require('header.php');
}
	
function render($template, $data = [])
{
	$path = $template . " .php";
	if (file_exists($path)) 
	{
		extract($data);
		require($path);
	}
}


  
?> 