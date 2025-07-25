<?php
class imgupload{
    private $conn;

    private $uploadDir = "../upload/";

    public function __construct($db){
        $this->conn =$db;
    }
    public function upload($file){

    $per_id = $_POST['per_id'];

    $filename = basename($file['name']);

    $targetfile = $this->uploadDir. uniqid() . "_" . $filename;
    $imgFileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));
    $allowed =['jpg', 'jpeg', 'png','gif'];
    if(!in_array($imgFileType, $allowed)){
         return " Only jpg  jpeg  png gif ?";
    }
    if(move_uploaded_file($file['tmp_name'], $targetfile)){

        $stmt = $this->conn->prepare("INSERT INTO img (url_img, user_id) VALUES (:url_img, :user_id)");
        $stmt->bindParam(":url_img", $targetfile);
        $stmt->bindParam(":user_id", $per_id);
        if($stmt->execute()){
          return true;
       }
      return "ข้อผิดพลาด";
    }
    return "ไม่สามารถอัปโหลดรูปภาพได้";
    }
  }

?>