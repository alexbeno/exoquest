<?php
// Get content
$data = file_get_contents('./assets/cache/data.json');

$result = json_decode($data);
$count_radius = 0;
$nan_el_radius = 0;
$count_mass = 0;
$nan_el_mass = 0;
$count_temp = 0;
$nan_el_temp = 0;

?>
<?php foreach($result as $planet):?>
  <!-- somme de tous divisé par le nombre d'element -->
<?php
      if($planet->pl_radj === null)
      {
        $nan_el_radius += 1;
      }
      else
      {
          $count_radius += $planet->pl_radj;
      }

      if($planet->pl_radj === null)
      {
        $nan_el_mass += 1;
      }
      else
      {
          $count_mass += $planet->st_mass;
      }

      if($planet->pl_radj === null)
      {
        $nan_el_temp += 1;
      }
      else
      {
          $count_temp += $planet->st_teff;
      }
    endforeach;

  $size_radius = sizeof($result);
  $int_size_radius = intVal($size_radius);
  $real_size_radius = intVal($size_radius) - $nan_el_radius;
  $Newcount_radius = $count_radius / $real_size_radius;
  $size_mass = sizeof($result);
  $int_size_mass = intVal($size_mass);
  $real_size_mass = intVal($size_mass) - $nan_el_mass;
  $Newcount_mass = $count_mass / $real_size_mass;
  $size_temp = sizeof($result);
  $int_size_temp = intVal($size_temp);
  $real_size_temp = intVal($size_temp) - $nan_el_temp;
  $Newcount_temp = $count_temp / $real_size_temp;
  $nb_planet = sizeof($result);
   ?>
<svg id="average" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 690.4 197" style="enable-background:new 0 0 690.4 197;" xml:space="preserve">
<style type="text/css">
	#average .st0{fill:#48466D;}
	#average .st1{font-family:'Raleway-Bold';}
	#average .st2{font-size:26px;}
	#average .st3{opacity:0.1;fill:#25242D;}
	#average .st4{fill:none;stroke:#57BEC5;stroke-width:3;stroke-miterlimit:10;}
	#average .st5{fill:#4D4D68;}
	#average .st6{fill:none;stroke:#1B3551;stroke-width:3;stroke-miterlimit:10;}
	#average .st7{fill:#FFFFFF;}
	#average .st8{font-family:'Raleway-Light';}
	#average .st9{font-size:17px;}
	#average .st10{font-size:24px;}
</style>
<g id="title">
	<text transform="matrix(1 0 0 1 27.5605 50.3469)" class="st0 st1 st2">Average</text>
</g>
<g id="shadows-line">
	<path class="st3" d="M-0.1,99.7c0,0,63.9-62.4,191.3-8.3c85,36.1,142.8,14.2,171.8-4.4c11.7-7.5,21-18.2,26.7-30.9
		c11.2-24.9,43.1-73.8,114.4-43.7c0,0,31.5,10.3,48.3,47.2c7.1,15.6,21.7,26.6,38.7,29.1c24.5,3.6,60.3,0.3,97.7-31.8l-0.9,77.3
		c0,0-147.6,45.7-182.3-28.2s-57.3-30.4-57.3-30.4s-33.1,63.1-93.2,88.5c-7.6,3.2-15.8,5.1-24.1,5.6c-25.5,1.6-89.7,4.4-119-6.4
		C175.1,149.5,125.1,126.2,84,131C42.8,135.8,17,161.6,17,161.6l-16.9,21L-0.1,99.7z"/>
</g>
<g id="line-container">
	<path class="st4 line" d="M688.9,73.5c0,1.9-0.1,3.7-0.2,5.5c-4,42.9-54.7,41.5-54.7,41.5c-44.7,7.1-69.8-3.2-83.4-14.1
		c-7.7-6.1-13.3-14.5-16.4-23.8c-14.8-44.3-52.1-49.6-59.9-50.2c-1-0.1-2.1-0.2-3.2-0.3c-28.1-3.6-43.9,25.8-47.4,33.3
		c-0.8,1.7-1.6,3.3-2.5,4.9c-55.1,100.4-176.1,71.9-212.9,60.4c-5.7-1.8-11.2-4-16.7-6.5C80.5,71.8,17.2,117.8,0,133.6"/>
</g>
<g id="planet-point">
	<circle class="st5" cx="413" cy="84.5" r="4.8"/>
	<circle class="st5" cx="644.3" cy="118.9" r="4.8"/>
	<circle class="st5" cx="68.5" cy="102.5" r="4.8"/>
</g>
<g id="circle-temp">
	<circle id="circle" class="st6" cx="317.2" cy="82.7" r="33.6"/>
</g>
<g id="average-mass">
	<text transform="matrix(1 0 0 1 36.0387 155.9532)" class="st7 st8 st9 text">Average mass</text>
	<text transform="matrix(1 0 0 1 60.738 180.606)" class="st7 st1 st10 text"><?= round($Newcount_mass, 3)?></text>
</g>
<g id="average-temp">
	<text transform="matrix(1 0 0 1 206.9687 72.6971)" class="st7 st8 st9 text">Average temperature</text>
	<text transform="matrix(1 0 0 1 255.6173 94.2909)" class="st7 st1 st10 text"><?= round($Newcount_temp, 0.1)."K" ?></text>
	<text transform="matrix(1 0 0 1 554.8453 148.6971)" class="st7 st8 st9 text">Average size</text>
	<text transform="matrix(1 0 0 1 573.2758 174.8277)" class="st7 st1 st10 text"><?=round($Newcount_radius, 3)?></text>
</g>
<g id="average-size">
</g>
</svg>
