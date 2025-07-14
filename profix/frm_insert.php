
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
                <h1 class="text-center">เพิ่มคำนำหน้า</h1>
                <div>
                    <form action="../profix/insert.php" method="post">
                        <div class="col-25">
                            <label for="pretxt">คำนำหน้า</label>
                        </div>
                        <div class="row">
                        
                            <div class="col-50">
                                <input type="text" id="pretxt" name="pretxt" placeholder="กรอกคำนำหน้าชื่อ">
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-75">
                            <input type="submit" value="เพิ่มข้อมูล">
                        </div>
                        </div>
                    </form>
                </div>
        </article>
    </section>

<?php require_once('../theme/footer.php');?>

</body>

</html>