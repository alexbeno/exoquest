<?php
include'../../config.php';


$val_data = 1;
echo $val_data;

$id = $_POST['id'];
$extension = "jpg";
$delete_img = "../../asset/image/product/{$id}.{$extension}";

$prepare = $pdo->prepare('DELETE FROM decline WHERE identifier = :id');
$data = array('id'=>$id);
$prepare->bindValue(':id', $data['id']);
$prepare->execute();

$prepareB = $pdo->prepare('DELETE FROM product WHERE identifier = :id');
$data = array('id'=>$id);
$prepareB->bindValue(':id', $data['id']);
$prepareB->execute();

unlink($delete_img);
