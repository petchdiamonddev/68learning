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


    if(isset($_POST['submit'])){
        $pre_id = $_POST['pre_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];

        $stmt = $conn->prepare("INSERT INTO users (pre_id, fname, lname) VALUES (:pre_id, :fname, :lname)");
        $stmt->bindParam(':pre_id', $pre_id, PDO::PARAM_INT);
        $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
        $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
        $result = $stmt->execute();
?>
    <script>

    Swal.fire({
        title: "แจ้งเตือนการบันทึก",
        text: "บันทึกข้อมูลสำเสร็จ",
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