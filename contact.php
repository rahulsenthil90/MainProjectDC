<?php

include("dbconn.php");

if(isset($_POST['reg'])){
$name = $_POST['name'];
$phonenumber = $_POST['phonenumber'];
$mail = $_POST['mail'];
$problem = $_POST['problem'];



$insert = "INSERT INTO contactus VALUES ('','$name', '$phonenumber', '$mail', '$problem')";
$qry = mysqli_query($conn, $insert);
if($qry)
{ 

echo"
<script language='javascript'>
alert('Problem Updated');
window.location.href='contact.php';
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
<title>DC Contact</title>
<link rel="icon" href="img/logo.png"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Martian+Mono:wght@200;400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<style>
*{
padding:0;
margin:0;
box-sizing: border-box;
font-family: 'Josefin Sans', sans-serif;
}
body{
height:500px;
width:100%;
background-image: url("img/contact1.jpg");
background-size: cover;
background-position: center;
display: flex;
align-items: center;
justify-content: center;
padding: 0 10%;
}
.contact{
margin-top: 8%;
margin-right: 60%;
width: 100%;
max-width: 470px;
padding: 30px 20px;
background: rgba(174, 171, 171, 0.121);
border: 2px solid #3a1b22;
border-radius: 16px;
}
.contact-form h1{
font-size: 60px;
color: #fff;
margin-bottom: 20px;
}
span{
color: #f9004d;
}
.contact-form form{
position:relative
}
.contact-form form input,form textarea{
width: 100%;
padding: 7px;
border: none;
outline: none;
background: #aca6a63c;
color: #fff;
font-size: 1.1rem;
margin-bottom: 0.7rem;
border-radius: 10px;
}
.contact-form textarea{
resize:none;
height:200px;
}
.contact-form form .btn{
display:inline-block;
background: #f9004d;
font-size: 1.1rem;
letter-spacing: 1px;
text-transform: uppercase;
font-weight: 600;
border: 2px solid transparent;
border-radius: 10px;
width: 220px;
transition: ease .20s;
cursor: pointer;
}
.contact-form form .btn:hover{
border:2px solid #f9004d;
background: transparent;
transform: scale(1.1);
}
.contact-form form a{
margin-left: 10px;
color: rgb(203, 224, 224);
text-decoration: none;
}
.contact-form form a:hover{
text-decoration: underline;
}
</style>
<body>
<section class="contact">
<div class="contact-form">
<h1>Contact<span> Us</span></h1><br>
<form autocomplete="off" action="" method="POST" class="form">
<input type="" name="name" placeholder="Your Name" required>
<input type="email" name="mail" id="" placeholder="E-mail" required>
<input type="" name="phonenumber" placeholder="mobile no" maxlength="10" required>
<textarea name="problem" id="" cols="30" rows="10" placeholder="Your Message" required>
</textarea>
<center><input type="submit" name="reg" value="Submit" class="btn"> 
<br><a href="index.php">Back</a></center>
</form>
</div>
</section>
</body> 
</html>