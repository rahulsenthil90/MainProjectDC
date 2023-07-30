<?php

include("dbconn.php");
session_start();
if(isset($_POST['login'])){
    $username = $_POST['phone'];
    $password = $_POST['pass'];
    $epass = sha1($password);


    $query ="select * from driverreg where phonenumber='$username' and upassword='$epass' and urole='Shipper'";
    $result =mysqli_query($conn,$query);

    $query0 ="select * from driverreg where phonenumber='$username' and upassword='$epass' and urole='Driver'";
    $result0 =mysqli_query($conn,$query0);

    $query1 ="select * from userreg where phonenumber='$username' and upassword='$epass'";
    $result1 =mysqli_query($conn,$query1);

    if($row=mysqli_fetch_assoc($result))
    {
        $_SESSION['id']=$username;
        header("location:shipperdashboard.php");

    }elseif($row1=mysqli_fetch_assoc($result0)){
        $_SESSION['id']=$username;
        header("location:driverdashboard.php");

    }
    elseif($row1=mysqli_fetch_assoc($result1)){
        $_SESSION['id']=$username;
        header("location:dashboard.php");

    }
    else
    {
    echo"<script language='javascript'>
    alert('INCORRECT PASSWORD AND USERANAME');
    window.location.href='log.php';
    </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC Login</title>
    <link rel="icon" href="img/logo.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@200;400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<style>
    *{
    padding:0;
    margin:0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    height:200px;
    width:100%;
    background-image: url("img/Login.jpg");
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 10%;
}
.container{
    margin-top: 40%;
    margin-left: 60%;
    width: 100%;
    max-width: 470px;
    padding: 30px 20px;
    background: rgba(250, 247, 247, 0.756);
    border: 2px solid #3a1b22;
    border-radius: 16px;
}
.container h1{
    text-align: center;
    color: #fff;
    font-size: 50px;
    font-weight: 600;
    padding: 0 0 8px 0;
}
.container form{
    padding: 0 50px;
}
form .main{
    position: relative;
    margin: 30px 0;
    border-bottom: 2px solid #3a1b22;
}
.main input{
    width: 100%;
    padding: 0 5px;
    font-size: 1rem;
    height: 40px;
    border: none;
    outline: none;
    background: none;
    color: #0a0303;
}
.main label{
    position: absolute;
    top: 50%;
    left: 6px;
    color: #b2405d;
    transform:translateY(-50%);
    font-size: 1.1rem;
    pointer-events: none;
    transition: all .40s ease;
}
.main span::before{
    position: absolute;
    content:'';
    left:0;
    top:35px;
    font-size: large;
    width: 100%;
    height: 2px;
}
.main input:focus ~ label,
.main input:valid ~ label{
    top:-3px;
    color: #070202;
}
.pass{
    margin: -6px 0 20px 5px;
    color:#0f0606;
    cursor: pointer;
}
.pass:hover{
    text-decoration: underline;
}
input[type="submit"]{
    height:45px;
    width:100%;
    border: none;
    background: #b2405d;
    color: #fff;
    font-size: 1.1rem;
    border-radius: 16px;
    cursor: pointer;
}
.s4{
    color:#f9004d;
    font-size: 55px;
}
h2{
    color: white;
    font-size: 40px;
}
.signup{
    color:#b2405d;
    font-size: 1rem;
    text-align: left;
    margin: 30px 0;
    cursor: pointer;
}
.signup a{
    margin-left: 10px;
    color: rgb(203, 224, 224);
    text-decoration: none;
}
.signup a:hover{
    text-decoration: underline;
}


</style>
<body>
    
    <div class="container">
        <i><h2><center><span class="s4">D</span>eliver    <span class="s4">C</span>hoice</i></center></h2></i>
        <form autocomplete="off" action="" method="post">
            <div class="main">
                <input type="tel" name="phone" maxlength="10" required>
                <span></span>
                <label>Phone No</label>
            </div>
            <div class="main">
                <input type="password" name="pass" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">Forget Password?</div>
            <input type="submit" name="login" value="Log In">
            <div class="signup">
                Not a user/member?<br>
                <a href="reg.html">User Sign up here </a><br>
                <a href="mreg.html">Member Sign up here</a>
                <center><a href="index.php">Back</a></center>
            </div>
        </form>
    </div>
</body>
</html>