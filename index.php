<?php
$succes=0;
$user=0;


if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];


    // $sql="insert into `registration` (username,password) values('$username','$password')";
    // $result=mysqli_query($con,$sql);
    // if($result){
    //     echo "data inserted successfully";
    // }else{
    //     die(mysqli_error($con));
    // }
    $sql="select * from `registration` where username='$username'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            // echo "user already exist";
            $user=1;
        }else{
                 $sql="insert into `registration` (username,password) values('$username','$password')";
                 $result=mysqli_query($con,$sql);
                 if($result){
                        // echo "Sign UP successful";
                        $succes=1;
                    }else{
                        die(mysqli_error($con));
                    }
        }
    }

}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signuppage</title>
    <style>
        div{
            
            justify-content: center;
            background-image: linear-gradient(red,skyblue);
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
            margin-left:440px;
            margin-top:150px;
        }
        
     section{
        border-radius: 20px;
        margin-left: 400px;
        margin-top:80px;
        width:20%;
        background-color:  rgb(255, 178, 178);
        color: rgb(195, 0, 0);
        
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
            background-image: linear-gradient(skyblue,red);
            background-repeat: no-repeat;
            height:700px;
        }
        
    </style>
</head>
<body>
<marquee behavior="direction" direction="linear-gradient"><h3>data structure and algorithm by SIBO PATRO <i><b>sign UP page</b></i></h3></marquee>

    <?php
    if($user){
        echo "<section>
        <h3><strong><i>User Already exist -- enter valid user</i></strong></h3>
    </section><style></style>";
    }
    ?>
    <?php
    if($succes){
        echo "<nav>
        <h3><strong><i>Success!!-your successfully signed up</i></strong></h3>
    </nav><style></style>";
    }
    ?>
    <h1>Sign UP here</h1>
    <form action="sign.php" method="post">
        <div>
            <h2>create username :</h2>
            <input type="text" name="username" style="width:90%" placeholder="enter username" required><br>
            <h2>create password :</h2>
            <input type="password" name="password" style="width:90%" placeholder="enter password" required><br><br>
            <input type="submit" class="sub" value="Sign up" name="submit" >
        </div>
    </form>
    <aside><h3>already a user login here <button style="background-color: darkorchid;"><a href="login.php"><b><i> Login </i></b></a></button></h3></aside>
</body>
</html>