<?php
require_once ('../conf/config.php');
include ('./class_img.php');

$data = new Database();
$db = $data->getConnetction();

$uploader = new imgupload($db);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../assets/sweetalert2/package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../assets/sweetalert2/package/dist/sweetalert2.min.css">
</head>

<body>

    <?php

if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_FILES['url_img'])){

  $id=$_POST['per_id']; 
$stmt=$db->prepare("SELECT * FROM img WHERE user_id = :id");
$stmt->bindParam(':id', $id);
  $stmt->execute();
  if($stmt->rowCount() > 0 ){
?>
    <script>
    Swal.fire({
        title: 'แจ้งเตือน',
        text: 'ผู้ใช้นี้มีข้อมูลรูปภาพอยู่แล้ว',
        icon: 'warning'
    }).then(() => {
        window.location.href = '../person.php';
    });
    </script>

    <?php

  }else{
  $result = $uploader->upload($_FILES['url_img']);
    if($result !== true){

?>
    <script>
    Swal.fire({
        title: 'เกิดข้อผิดพลาด',
        text: 'ไม่สามารถอัปโหลดรูปภาพได้',
        icon: 'error',
    }).then(() => {
        window.location.href = '../person.php';
    });
    </script>

    <?php  

  }else{

?>

    <script>
    Swal.fire({
        title: 'สำเร็จ',
        text: 'อัปโหลดรูปภาพเรียบร้อยแล้ว',
        icon: 'success',
    }).then(() => {
        window.location.href = '../person.php';
    });
    </script>

    <?php

  }
 }
}

?>
</body>

</html>