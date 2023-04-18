<?php

require "../Database.php";

$id=$_POST["id"];


$q="DELETE FROM `massage` WHERE `id`=?";
$pre=Database::getPrepareStatement($q);
$pre->bind_param('s',$id);
$pre->execute();

echo('sucess');

?>