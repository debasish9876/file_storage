<?php
$login=0;
$invalid=0;


if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from `registration` where username='$username' and password='$password'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $login=1;
            session_start();
            $_SESSION['username']=$username;
            header('location:sonu.php');
        }else{
            $invalid=1;
                
        }
    }

}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <style>
        div{
            
            justify-content: center;
            background-image: linear-gradient(green,white);
            margin-left:400px;
            margin-top:20px;
            margin-right:770px;
            padding-left:20px;
            border-radius:10px;
        }
        .sub{
            background-color: #1cf7ff;
            width:100%;
            border-radius:25px;
            width:94%;
        }
        h1{
            margin-left:400px;
            margin-top:150px;
        }
        section{
        border-radius: 20px;
        margin-left: 400px;
        margin-top:80px;
        width:20%;
        background-color:  rgb(255, 178, 178);
        color: black;
        
     }
     nav{
        border-radius: 20px;
        margin-left: 400px;
        margin-top:80px;
        width:20%;
        background-color:  #8bf98b;
        color: black;
        
     }
     aside{
        margin-top: 20px;
            margin-left: 450px;
     }
     h3{
            text-decoration: none;
            color: black;
            font-weight: 400;
        }
        body{
            background-image: linear-gradient(white,green);
            background-repeat: no-repeat;
            height:700px;
        }

    </style>
</head>
<body >
<marquee behavior="direction" direction="linear-gradient"><h3>data structure and algorithm by SIBO PATRO <i><b>login page</b></i></h3></marquee>
<?php
    if($invalid){
        echo "<section>
        <h3><strong><i>invalid username and password</i></strong></h3>
    </section><style></style>";
    }
    ?>
    <?php
    if($login){
        echo "<nav>
        <h3><strong><i>login successfull !!!!!</i></strong></h3>
    </nav><style></style>";
    }
    ?>
    <h1>Login to MY CODE page</h1>
    <form action="login.php" method="post">
        <div>
            <h2>NAME</h2>
            <input type="text" name="username" style="width:90%" required placeholder="enter name"><br>
            <h2>PASSWORD :</h2>
            <input type="password" name="password" style="width:90%" required placeholder="enter password"><br><br>
            <input type="submit" class="sub" value="Login" name="submit" >
        </div>
    </form>
    <aside><h3>Not a user Sign up here : <button style="background-color: darkorchid;"><a href="sign.php"><b><i>Sign UP</i></b></a></button></h3></aside>

    


</body>
</html>