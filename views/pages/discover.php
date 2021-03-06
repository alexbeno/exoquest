<?php

// Get content
$data = file_get_contents('./assets/cache/data.json');
$result = json_decode($data);

?>
<div class="container-describ">
  <p class="first-explain"> <strong>An Exoplanet</strong> is <span>a planet that orbits a star other than the Sun.</span> It’s in 1990 that discovery the first exoplanet,
  the lost of ressoucre technical means had not confirmed their existence and doubts persisted.</p>
  <div class="confirm">
    <img src="assets/img/disc/confirmplanet.png" alt="">
    <div class="contain-text">
      <p class="text">Confirmed exoplanets</p>
      <p id="first-nb" class="nb">3604</p>
    </div>
  </div>
  <div class="prob">
    <img src="assets/img/disc/teluric.png" alt="">
    <div class="contain-text">
      <p class="text">Probably tellurique</p>
      <p id="seconde_nb" class="nb">164</p>
    </div>
  </div>
  <div class="side-explain">
    <div class="border"></div>
    <div class="explain">
      <p class="first"><strong>A planet called teluric</strong>
        is a planet suceptible to contain an atmosphere that is :</p></br>
      <p class="unlight">The first criterion neccessary for life.</p></br>
      <p class="second">
        <strong>The method</strong>
        used by scientists to define a teluric planet is to principaly see the mass planet. The planets which make at most eight times the mass of the earth are defined as
        <strong>probably teluric.</strong></p>
    </div>
  </div>
</div>
<div class="container-average">
  <?php include 'assets/svg/average.php' ?>
</div>
<div class="probability">
  <div class="container-image">
    <img src="assets/img/disc/habitable.png" alt="">
  </div>
  <div class="left">
    <div class="a">
      <p class="nb">31 %</p>
      <p class="text">of teluric planets are probably habitables according to ESI index.</p>
    </div>
    <div class="b">
      <p class="nb">76 %</p>
      <p class="text">of probably habitable planets make scientists optimistic</p>
    </div>
  </div>
  <div class="right">
    <div class="c">
      <p class="nb">23 %</p>
      <p class="text">of teluric planets make scientists optimistic as to their habitability.</p>
    </div>
    <div class="d">
      <p class="nb">1.12 %</p>
      <p class="text">of confirmed exoplanets make scientists optimistic as to their habitability</p>
    </div>
  </div>
</div>
<div class="container-diag">
  <?php include 'assets/svg/diag.php' ?>
</div>
<script type="text/javascript" src="<?=URL?>/assets/js/discover.js"></script>
