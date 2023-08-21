<?php
$retrive;
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
include 'connect.php';


$username = $_SESSION["username"]; 
$sql = "SELECT * FROM file_store WHERE username = '$username'";
$result = $con->query($sql);

// Display the list of files
if ($result->num_rows <= 0) {
    // while ($row = $result->fetch_assoc()) {
    //     echo '<a href="' . $row["file_path"] . '">' . $row["filee"] . '</a><br>';
    // }

    echo "No files uploaded yet.";
}else{
    $retrive=1;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
         body{
            background-image: linear-gradient(white,yellow);
            background-repeat: no-repeat;
            height:700px;
        }
        h1{
            color:green;
            
        }
        #fileList{
            background-color: aqua;
            text-decoration: none;
            border-radius: 10px;
            width:50%;
            height:300px;
            margin-left:300px;
            margin-top:50px;
            padding-left:50px;

        }
        button{
        border-radius: 8px;
        width: 70px;
        color: aliceblue;
        background-color: red;
        box-shadow:  0 5px 15px green;
    }
    </style>
</head>
<body >
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
<h1 style="text-align:center;">My Files</h1>
    
    
    <div id="fileList">
        <p>click on the file to open</p>
    <?php
        while ($row = $result->fetch_assoc()) {
        echo '<h1><a href="' . $row["file_path"] . '">' . $row["filee"] . '</a></h1 ><br>';
    }
    ?>
    </div>
    <!-- <script>
        // JavaScript code to handle button click
        document.getElementById("retrieveFiles").addEventListener("click", function() {
            // Send an AJAX request to a PHP file to retrieve user's files
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "myfiles.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("fileList").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        });
    </script> -->
</body>
</html>