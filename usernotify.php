<?php

include("dbconn.php");
session_start();

if($_SESSION['id']==''){
    header("location:index.php");
}

$sel0 = "SELECT * FROM cargofound WHERE sphone='$_SESSION[id]'";
$qry0 = mysqli_query($conn, $sel0);

$sel1 = "SELECT * FROM packerfound WHERE sphone='$_SESSION[id]'";
$qry1 = mysqli_query($conn, $sel1);

$sel2 = "SELECT * FROM recoveryfound WHERE sphone='$_SESSION[id]'";
$qry2 = mysqli_query($conn, $sel2);

$sel3 = "SELECT * FROM truckfound WHERE sphone='$_SESSION[id]'";
$qry3 = mysqli_query($conn, $sel3);

$sel4 = "SELECT * FROM waterfound WHERE sphone='$_SESSION[id]'";
$qry4 = mysqli_query($conn, $sel4);

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
        <?php include('sidenav.php') ?>
    </nav>

<br>
    <h1 style="text-align: center; ">ORDER DETAILS</h1>
<section class="container">
    
    <table>
            <thead>
                <th>Shipper / Driver Name</th>
                <th>Shipper / Driver Number</th>
                <th>STATUS</th>
            </thead>
            <?php
            if(mysqli_num_rows($qry0)>0){
                foreach($qry0 as $r0){
                    echo"
                        <tr>
                            <td>".$r0['shippername']."</td>
                            <td>".$r0['shippernumber']."</td>
                            <td>".$r0['status']."</td>                        
                        </tr>";
                }
            }
            if(mysqli_num_rows($qry1)>0){
                foreach($qry1 as $r1){
                    echo"
                        <tr>
                        <td>".$r1['packername']."</td>
                        <td>".$r1['packernumber']."</td>
                        <td>".$r1['status']."</td>                        
                        </tr>";
                }
            }
            if(mysqli_num_rows($qry2)>0){
                foreach($qry2 as $r2){
                    echo"
                        <tr>
                        <td>".$r2['recoveryname']."</td>
                        <td>".$r2['recoverynumber']."</td>
                        <td>".$r2['status']."</td>                         
                        </tr>";
                }
            }if(mysqli_num_rows($qry3)>0){
                foreach($qry3 as $r3){
                    echo"
                        <tr>
                        <td>".$r3['drivername']."</td>
                        <td>".$r3['drivernumber']."</td>
                        <td>".$r3['status']."</td>                    
                        </tr>";
                }
            }if(mysqli_num_rows($qry4)>0){
                foreach($qry4 as $r4){
                    echo"
                        <tr>
                        <td>".$r4['watername']."</td>
                        <td>".$r4['waternumber']."</td>
                        <td>".$r4['status']."</td>                      
                        </tr>";
                }
            }
            ?>
            
    </table>
    
</section>
<br>
</body>
</html>

