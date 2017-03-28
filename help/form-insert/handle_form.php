<?php
	$error_messages = array();
	$success_messages = array();

	if(!empty($_POST))
	{

		$name = trim($_POST['name']);
		$describ = trim($_POST['description']);
		$identifier = trim($_POST['identifier']);
		$price = $_POST['price'];
		$devise = $_POST['devise'];
		$stock = $_POST['stock'];
		$image = $_FILES['vignette'];

		if(empty($name))
			$error_messages['name'] = 'should not be empty';

		if(empty($describ))
			$error_messages['description'] = 'should not be empty';

		if(empty($identifier))
			$error_messages['identifier'] = 'should not be empty';

		if(empty($price))
			$error_messages['price'] = 'should not be empty';

		if(empty($devise))
			$error_messages['devise'] = 'should not be empty';

		if(empty($image))
			$error_messages['vignette'] = 'should not be empty';


		if(empty($error_messages))
		{

			$image_name = $identifier;

			$_FILES['vignette']['name'];
			$_FILES['vignette']['type'];
			$_FILES['vignette']['size'];
			$_FILES['vignette']['tmp_name'];
			$_FILES['vignette']['error'];


			$extensions_valides = array( 'jpg','png','jpeg');
			$extension_upload = strtolower(  substr(  strrchr($_FILES['vignette']['name'], '.')  ,1)  );
			if ( in_array($extension_upload,$extensions_valides) )

			$url_vignette = "asset/image/product/{$image_name}.{$extension_upload}";
			$resultat = move_uploaded_file($_FILES['vignette']['tmp_name'],$url_vignette);


			$prepare = $pdo->prepare('INSERT INTO product (name, identifier, description, price, devis, image) VALUES (:name, :identifier, :description, :price, :devis, :image)');

			$data = array('name'=>$name, 'identifier'=>$identifier, 'description'=>$describ, 'price'=>$price, 'devis'=>$devise, 'image'=> $url_vignette);

			$prepare->bindValue(':name', $data['name']);
			$prepare->bindValue(':identifier', $data['identifier']);
			$prepare->bindValue(':description', $data['description']);
			$prepare->bindValue(':price', $data['price']);
			$prepare->bindValue(':devis', $data['devis']);
			$prepare->bindValue(':image', $data['image']);

			$exec = $prepare->execute();

			$exec_decline = $pdo->exec('INSERT INTO decline (identifier, stock) VALUES ("'.$identifier.'","'.$stock.'")');

		}
		else
		{

		}
	}

	else
	{
  }
