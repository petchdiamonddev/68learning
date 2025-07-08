<?php
require_once ('../conf/config.php');
    
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
    window.open('../person.php', '_self');
</script>
<?php        
    }
?>