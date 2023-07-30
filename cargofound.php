<?php

include("dbconn.php");
session_start();
if($_SESSION['id']==''){
header("location:index.php");
}


$sel1 = "SELECT * FROM userreg WHERE phonenumber='$_SESSION[id]'";
$qry1 = mysqli_query($conn, $sel1);
$fet1 = mysqli_fetch_assoc($qry1);
$id=$_GET['id'];

$sel2 = "SELECT * FROM shipper WHERE id='$id'";
$qry2 = mysqli_query($conn, $sel2);
$fet2 = mysqli_fetch_assoc($qry2);


if(isset($_POST['bookcargo'])){
$cid = $_POST['cid'];
$cname = $_POST['cname'];
$cphone = $_POST['cphone'];
$sname = $_POST['sname'];
$semail = $_POST['semail'];
$sphone = $_POST['sphone'];
$shiptype = $_POST['shiptype'];
$weight = $_POST['weight'];
$saddress = $_POST['saddress'];
$rname = $_POST['rname'];
$remail = $_POST['remail'];
$rphone = $_POST['rphone'];
$raddress = $_POST['raddress'];

$insert = "INSERT INTO cargofound VALUES ('','$cid','$cname','$cphone','$sname','$semail','$sphone','$saddress','$shiptype','$weight','$rname','$remail','$rphone','$raddress','BOOKED')";
$sel = mysqli_query($conn, $insert);
if($sel){
echo"
<script>
alert('ORDER BOOKED');
window.location.href='cargo.php'
</script>
";
}

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DC Truck Rent</title>

<link rel="icon" href="img/logo.png"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Martian+Mono:wght@200;400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<style>
*{
box-sizing: border-box;
padding: 0;
margin: 0;
font-family: 'Poppins', sans-serif;
}
body{
display: flex;
align-items: center;
justify-content: center;
height: 150vh;
padding: 0px;
}
.main{
background: rgba(15, 11, 11, 0.917);
width:1000px;
height:1000px;
padding: 10px 70px;
border-radius: 1rem;
}
.heading{
position: relative;
font-size: 30px;
font-weight: 700;
color:#fff;
margin-bottom: 5px;
}
.heading::before{
position:absolute;
content: '';
left: 0;
bottom: -8px;
height: 3px;
width: 60px;
background: #f40a64;
}
.title{
color:#000;
font-size: 18px;
font-weight: 900;
font-style:italic;
font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
form .main-box{
display: flex;
flex-wrap: wrap;
justify-content: space-between;
margin: 0px 0 0px 0;
}
form .main-box .input-box{
width: calc(90%/2);
margin: 15px 0;
}
form .main-box .input-box input{
width: 100%;
height: 50px;
background: rgba(255, 255, 255, 0.776);
color:#000;
outline: none;
border-radius: 8px;
border:1px solid rgba(255,255,255,.09);
padding-left: 17px;
font-size: 1rem;
transition: all .40s;
}
form .input-box1 input{
width: 100%;
height: 50px;
background: rgba(255, 255, 255, 0.776);
color:#000;
outline: none;
border-radius: 8px;
border:1px solid rgba(255,255,255,.09);
padding-left: 17px;
font-size: 1rem;
transition: all .40s;
}
.input-box1 .text{
display: block;
margin-bottom: 8px;
margin-top: 5%;
font-size: larger;
color: #faf9f6;
font-weight: 500;
}
.text1{
display: block;
margin-bottom: 8px;
margin-top: 5%;
color: #faf9f6;
font-size: larger;
font-weight: 900;

}
form .main-box .input-box select{
width:100%;
height: 50px;
padding: 10px;
font-size: 1rem;
border: none;
color: rgba(125, 122, 113, 0.792);
border:1px solid rgba(255,255,255,.09);
border-radius: 4px;
background-color: rgba(255, 255, 255, 0.776);
}
form .main-box .input-box option{
padding: 10px;
color: #0a0907;
}
.main-box .input-box .text{
display: block;
margin-bottom: 8px;
color: #faf9f6;
font-weight: 500;
}
form .main-box .input-box input:focus,
form .main-box .input-box input:valid{
border-color: #faf9f6;
}
form .btn{
height: 50px;
margin: 20px 0;
}
form .btn input{
height: 100%;
width: 100%;
outline: none;
background: rgba(255,255,255,.1);
color: #faf9f6;
border-radius: 8px;
border: none;
font-size: 20px;
font-weight: 500;
cursor: pointer;
transition: all .40s ease;
}
form .btn input:hover{
background: #ff328e;
}
form a{
margin-left: 10px;
color: rgb(203, 224, 224);
text-decoration: none;
}
form a:hover{
text-decoration: underline;
}
.s4{
color:#f9004d;
font-size: 55px;
}
h2{
color: white;
font-size: 40px;
}
</style>
<body>
<nav>
<?php include('sidenav.php') ?>
</nav>
<main>
<form autocomplete="off" id="form" action="#" method="POST" class="form">
<section class="main">
<i><h2><span class="s4">D</span>eliver    <span class="s4">C</span>hoice</h2></i>
<h1 class="heading">Booking Form</h1>
<form action="#">
<?php
foreach($qry2 as $fet){
?>

    <div class="input-box1">
        <span class="text">Shipper Detail</span>
        <input type="text" name="name" value="<?php echo $fet['cname']." ".$fet['caddress'].",".$fet['phonenumber'] ?>" required readonly>
        <input type="hidden" name="cname" value="<?php echo $fet['cname'] ?>" />
        <input type="hidden" name="cid" value="<?php echo $fet['id'] ?>" />
        <input type="hidden" name="cphone" value="<?php echo $fet['phonenumber'] ?>" />
    </div>
<?php
}

?>
<span class="text1">Sender Details</span>
<div class="main-box"> 


<div class="input-box">
<span class="text">Full Name</span>
<input type="text" name="sname" value="<?php echo $fet1['fname'] ?>" placeholder="Please enter your name" required>
</div>
<div class="input-box">
<span class="text">Email</span>
<input type="email" name="semail" value="<?php echo $fet1['email'] ?>" placeholder="Email" required>
</div>
<div class="input-box">
<span class="text">Phone Number</span>
<input type="tel" name="sphone" value="<?php echo $fet1['phonenumber'] ?>" placeholder="Phone Number" maxlength="10" required>
</div>
<div class="input-box">
    <span class="text">Shipment Type</span>
    <select id="" name="shiptype">
    <option value=""disabled selected>Select Cargo Type</option>
    <option value="Fragrile Material">Fragrile Material</option>
    <option value="Consumer Product">Consumer Product</option>
    <option value="Explosive">Explosive</option>
    <option value="Container">Container</option>
    <option value="Construction Material">Construction Material</option>
    </select>
</div>
<div class="input-box">
<span class="text">Weight in Tonnes</span>
<input type="tel" name="weight" placeholder="Enter tonnes" required>
</div>
<div class="input-box">
<span class="text">Pickup Address</span>
<input type="tel" name="saddress" placeholder="Pickup Address" required>
</div>
</div>
<span class="text1">Receiver Details</span>
<div class="main-box"> 


<div class="input-box">
<span class="text">Full Name</span>
<input type="text" name="rname" placeholder="Please enter your name" required>
</div>
<div class="input-box">
<span class="text">Email</span>
<input type="email" name="remail" placeholder="Email" required>
</div>
<div class="input-box">
<span class="text">Phone Number</span>
<input type="tel" name="rphone" placeholder="Phone Number" maxlength="10" required>
</div>
<div class="input-box">
<span class="text">Delivery Address</span>
<input type="tel" name="raddress" placeholder="Delivery Address" required>
</div>
</div>
<div class="btn">
<input type="submit" name="bookcargo" value="Book Cargo">
</div>
</form>
</section>
</form>
</main>

<script>
const states = {
"Andhra Pradesh": ["Anantapur", "Chittoor", "East Godavari"],
"Arunachal Pradesh": ["Tawang", "West Kameng", "East Kameng"],
"Assam": ["Baksa", "Barpeta", "Biswanath"],
"Tamil Nadu":["Ariyalur","Chennai","Coimbatore","Cuddalore","Dharmapuri","Dindigul","Erode","Kanchipuram","Kanyakumari","Karur","Krishnagiri","Madurai","Nagapattinam","Namakkal","Nilgiris","Perambalur","Pudukkottai","Ramanathapuram","Salem","Sivaganga","Thanjavur","Theni","Thoothukkudi","Tiruchirappalli","Tirunelveli","Tiruppur","Tiruvallur","Tiruvannamalai","Tiruvarur","Vellore","Viluppuram","Virudhunagar"]

// Add more states and their respective districts
};


const stateSelect = document.getElementById("states");
const districtSelect = document.getElementById("districts");

stateSelect.addEventListener("change", function() {
districtSelect.innerHTML = "";
districtSelect.innerHTML = "<option value=''>Select a District</option>";
if (this.value === "") return;
const districts = states[this.value];
districts.forEach(function(district) {
const option = document.createElement("option");
option.value = district;
option.text = district;
districtSelect.appendChild(option);
});
});


</script>                    
</body>
</html>