<?php



// Ajoute une ligne dans la table users
$exec = $pdo->exec('INSERT INTO users (first_name, age, gender) VALUES (\'bruno\', 27, \'male\')');

echo '<pre>';
var_dump($exec);
echo '</pre>';



// Met à jour une ligne dans la table users
$exec = $pdo->exec('UPDATE users SET first_name = \'toto\' WHERE id = 2');

echo '<pre>';
var_dump($exec);
echo '</pre>';


//ajouter une valeur ==> plus organiser 
// Valeurs
$data = array('first_name'=>'Tommy', 'age'=>30, 'gender'=>'male');

// Prépare la requête
$prepare = $pdo->prepare('INSERT INTO users (first_name, age, gender) VALUES (:first_name, :age, :gender)');

// Bind les valeurs
$prepare->bindValue(':first_name', $data['first_name']);
$prepare->bindValue(':age', $data['age']);
$prepare->bindValue(':gender', $data['gender']);

// Execute la requête
$exec = $prepare->execute();
