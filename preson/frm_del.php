<?php  
include ('../conf/config.php');
$db = new Database();
$conn=$db->getConnetction();

if(isset($_GET['id']) != ""){
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM users, prefix WHERE users.pre_id=prefix.preid AND users.id =:id");
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
            <h1 class="text-center">ลบข้อมูลบุคลากร</h1>
            <div>
                <form action="./del.php" method="post">
                    <div class="row">
                        <div class="col-25">
                            <label>ชื่อ-สกุล:</label>
                        </div>
                        <div class="col-50">
                            <input type="text" name="fullNameDisplay" value="<?php echo $result['pretxt']." ".$result['fname']." ".$result['lname']; ?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-75">
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                            <input type="submit" name="submit" value="ยืนยันการลบ">
                        </div>
                    </div>
                </form>
            </div>
        </article>
    </section>

    <?php require_once('../theme/footer.php'); ?>

</body>

</html>