<?php
include_once('./conf/config.php');
$db = new Database();
$conn=$db->getConnetction();

$query = $conn->prepare("SELECT * FROM prefix");
$query->execute();
$result = $query->fetchAll();

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
 <?php  require_once('./theme/nav.php'); ?>
        <article>
           <h1>ข้อมูลนำหน้า</h1> </a> 
           <button class="btn"><a href="./profix/frm_insert.php">เพิ่มคำนำหน้า</a></button>

            <table>
                <thead>
                    <th>ลำดับ</th>
                    <th>รายละเอียด</th>
                    <th>จัดการ</th>
                </thead>
                <tbody>
<?php

 $i=1; foreach($result as $row) { ?>
                            <tr class="text-center"> 
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['pretxt'] ?></td>
                                <td class="text-cent">
                                    <button class="btn btn1"><a href="./profix/frm_edit.php?id=<?php echo $row['preid']; ?>">แก้ไข</a></button>
                                    <button class="btn btn3"><a href="./profix/frm_del.php?id=<?php echo $row['preid']; ?>">ลบ</a></button>
                                </td>
                            </tr>
                    <?php $i++; } ?>
                </tbody>
             </table>
        </article>
    </section>

<?php require_once('./theme/footer.php');?>

</body>

</html>