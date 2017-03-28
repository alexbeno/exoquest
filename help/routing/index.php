<?php
session_start();
// Config
include 'config.php';

// Routing
$q = !empty($_GET['q']) ? $_GET['q'] : '';

if($q === '' || $q === 'login')
{
	$page = 'login';
	include 'composer/handle_conect_form.php';
	include 'views/partials/header.php';
	include 'views/pages/'.$page.'.php';
	include 'views/partials/footer.php';
}

else
{

	if($q === 'parameter')
	{
		$page = 'parameter';
	}

	else if($q === 'product')
	{
		$page = 'product';
	}
	else
	{
		$page = '404';
	}
	include 'composer/handle_add_form.php';
	include 'views/partials/header.php';
	include 'views/partials/menu.php';
	include 'views/pages/'.$page.'.php';
	include 'views/partials/footer.php';
}
