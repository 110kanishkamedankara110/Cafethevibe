<?php
require "../Database.php";

$category=$_POST["category"];
$option=$_POST["option"];
$price=$_POST["price"];

if($category=="Category"){
echo "1";
}else if($option=="Option"){
echo "2";
}else if($price==""){
echo "3";
}else{
    $q="SELECT * FROM `category_option` WHERE (`category_id`=? AND `option_id`=?);";
    $pre=Database::getPrepareStatement($q);
    $pre->bind_param('ss',$category,$option);
    $pre->execute();
    $res=$pre->get_result();
    $items=$res->num_rows;
    if($items>0){
        echo "4";
    }else{
        $q="INSERT INTO `category_option` (`category_id`,`option_id`,`price`) VALUES(?,?,?);";
        $pre=Database::getPrepareStatement($q);
        $pre->bind_param('sss',$category,$option,$price);
        $pre->execute();
      ?>
      <tr style="border: solid 1px black;">
                <th style="border: solid 1px black;">Category</th>
                <th style="border: solid 1px black;">option</th>
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
                $q2 = "SELECT `option`.`option`,`category_option`.`price`,`category_option`.`id`  FROM `category_option` INNER JOIN `option` ON `option`.`id`=`category_option`.`option_id` WHERE `category_id`=?";
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
                            <td style="border-right:solid 1px black;"><?= $data2["option"] ?></td>
                            <td><input type="text" id="<?= "pri" . $data2['id'] ?>" value="<?= $data2["price"] ?>" /> LKR <button onclick="updatePrice('<?= $data2['id'] ?>')">Update</button></td>
                        </tr>
                    <?php
                    } else {
                    ?>
                        <tr style="border-top: solid 1px black;border-left:  solid 1px black;border-right:  solid 1px black;">

                            <td style="border-right:solid 1px black;"><?= $data2["option"] ?></td>
                            <td><input type="text" id="<?= "pri" . $data2['id'] ?>" value="<?= $data2["price"] ?>" /> LKR <button onclick="updatePrice('<?= $data2['id'] ?>')">Update</button></td>

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
