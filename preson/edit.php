<?php
require_once ('../conf/config.php');
    
$db = new Database();
$conn=$db->getConnetction();


    if(isset($_POST['MM_id'])){

        $preid = $_POST['MM_id'];
        $pretxt = $_POST['pretxt'];


        $stmt = $conn->prepare("UPDATE prefix SET pretxt  =:pretxt WHERE preid =:id");

        $stmt->bindParam(':pretxt', $pretxt);
        $stmt->bindParam(':id', $preid);
        $result = $stmt->execute();
?>
<script>
    window.open('../profix.php', '_self');
</script>
<?php        
    }
?>