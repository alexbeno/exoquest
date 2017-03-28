<?php
// Préparation de la requête
$query = $pdo->query('SELECT * FROM users');

// Éxécution de la requête et récupération des données
$users = $query->fetchAll();

// Affichage des données
echo '<pre>';
print_r($users);
echo '</pre>';
