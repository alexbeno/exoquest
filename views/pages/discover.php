<?php

// Get content
$data = file_get_contents('./assets/cache/data.json');
$result = json_decode($data);

?>
<div class="container-average">
  <?php include 'assets/svg/average.php' ?>
</div>
