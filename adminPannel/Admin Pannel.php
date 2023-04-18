<!DOCTYPE html>
<html>

<?php
require "../Database.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tasty foods always can make your moments unforgettable.">
    <meta name="author" content="Kanishka medankara">
    <meta name="keywords" content="cafe,kandy,cafe the vibe,food">
    <link rel="stylesheet" href="adminCSS.css">
    <link rel="icon" href="Resources/Images/headerlogo.png">
    <title>Menu - Cafe The Vibe</title>
</head>

<body>
    <div class="main">
        <table class="table" id="main-table">
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
                            <td><input type="text" id="<?= "pri" . $data2['id'] ?>" value="<?= $data2["price"] ?>" /> LKR <button onclick="updatePrice('<?= $data2['id'] ?>')">Update</button><button onclick="deleteItem('<?= $data2['id'] ?>')">Delete</button></td>
                        </tr>
                    <?php
                    } else {
                    ?>
                        <tr style="border-top: solid 1px black;border-left:  solid 1px black;border-right:  solid 1px black;">

                            <td style="border-right:solid 1px black;"><?= $data2["option"] ?></td>
                            <td><input type="text" id="<?= "pri" . $data2['id'] ?>" value="<?= $data2["price"] ?>" /> LKR <button onclick="updatePrice('<?= $data2['id'] ?>')">Update</button><button onclick="deleteItem('<?= $data2['id'] ?>')">Delete</button></td>

                        </tr>
            <?php
                    }
                }




            }

            ?>
        </table>
<div style="margin-bottom: 100px;"> 
        <select  style="height: 50px;margin-top: 100px;" id="category">
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
            <option value="<?=$data["id"]?>"><?=$data["category"]?></option>
            <?php
            }
            ?>
        </select><button style="height: 50px;aspect-ratio: 1;" onclick="addCategory()">+</button>

        <select style="height: 50px;margin-top: 100px;" id="option">
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
            <option value="<?=$data["id"]?>"><?=$data["option"]?></option>
            <?php
            }
            ?>
        </select><button style="height: 50px;aspect-ratio: 1;"  onclick="addOption()">+</button>
        <input type="text"  style="height: 50px;margin-top: 100px;" id="price" placeholder="price">LKR<br>
        <button onclick="addItem()" style="height: 50px;">Add Food Item</button>
</div>




<table class="table" id="table-2">
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
                            <td><input type="text" id="<?= "spPri" . $data2['id'] ?>" value="<?= $data2["price"] ?>" /> LKR <button onclick="updateSpecialPrice('<?= $data2['id'] ?>')">Update</button><button onclick="deleteSpecial('<?= $data2['id'] ?>')">Delete</button></td>
                        </tr>
                    <?php
                    } else {
                    ?>
                        <tr style="border-top: solid 1px black;border-left:  solid 1px black;border-right:  solid 1px black;">

                            <td style="border-right:solid 1px black;"><?= $data2["special"] ?></td>
                            <td><input type="text" id="<?= "spPri" . $data2['id'] ?>" value="<?= $data2["price"] ?>" /> LKR <button onclick="updateSpecialPrice('<?= $data2['id'] ?>')">Update</button><button onclick="deleteSpecial('<?= $data2['id'] ?>')">Delete</button></td>

                        </tr>
            <?php
                    }
                }




            }

            ?>
        </table>

        <div style="margin-bottom: 100px;"> 
        <select  style="height: 50px;margin-top: 100px;" id="category_sp">
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
            <option value="<?=$data["id"]?>"><?=$data["category"]?></option>
            <?php
            }
            ?>
        </select>
        <input type="test"  style="height: 50px;margin-top: 100px;"  placeholder="special" id="special"/>
        <input type="text"  style="height: 50px;margin-top: 100px;" id="price_sp" placeholder="price">LKR<br>
        <button onclick="addspItem()" style="height: 50px;">Add Food Special</button>

        </div>




        <table class="table" id="table-3">
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
        </table>



        <div style="margin-bottom: 100px;"> 
        <select  style="height: 50px;margin-top: 100px;" id="category_ma">
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
            <option value="<?=$data["id"]?>"><?=$data["category"]?></option>
            <?php
            }
            ?>
        </select>
        <input type="test"  style="height: 50px;margin-top: 100px;"  placeholder="Massage" id="massage"/>
      
        <button onclick="addMasage()" style="height: 50px;">Add Massage</button>

        </div>


    </div>

    <script src="aminScript.js"></script>

</body>

</html>