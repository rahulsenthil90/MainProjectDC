<?php

include("dbconn.php");
session_start();

if($_SESSION['id']==''){
    header("location:index.php");
}

$sel1= "SELECT * FROM driverreg WHERE phonenumber='$_SESSION[id]'";
$qry1 = mysqli_query($conn, $sel1);
$fet1 = mysqli_fetch_assoc($qry1);

if(isset($_POST['accept'])){
    $id = $_POST['id'];
    $up = "UPDATE cargofound SET status='ACCEPT' WHERE id='$id'";
    $qr = mysqli_query($conn, $up);

    if($qr)
    { 
        echo"
                <script language='javascript'>
                alert('ACCEPT');
                window.location.href='shippernotify.php';
                </script>";
    }
}

if(isset($_POST['accept1'])){
    $id = $_POST['id'];
    $up = "UPDATE packerfound SET status='ACCEPT' WHERE id='$id'";
    $qr = mysqli_query($conn, $up);

    if($qr)
    { 
        echo"
                <script language='javascript'>
                alert('ACCEPT');
                window.location.href='shippernotify.php';
                </script>";
    }
}

if(isset($_POST['accept2'])){
    $id = $_POST['id'];
    $up = "UPDATE recoveryfound SET status='ACCEPT' WHERE id='$id'";
    $qr = mysqli_query($conn, $up);

    if($qr)
    { 
        echo"
                <script language='javascript'>
                alert('ACCEPT');
                window.location.href='shippernotify.php';
                </script>";
    }
}

if(isset($_POST['accept3'])){
    $id = $_POST['id'];
    $up = "UPDATE waterfound SET status='ACCEPT' WHERE id='$id'";
    $qr = mysqli_query($conn, $up);

    if($qr)
    { 
        echo"
                <script language='javascript'>
                alert('ACCEPT');
                window.location.href='shippernotify.php';
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
    <title>DC Shipper Notify</title>
    <link rel="icon" href="img/logo.png"/>
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Martian+Mono:wght@200;400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <style>
          *{
        padding: 0;
        margin: 0;
        font-family:'Josefin Sans',sans-serif;
        box-sizing: border-box;
        }

            .title{
        color:#000;
        font-size: 18px;
        font-weight: 900;
        font-style:italic;
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    .container{
        display: flex;
        align-items: left;
        justify-content: left;
        padding: 10px;
    }

    .container table{
        text-align: center;
        border: 2px solid #000;
        margin-left: 5%;
    }
    .container thead th{
        padding-left: 2rem;
        padding-right: 2rem;
        padding-top: 1rem;
        padding-bottom: 1rem;
        font-size: 1.5rem;
        margin-top: 10px;
        background-color: #000;
        color: #f9004d;
        border: 2px solid #666666;
    }

    .container td{
        padding-left: 2rem;
        padding-right: 2rem;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        font-size:1.5rem;
        background-color: lavender;
        
        border: 2px solid #000;
    }

    .container table tr:nth-child(odd){
    background-color: #f564a1;
    }

    .btn{
        padding: 10px 25px;
        background-color: #f9004d;
        color: black;
        font-style: oblique;
        transition: all .3s ease;
        border: none;
        overflow: hidden;
    }

    .btn:active{
        transform: scale(1.03);
    }

    .btn a{
        font-size:1.5rem;
    }


    
</style>
</head>

<body>
<nav>
        <?php include('shippersidenav.php') ?>
    </nav>
    <br>
    <h1 style="text-align: center; ">CUSTOMER DETAILS</h1>
<section class="container">
<table>
    <?php
    $q = "SELECT * FROM cargofound WHERE shippernumber = '$_SESSION[id]'";
    $qq = mysqli_query($conn, $q);

    $q1 = "SELECT * FROM packerfound WHERE packernumber = '$_SESSION[id]'";
    $qq1 = mysqli_query($conn, $q1);

    $q2 = "SELECT * FROM recoveryfound WHERE recoverynumber = '$_SESSION[id]'";
    $qq2 = mysqli_query($conn, $q2);

    $q3 = "SELECT * FROM waterfound WHERE waternumber = '$_SESSION[id]'";
    $qq3 = mysqli_query($conn, $q3);
    $i=1;
    if(mysqli_num_rows($qq)>0){
        ?>
            <thead>
                <th>S.No.</th>
                <th>Shipping Type</th>
                <th>Weight</th>
                <th>Sender Name</th>
                <th>Sender Mobile number</th>
                <th>Service From</th>
                <th>Receiver Name</th>
                <th>Receiver Mobile number</th>
                <th>Service To</th>
                <th>Status</th>
                <th>Book</th>
            </thead>
        <?php
        foreach($qq as $r){
            echo"
                <tr>
                    <td>".$i."</td>
                    <td>".$r['shiptype']."</td>
                    <td>".$r['weight']." Ton"."</td>
                    <td>".$r['sname']."</td>
                    <td>".$r['sphone']."</td>
                    <td>".$r['saddress']."</td>
                    <td>".$r['rname']."</td>
                    <td>".$r['rphone']."</td>
                    <td>".$r['raddress']."</td>
                    <td>".$r['status']."</td>
                    <form method='post' action=''>
                        <input type='hidden' name='id' value=".$r['id']." />
                        <td><button name='accept'>ACCEPT</button></td> 
                    </form>
                </tr>
            ";
            $i++;
        }
    }elseif(mysqli_num_rows($qq1)>0){
        ?>
            <thead>
                <th>S.No.</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>From Address</th>
                <th>To Address</th>
                <th>Date</th>
                <th>Status</th>
                <th>Book</th>
            </thead>
        <?php
        foreach($qq1 as $r){
            echo"
                <tr>
                    <td>".$i."</td>
                    <td>".$r['sname']."</td>
                    <td>".$r['sphone']."</td>
                    <td>".$r['saddress']."</td>
                    <td>".$r['raddress']."</td>
                    <td>".$r['date']."</td>
                    <td>".$r['status']."</td>
                    <form method='post' action=''>
                        <input type='hidden' name='id' value=".$r['id']." />
                        <td><button name='accept1'>ACCEPT</button></td> 
                    </form>
                </tr>
            ";
            $i++;
        }
    }elseif(mysqli_num_rows($qq2)>0){
        ?>
            <thead>
                <th>S.No.</th>
                <th>Sender Name</th>
                <th>Sender Mobile number</th>
                <th>Service From</th>
                <th>Service To</th>
                <th>Status</th>
                <th>Book</th>
            </thead>
        <?php
        foreach($qq2 as $r){
            echo"
                <tr>
                    <td>".$i."</td>
                    <td>".$r['sname']."</td>
                    <td>".$r['sphone']."</td>
                    <td>".$r['saddress']."</td>
                    <td>".$r['raddress']."</td>
                    <td>".$r['status']."</td>
                    <form method='post' action=''>
                        <input type='hidden' name='id' value=".$r['id']." />
                        <td><button name='accept2'>ACCEPT</button></td> 
                    </form>
                </tr>
            ";
            $i++;
        }
    }elseif(mysqli_num_rows($qq3)>0){
        ?>
            <thead>
                <th>S.No.</th>
                <th>Name</th>
                <th>Mobile number</th>
                <th>Address</th>
                <th>Volume</th>
                <th>Status</th>
                <th>Book</th>
            </thead>
        <?php
        foreach($qq3 as $r){
            echo"
                <tr>
                    <td>".$i."</td>
                    <td>".$r['sname']."</td>
                    <td>".$r['sphone']."</td>
                    <td>".$r['saddress']."</td>
                    <td>".$r['volume']."</td>
                    <td>".$r['status']."</td>
                    <form method='post' action=''>
                        <input type='hidden' name='id' value=".$r['id']." />
                        <td><button name='accept3'>ACCEPT</button></td> 
                    </form>
                </tr>
            ";
            $i++;
        }
    }
    ?>
    </table>
  
</section>
<br>

<br>
    <h1 style="text-align: center; ">SHIPPER DETAILS</h1>
<section class="container">
    
    <table>
            <thead>
                <th>S.No.</th>
                <th>FROM</th>
                <th>TO</th>
                <th>SHIP TYPE</th>
                <th>DATE</th>
                <th>TRUCK TYPE</th>
                <th>TRUCK SIZE</th>
                <th>STATUS</th>

            

            </thead>
            <?php
            
            $sel = "SELECT * FROM shipperpost WHERE shipperphone = '$_SESSION[id]'";
            $qry = mysqli_query($conn, $sel);
            $i=1;
            if(mysqli_num_rows($qry)>0){
                foreach($qry as $r){
                    echo"
                        <tr>
                            <td>".$i."</td>
                            <td>".$r['froms']."-".$r['fromd']."</td>
                            <td>".$r['tos']."-".$r['tod']."</td>
                            <td>".$r['shiptype']."</td>
                            <td>".$r['date']."</td>
                            <td>".$r['trucktype']."</td>
                            <td>".$r['trucksize']."</td>
                            <td>".$r['status']."</td>                         
                        </tr>";
                    $i++;
                }
            }
            ?>
            
    </table>
    
</section>
<br>
</body>
</html>

