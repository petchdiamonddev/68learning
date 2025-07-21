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

        $preid = $_POST['MM_id'];
        

        $stmt = $conn->prepare("DELETE FROM prefix WHERE preid =:id");

        $stmt->bindParam(':id', $preid);
        $result = $stmt->execute();
?>
    <script>

    Swal.fire({
        title: "แจ้งเตือนการลบ",
        text: "ลบข้อมูลสำเสร็จ",
        icon: "success"
    }).then(function (){
        window.open('../profix.php', '_self');
    });
    </script>
    <?php        
    }
?>

</body>

</html>