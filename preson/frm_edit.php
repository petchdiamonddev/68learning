<?php  
include ('../conf/config.php');
$db = new Database();
$conn=$db->getConnetction();

if(isset($_GET['id']) != ""){
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch();
}

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
            <h1 class="text-center">แก้ไขชื่อ-สกุล</h1>
            <div>
                <form action="./edit.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                    <div class="row">
                        <div class="col-25">
                            <label>คำนำหน้าชื่อ:</label>
                        </div>
                        <div class="col-50">
                           <select name="preid">
                                <?php
                                $stmt2 = $conn->prepare("SELECT * FROM prefix");
                                $stmt2->execute();
                                $res2 = $stmt2->fetchAll();
                                foreach ($res2 as $row2) {
                                ?>
                                    <option value="<?php echo $row2['preid']; ?>" <?php if (!(strcmp($result['pre_id'], $row2['preid']))) { echo 'selected="selected"'; } ?>>
                                        <?php echo $row2['pretxt']; ?>
                                    </option>
                                <?php
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
                            <input type="text" name="fname" value="<?php echo $result['fname']; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label>นามสกุล:</label>
                        </div>
                        <div class="col-50">
                            <input type="text" name="lname" value="<?php echo $result['lname']; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-75">
                            <input type="hidden" name="m_id" value="<?php echo $result['id'];?>">
                            <input type="submit" name="submit" value="บันทึก">
                        </div>
                    </div>
                </form>
            </div>
        </article>
    </section>
    <?php require_once('../theme/footer.php');?>
</body>

</html>