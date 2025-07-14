<?php
require_once ('../conf/config.php');

$db = new Database();
$conn=$db->getConnetction();

if(isset($_POST['MM_id'])){

    $id = $_POST['MM_id']; 

    $stmt = $conn->prepare("DELETE FROM users WHERE id=:id"); 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $result = $stmt->execute();
?>
<script>
window.open('../person.php', '_self');
</script>
<?php        
    }
?>