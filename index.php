<?php
include 'config.php';

$q = isset($_GET['q']) ? $_GET['q'] : '';
if($q == '')
{
  $page = 'home';
}
else if ($q == 'contact')
{
  $page = 'contact';
}
else if ($q == 'exoplanets')
{
	$page = 'exoplanets';
}
else if($q == 'planete')
{
    $page = 'planete';
}

else
{
  $page = '404';
}

include 'views/partials/header.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';
?>
