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
            <h1 class="text-center">เพิ่มรูปโปไฟล์</h1>
            <div>
                <form action="../preson/upimg.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-25">
                            <label>ชื่อ:</label>
                        </div>
                        <div class="col-50">
                            <input type="text" name="fname"
                                value="<?php echo $result['fname']. " ".$result['lname']; ?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label>รูปภาพ:</label>
                        </div>
                        <div class="col-50">
                            <input type="file" name="url_img" id="imginput" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label>ตัวอย่างรูปภาพ:</label>
                        </div>
                        <div class="col-50">
                            <img id="preview" src="" style="max-width: 300px; max-height: 330;">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-75">
                            <input type="hidden" name="per_id" value="<?php echo $result['id']; ?>">
                            <input type="submit" name="submit" value="บันทึก">
                        </div>
                    </div>
                </form>
            </div>
        </article>
    </section>
    <script src="../js/preview.js"></script>
    <?php require_once('../theme/footer.php'); ?>

</body>

</html>