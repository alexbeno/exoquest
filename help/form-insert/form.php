<?php include 'handle-form.php'; ?>
<form class="new-product-form" action="#" method="post" enctype="multipart/form-data">
  <input type="text" class="big <?= array_key_exists('name', $error_messages) ? 'error' : '' ?>" name="name" placeholder="Product name">
  <input type="text" class="big <?= array_key_exists('identifier', $error_messages) ? 'error' : '' ?>" id="product-identifier" name="identifier" placeholder="Product indentifiant">
  <input type="text" class="big <?= array_key_exists('description', $error_messages) ? 'error' : '' ?>" name="description" placeholder="Product description">
  <input type="number"class="medium <?= array_key_exists('price', $error_messages) ? 'error' : '' ?>" name="price" placeholder="price">
  <select class="medium" name="devise">
      <option value="eur">euro</option>
      <option value="dollar">dollar</option>
      <option value="livre">livre</option>
  </select>
  <input type="number"class="big" name="stock" placeholder="enter your stock for all declinaison">
  <input type="file" class ="<?= array_key_exists('vignette', $error_messages) ? 'error' : '' ?>" name="vignette" id="vignette">
  <input type="submit" name="submit" value="Add The Product">
</form>
