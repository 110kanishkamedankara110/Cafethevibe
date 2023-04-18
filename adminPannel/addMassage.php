<?php
require "../Database.php";

$category = $_POST["category"];
$massage = $_POST["massage"];


if ($category == "Category") {
    echo "1";
} else if ($massage == "") {
    echo "2";
} else {
    $q = "SELECT * FROM `massage` WHERE (`massage`=? AND `category_id`=?);";
    $pre = Database::getPrepareStatement($q);
    $pre->bind_param('ss', $massage, $category);
    $pre->execute();
    $res = $pre->get_result();
    $items = $res->num_rows;
    if ($items > 0) {
        echo "4";
    } else {
    $q = "INSERT INTO `massage` (`massage`,`category_id`) VALUES(?,?);";
    $pre = Database::getPrepareStatement($q);
    $pre->bind_param('ss', $massage, $category);
    $pre->execute();
    ?>
    
    <tr style="border: solid 1px black;">
                <th style="border: solid 1px black;">Category</th>
                <th style="border: solid 1px black;">Massage</th>
   
            </tr>
            <?php
            $q = "SELECT * FROM `category`;";
            $pre = Database::getPrepareStatement($q);
            $pre->execute();
            $res = $pre->get_result();
            $rows = $res->num_rows;
            for ($i = 0; $i < $rows; $i++) {
                $data = $res->fetch_assoc();
                $q2 = "SELECT * FROM `massage` WHERE `category_id`=?";
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
                            <td style="border-right:solid 1px black;"><?= $data2["massage"] ?> <button onclick="deleteMassage('<?= $data2['id'] ?>')">Delete</button></td>
                          
                        </tr>
                    <?php
                    } else {
                    ?>
                        <tr style="border-top: solid 1px black;border-left:  solid 1px black;border-right:  solid 1px black;">

                            <td style="border-right:solid 1px black;"><?= $data2["massage"] ?><button onclick="deleteMassage('<?= $data2['id'] ?>')">Delete</button></td>
                           
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
