<?php require_once ('../conf/config.php'); ?>


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
$db = new Database();
$conn=$db->getConnetction();

if(isset($_POST['MM_id'])){

    $id = $_POST['MM_id']; 
    $img = $_POST['MM_img']; 

    @unlink($img);

    $stmt = $conn->prepare("DELETE FROM users WHERE id=:id"); 
    $stmt->bindParam(':id', $id); 
    $result = $stmt->execute();


    $stmt2 = $conn->prepare("DELETE FROM img WHERE user_id=:id"); 
    $stmt2->bindParam(':id', $id); 
    $result2 = $stmt2->execute();
    ?>
    





    <script>

    Swal.fire({
        title: "แจ้งเตือนการลบ",
        text: "ลบข้อมูลสำเสร็จ",
        icon: "success"
    }).then(function (){
        window.open('../person.php', '_self');
    });
    </script>
    <?php        
    }
?>

</body>

</html>