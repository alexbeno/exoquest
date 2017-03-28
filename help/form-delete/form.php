<?php
include 'handle-form.php';

  $query_product = $pdo->query('SELECT * FROM product');
  $all_products = $query_product->fetchAll();

 foreach($all_products as $_all_products): ?>

  <form class="delete-all" action="#" method="post">
    <input type="hidden" name="id" class="id" value="<?= $_all_products->identifier ?>">
    <input type="submit" name="delete-all" value="delette all" style="background-color: <?=$colorProduct->first?>">
  </form>

  <?php endforeach; ?>
