<?php

require "../Database.php";

$id=$_POST["id"];
$value=$_POST["value"];

$q="UPDATE `special` SET `special`.`price`=? WHERE `special`.`id`=?";
$pre=Database::getPrepareStatement($q);
$pre->bind_param('ss',$value,$id);
$pre->execute();

echo('sucess');

?>