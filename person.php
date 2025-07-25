<?php
include('./conf/config.php');
$db = new Database();
$conn = $db->getConnetction();

$stmt = $conn->prepare("SELECT * FROM users, prefix WHERE prefix.preid = users.pre_id");
$stmt->execute();

$result = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <h2 class="text-center">การเขียนโปรแกรม OOP</h2>
    </header>

    <section>
        <?php require_once('./theme/nav.php'); ?>
        <article>
            <h1>ข้อมูลบุคลากร</h1>
            <button class="btn"><a href="./preson/frm_insert.php">เพิ่มบุคลากร</a></button>
            <table>
                <thead>
                    <th>ลำดับ</th>
                    <th>รูป</th>
                    <th>รายละเอียด</th>
                    <th>จัดการ</th>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($result as $row) {
                        
                    $stmt2 = $conn->prepare("SELECT * FROM img WHERE user_id = '$row[id]'");
                    $stmt2->execute();
                    $res2 = $stmt2->fetch();                        
                        
                    ?>

                        <tr class="text-center">
                            <td><?php echo $i; ?></td>
                            <td class="text-center"> <img src="<?=substr($res2['url_img'],1);?>" style="width: 80; height: 100px;"></td>
                            <td><?php echo $row['pretxt'] . "     " . $row['fname'] . " " . $row['lname']; ?></td>
                            <td class="text-cent">
                                <button class="btn btn2"><a href="./preson/frm_img.php?id=<?php echo $row['id']; ?>">รูปไปรไฟล์</a></button>
                                <button class="btn btn1"><a href="./preson/frm_edit.php?id=<?php echo $row['id']; ?>">แก้ไข</a></button>
                                <button class="btn btn3"><a href="./preson/frm_del.php?id=<?php echo $row['id']; ?>">ลบ</a></button>
                            </td>

                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </article>
    </section>

    <?php require_once('./theme/footer.php'); ?>

</body>

</html>