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


    if(isset($_POST['m_id'])){

        $id = $_POST['m_id'];
        $preid = $_POST['preid'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];

        $stmt = $conn->prepare("UPDATE users SET pre_id  =:preid, fname = :fname, lname = :lname WHERE id =:id");

        $stmt->bindParam(':preid', $preid);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
?>
    <script>

    Swal.fire({
        title: "แจ้งเตือนการแก้ไข",
        text: "แก้ไขข้อมูลสำเสร็จ",
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