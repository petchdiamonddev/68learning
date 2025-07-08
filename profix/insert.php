<?php
require_once ('../conf/config.php');
    
$db = new Database();
$conn=$db->getConnetction();


    if(isset($_POST['pretxt'])){
        $pretxt = $_POST['pretxt'];
        $stmt = $conn->prepare("INSERT INTO prefix (pretxt) VALUES (:pretxt)");
        $stmt->bindParam(':pretxt', $pretxt, PDO::PARAM_STR);
        $result = $stmt->execute();
?>
<script>
    window.open('../profix.php', '_self');
</script>
<?php        
    }
?>