<?php
require "../Database.php";

$category = $_POST["category"];
$q = "INSERT INTO `category` (`category`) VALUES(?);";
$pre = Database::getPrepareStatement($q);
$pre->bind_param('s', $category);
$pre->execute();



?>

<option selected>Category</option>
<?php
$q = "SELECT * FROM `category`;";
$pre = Database::getPrepareStatement($q);
$pre->execute();
$res = $pre->get_result();
$rows = $res->num_rows;
for ($i = 0; $i < $rows; $i++) {
    $data = $res->fetch_assoc();
?>
    <option value="<?= $data["id"] ?>"><?= $data["category"] ?></option>
<?php
}
?>