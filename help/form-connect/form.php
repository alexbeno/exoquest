<div class="container_login">
  <form class="form_login" action="#" method="post">
    <div class="header_login">
      <p>Login Panel</p>
    </div>
    <input type="text" name="login" class="<?= array_key_exists('login', $error_messages) ? 'error' : '' ?>" placeholder="login">
    <input type="pass" name="pass" class="<?= array_key_exists('pass', $error_messages) ? 'error' : '' ?>" placeholder="mot de pass">
    <input type="submit" name="submit" value="connexion">
  </form>
</div>
