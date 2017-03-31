<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Exoquest</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src='<?=URL?>assets/js/loader.js'></script>
  <link rel="stylesheet" href="<?=URL?>/assets/css/reset.css">
  <link rel="stylesheet" href="<?=URL?>/assets/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,700,800" rel="stylesheet">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src='<?=URL?>assets/js/three.min.js'></script>
  <script src='<?=URL?>assets/js/threex.planets.js'></script>
  <script src='<?=URL?>assets/js/threex.atmospherematerial.js'></script>
</head>
<body>
  <div class="loader">
    <?php include 'assets/svg/loader.php' ?>
  </div>
  <header class="<?= $home_class ?>">
    <nav>
    <img src="./assets/img/logo.png" alt="logo">
      <ul>
        <li><a href="home">Home</a></li>
        <li><a href="exoplanets">Exoplanets</a></li>
        <li><a class="disc" href="discover">Discover</a></li>
      </ul>
    </nav>
  </header>
