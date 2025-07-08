<?php
require_once ('../conf/config.php');
    
$db = new Database();
$conn=$db->getConnetction();


    if(isset($_POST['MM_id'])){

        $preid = $_POST['MM_id'];
        

        $stmt = $conn->prepare("DELETE FROM prefix WHERE preid =:id");

        $stmt->bindParam(':id', $preid);
        $result = $stmt->execute();
?>
<script>
    window.open('../profix.php', '_self');
</script>
<?php        
    }
?>