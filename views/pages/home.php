<?
$result = file_get_contents('http://exoplanetarchive.ipac.caltech.edu/cgi-bin/nstedAPI/nph-nstedAPI?table=exoplanets&format=json&select=pl_hostname,pl_name,pl_discmethod,pl_disc,pl_orbper,pl_rade,st_mass,pl_disc,pl_discmethod,pl_pelink,pl_locale,pl_instrument,st_uj');

// Json decode
$result = json_decode($result);
$v = 1;

// echo '<pre>';
// print_r($result);
// echo '</pre>';

foreach ($result as $_results):
  $v += 1;
?>

<p><h2>host nom</h2> <?=$_results->pl_hostname?></p>
<p><h2>nom</h2> <?=$_results->pl_name?></p>
<p><h2>radius</h2><?=$_results->pl_rade?></p>
<p><h2>mass</h2><?=$_results->st_mass?></p>
<p><h2>decouverte</h2><?=$_results->pl_disc?></p>
<p><h2>comment est decouvert</h2><?=$_results->pl_discmethod?></p>
<p><h2>link wiki</h2><?=$_results->pl_pelink?></p>
<p><h2>nombre planet dans le meme systeme </h2><?=$_results->st_uj?></p>
</br>
<h3>------------------------------------------------------</h3>
</br>
<?php
if($v > 10)
{
  break;
}
?>
<?php endforeach;?>

<h1>coucou</h1>
