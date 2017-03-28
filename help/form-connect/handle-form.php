<?php
	$error_messages = array();
	$success_messages = array();

	if(!empty($_POST))
	{

		$login = trim($_POST['login']);
		$passP = trim($_POST['pass']);
		$pass = md5($passP);

		if(empty($login))
			$error_messages['login'] = 'should not be empty';

		if(empty($pass))
			$error_messages['pass'] = 'should not be empty';

		if(empty($error_messages))
		{
      $query = $pdo->query('SELECT COUNT(*) FROM users WHERE login="'.$login.'" AND pass="'.$pass.'" ');
      $login_val = $query->fetchColumn();

      if($login_val > 0 )
      {
        $_SESSION['connected'] = true;
        header('Location: home ');
        exit();
      }
      else
      {
        $error_messages['login'] = 'wrong information';
        $error_messages['pass'] = 'wrong information';
      }
		}
	}

	else
	{

  }
