<?php
require "../Database.php";

$category = $_POST["category"];
$special = $_POST["special"];
$price = $_POST["price"];

if ($category == "Category") {
    echo "1";
} else if ($special == "") {
    echo "2";
} else if ($price == "") {
    echo "3";
} else {
    $q = "SELECT * FROM `special` WHERE (`special`=? AND `category_id`=?);";
    $pre = Database::getPrepareStatement($q);
    $pre->bind_param('ss', $special, $category);
    $pre->execute();
    $res = $pre->get_result();
    $items = $res->num_rows;
    if ($items > 0) {
        echo "4";
    } else {
        $q = "INSERT INTO `special` (`special`,`category_id`,`price`) VALUES(?,?,?);";
        $pre = Database::getPrepareStatement($q);
        $pre->bind_param('sss', $special, $category, $price);
        $pre->execute();
        ?>
        <tr style="border: solid 1px black;">
    <th style="border: solid 1px black;">Category</th>
    <th style="border: solid 1px black;">Special</th>
    <th style="border: solid 1px black;">Price</th>
</tr>
<?php
$q = "SELECT * FROM `category`;";
$pre = Database::getPrepareStatement($q);
$pre->execute();
$res = $pre->get_result();
$rows = $res->num_rows;
for ($i = 0; $i < $rows; $i++) {
    $data = $res->fetch_assoc();
    $q2 = "SELECT * FROM `special` WHERE `category_id`=?";
    $pre2 = Database::getPrepareStatement($q2);
    $pre2->bind_param('s', $data["id"]);
    $pre2->execute();
    $res2 = $pre2->get_result();
    $rows2 = $res2->num_rows;
    for ($j = 0; $j < $rows2; $j++) {
        $data2 = $res2->fetch_assoc();
        if ($j == 0) {
?>
            <tr style="border-top: solid 5px red;border-left:  solid 1px black;border-right:  solid 1px black;">
                <td style="border-left:  solid 1px black;border-right:  solid 1px black;" rowspan="<?= $rows2 ?>"><?= $data["category"] ?></td>
                <td style="border-right:solid 1px black;"><?= $data2["special"] ?></td>
                <td><input type="text" id="<?= "spPri" . $data2['id'] ?>" value="<?= $data2["price"] ?>" /> LKR <button onclick="updateSpecialPrice('<?= $data2['id'] ?>')">Update</button></td>
            </tr>
        <?php
        } else {
        ?>
            <tr style="border-top: solid 1px black;border-left:  solid 1px black;border-right:  solid 1px black;">

                <td style="border-right:solid 1px black;"><?= $data2["special"] ?></td>
                <td><input type="text" id="<?= "spPri" . $data2['id'] ?>" value="<?= $data2["price"] ?>" /> LKR <button onclick="updateSpecialPrice('<?= $data2['id'] ?>')">Update</button></td>

            </tr>
<?php
        }
    }
}

?>
        <?php
    }
}


?>
