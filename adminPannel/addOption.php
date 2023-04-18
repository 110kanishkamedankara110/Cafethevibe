<?php
require "../Database.php";

$option = $_POST["option"];
$q = "INSERT INTO `option` (`option`) VALUES(?);";
$pre = Database::getPrepareStatement($q);
$pre->bind_param('s', $option);
$pre->execute();



?>

<option selected>Option</option>
<?php
$q = "SELECT * FROM `option`;";
$pre = Database::getPrepareStatement($q);
$pre->execute();
$res = $pre->get_result();
$rows = $res->num_rows;
for ($i = 0; $i < $rows; $i++) {
    $data = $res->fetch_assoc();
?>
    <option value="<?= $data["id"] ?>"><?= $data["option"] ?></option>
<?php
}
?>