<?php
$up_success=0;
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
                        //  
                        $up_success=1;
                        
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body{
        height:700px;
    }
    button{
        border-radius: 8px;
        width: 70px;
        color: aliceblue;
        background-color: red;
        box-shadow:  0 5px 15px green;
    }
    .up_success{
            background-color: aqua;
            text-decoration: solid;
            text-overflow: ellipsis;
        }
        .file_input{
    border-radius: 25px;
    background-color: black;
    height: 50px;
    width: 35%;
    padding: 50px 10px;
    margin-top: 100px;
    margin-left: 110px;
    box-shadow: 0 5px 15px yellow;
    cursor: pointer;
}
.div2{
    border-radius: 25px;
    background-color: black;
    height: 50px;
    width: 90%;
    margin-left: 700px;
    margin-top: -129px;
    padding: 50px 10px;
    box-shadow: 0 5px 15px yellow;
    cursor: pointer;
}
.file{
            background-color: aqua;
            height: 30px;
            width: 50%;
            color: black;
            text-decoration: solid;
            margin-left: 30px;
            margin-top: 10px;
            border-radius: 10px;
            padding-top:8px;
            padding-left:10px;
        }
        .upload_text{
            color:white;
            margin-top:-20px;
            margin-left:135px;
        }
        .sub{
            margin-left:30px;
        }

</style>
<body style="background-image: linear-gradient(white,yellow);">
    <header id="header">
        <a href="#"><img src="image/th.jpg" width="85" height="100" class="logo" alt=""></a>
        <nav>
            <ul id="navbar">
                <li><a href="ayush.html">Home</a></li>
                <li><a href="algorithm.html">Algorithms</a></li>
                <li><a href="contact.html">contact</a></li>
                <li><a href="about.html">About</a></li>
                <li><a class="active"  href="sonu.php" id="ccc">My CODE</a></li>
                <i id="close" class="fa-solid fa-xmark"></i>
            </ul>
            <div class="data"><h2 style="font-family: cursive;">DSA BY Mr.Sibo Prasad Patro</h2></div>
        </nav>
    <button style="backgroung-color=sky"><a href="logout.php">Log out</a></button>
        
    </header>
   
    <!-- <h1>jay shree RAM </h1>
    <h2>
       // <?php
        echo $_SESSION['username'];
        
        ?>
    </h2> -->
    <section class="conteeeeent">
    <div class="file_input">
        <form action="sonu.php" method="POST" enctype="multipart/form-data" > 
            <h2 class="upload_text">SELECT FILE HERE</h2>
            <input type="file" name="file" id="file" class="file" value="file">
            <input type="submit" class="sub" value="Upload ->" name="submit" >
        </form>
    <div>
        <div class="div2" onclick="window.location.href='myfiles.php';">
            <h3 class="h33">MY FILES</h3>
        </div>
    </section>
   
    </div>
    <?php
    if($up_success){
        echo "<div class=\"up_success\">
        <h2>file uploaded successfully</h2>
    </div>";
    }
    ?>
</body>
</html>