<?php
include 'config.php';

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

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
else if(preg_match('/^article\/[-_a-z0-9]+$/', $q))
{
    $page = 'article';
}

else
{
  $page = '404';
}

include 'views/partials/header.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';
?>
