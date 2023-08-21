<?php

session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_FILES["file"])){
    include 'connect.php';

    $file=$_FILES['file'];
    $username=$_SESSION['username'];

    $allowedExtensions = array("c", "cpp", "java", "html", "css");
    $fileExtension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    if (in_array($fileExtension, $allowedExtensions)) {
        // Generate a unique filename to prevent naming conflicts
        $uniqueFilename = uniqid() . "_" . $file["name"];
        $uploadPath = "upload/" . $uniqueFilename;

          if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
 
            $filename = $file["name"];
            $filePath = $uploadPath;



             // Prepare and execute the SQL query to insert file metadata into the database
            $sql = "INSERT INTO `file_store` (username,filee,file_path) VALUES ('$username', '$filename', '$filePath')";
            $result=mysqli_query($con,$sql);
                 if($result){
                         echo "fil uploaded successfully ";
                        
                    }else{
                        die(mysqli_error($con));
                    }
          } else {
            echo "Error: File upload failed.";
        }
    } else {
        echo "Error: Invalid file type. Allowed types are: " . implode(", ", $allowedExtensions);
    }
}





    




?>