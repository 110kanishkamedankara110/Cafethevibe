<?php

require "../Database.php";

$id=$_POST["id"];
$value=$_POST["value"];

$q="UPDATE `category_option` SET `category_option`.`price`=? WHERE `category_option`.`id`=?";
$pre=Database::getPrepareStatement($q);
$pre->bind_param('ss',$value,$id);
$pre->execute();

echo('sucess');

?>