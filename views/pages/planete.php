<?php 
$data = file_get_contents('./assets/cache/data.json');

$result = json_decode($data);

foreach ($result as $planet) :
  if($planet->pl_name === $_GET['id'])
  {
    ?>
    <div class="container-planet"></div>
    <div class="who">
      <h2 class="name"><?=$planet->pl_name?></h2>
      <h3 class="discover">Discovered in <span class="years"><?= $planet->pl_disc?></span></h3></br>
      <p class="who-discover"><span class="by">By </span><?=$planet->pl_facility?> facility</p>
    </div>
    <div class="what">
      <div class="line">
        <span class="columns">Steral mass</span>
        <span class="result"><?= $planet->st_mass?> MO</span>
        <div class="clear"></div>
      </div>
      <div class="line">
        <span class="columns">Orbital Period</span>
        <span class="result"><?= round($planet->pl_orbper, 2)?> h</span>
        <div class="clear"></div>
      </div>
      <div class="line">
        <span class="columns">Temperature</span>
        <span class="result"><?= $planet->st_teff?> K</span>
        <div class="clear"></div>
      </div>
      <div class="line">
        <span class="columns">Radius</span>
        <span class="result"><?= $planet->pl_radj?> J r</span>
        <div class="clear"></div>
      </div>
      <div class="line">
        <span class="columns">Stellar age</span>
        <span class="result"><?= $planet->st_age?> Gyr</span>
        <div class="clear"></div>
      </div>
      <div class="line">
        <span class="columns">Discovery method</span>
        <span class="result"><?= $planet->pl_discmethod?></span>
        <div class="clear"></div>
      </div>
    </div>
    <?php
    } ?>
    <?php endforeach ?>
   

<script type="text/javascript" src="<?=URL?>/assets/js/planete.js"></script>
