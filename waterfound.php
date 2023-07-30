<?php

include("dbconn.php");

$id=$_GET['id'];

session_start();
if($_SESSION['id']==''){
    header("location:index.php");
}


$sel1 = "SELECT * FROM userreg WHERE phonenumber='$_SESSION[id]'";
$qry1 = mysqli_query($conn, $sel1);
$fet1 = mysqli_fetch_assoc($qry1);

$sel2 = "SELECT * FROM shipper WHERE id='$id'";
$qry2 = mysqli_query($conn, $sel2);
$fet2 = mysqli_fetch_assoc($qry2);


if(isset($_POST['bookwater'])){
    $tid = $_POST['tid'];
    $tname = $_POST['tname'];
    $tphone = $_POST['tphone'];
    $sname = $_POST['sname'];
    $semail = $_POST['semail'];
    $sphone = $_POST['sphone'];
    $saddress = $_POST['saddress'];
    $volume = $_POST['volume'];

    $insert = "INSERT INTO waterfound VALUES ('','$tid','$tname','$tphone','$sname','$semail','$sphone','$saddress','$volume','BOOKED')";
    $sel = mysqli_query($conn, $insert);
    if($sel){
        echo"
        <script>
            alert('WATER SERVICE BOOKED');
            window.location.href='water.php'
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
    height: 100vh;
    padding: 0px;
    overflow:hidden ;
    }
    .main{
    background: rgba(15, 11, 11, 0.917);
    width:1000px;
    height:650px;
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
                                    <span class="text">Recovery Vechile Detail</span>
                                    <input type="text" name="name" value="<?php echo $fet['cname'].", ".$fet['caddress'].", ".$fet['phonenumber'] ?>" required readonly>
                                    <input type="hidden" name="tname" value="<?php echo $fet['cname'] ?>" />
                                    <input type="hidden" name="tid" value="<?php echo $fet['id'] ?>" />
                                    <input type="hidden" name="tphone" value="<?php echo $fet['phonenumber'] ?>" />
                                </div>
                            <?php
                        }

                        ?>
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
                    <input type="tel" name="sphone" value="<?php echo $fet1['phonenumber'] ?>" maxlength="10" placeholder="Phone Number" required>
                </div>
                <div class="input-box">
                    <span class="text">Delivery Address</span>
                    <input type="tel" name="saddress" placeholder="Delivery Address" required>
                </div>
                <div class="input-box">
                    <span class="text">Volume[in Liters]</span>
                    <input type="number" id="volume" name="volume" min="0" placeholder="Please enter the volume" required>
                    </div>
            </div>
                    <div class="btn">
                    <input type="submit" name="bookwater" value="Book Water Service">
                    </div>
                    </form>
                    </section>
                </form>
            </main>                 
</body>
</html>