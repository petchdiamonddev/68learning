<?php
require_once ('../conf/config.php');
    
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
    window.open('../person.php', '_self');
</script>
<?php        
    }
?>