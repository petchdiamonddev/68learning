<?php
require_once('../conf/config.php');

$db = new Database();
$conn = $db->getConnetction();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <h2 class="text-center">การเขียนโปรแกรม OOP</h2>
    </header>

    <section>
        <?php require_once('./navcopy.php'); ?>
        <article>
            <h1 class="text-center">เพิ่มชื่อ-สกุล</h1>
            <div>
                <form action="./insert.php" method="post">
                    <div class="row">
                        <div class="col-25">
                            <label>คำนำหน้าชื่อ:</label>
                        </div>
                        <div class="col-50">
                           <select name="pre_id">
                                <?php
                                $stmt = $conn->prepare("SELECT * FROM prefix");
                                $stmt->execute();
                                $result = $stmt->fetchAll();

                                foreach($result as $row){
                                    echo "<option value=".$row['preid'].">".$row['pretxt']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label>ชื่อ:</label>
                        </div>
                        <div class="col-50">
                            <input type="text" name="fname" placeholder="กรอกชื่อ">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label>นามสกุล:</label>
                        </div>
                        <div class="col-50">
                            <input type="text" name="lname" placeholder="กรอกนามสกุล">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-75">
                            <input type="submit" name="submit" value="บันทึก">
                        </div>
                    </div>
                </form>
            </div>
        </article>
    </section>

    <?php require_once('../theme/footer.php'); ?>

</body>

</html>