<?php
include("dbconn.php");

session_start();
if($_SESSION['id']==''){
    header("location:index.php");
}

$sel1 = "SELECT * FROM userreg WHERE phonenumber='$_SESSION[id]'";
$qry1 = mysqli_query($conn, $sel1);
$fet1 = mysqli_fetch_assoc($qry1);


if(isset($_POST['findrecovery'])){
    $fstate = $_POST['fstate'];
    $fdis = $_POST['fdistrict'];
    $tstate = $_POST['tstate'];
    $tdis = $_POST['tdistrict'];

    $ser = "SELECT * FROM shipper WHERE state='$fstate' and service='Recovery Service' and district='$fdis' and tostate='$tstate' and todistrict='$tdis'";
    $qr = mysqli_query($conn, $ser);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC User Dashboard</title>
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
            body{
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #f40a64;
                background-size:cover;
                background-position:center center;
                padding: 10px;
                overflow-x: hidden;
            }
            .title{
        color:#000;
        font-size: 18px;
        font-weight: 900;
        font-style:italic;
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .container {
			display: grid;
			grid-template-columns: 10fr 10fr;
			grid-gap: 20px;
			margin: 30px;
		}
		/* Style the cards */
		.card {
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
			padding: 20px;
		}
		.card h2 {
			margin-top: 0;
			font-size: 95px;
		}

    .container{
        display: flex;
        align-items: center;
        justify-content: center;
        
        padding: 30px;
    }

    .container table{
        text-align: center;
        border: 2px solid #000;
        margin-left: 20%;
        margin-right: 15% ;
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
<section class="container">
    <table>
            <thead>
                <th>S.No.</th>
                <th>Comapny Name</th>
                <th>Mobile number</th>
                <th>Service From</th>
                <th>Service To</th>
                <th>Address</th>
                <th>Landmark</th>
                <th>Book</th>
            

            </thead>

            <tbody>
                <?php
                        
                $i=1;

                if(mysqli_num_rows($qr) > 0){
                    
                    foreach($qr as $row){
                        echo"
                            <tr>
                                <td>".$i."</td>
                                <td>".$row['cname']."</td>
                                <td>".$row['phonenumber']."</td>
                                <td>".$row['district']."</td>
                                <td>".$row['todistrict']."</td>
                                <td>".$row['caddress']."</td>
                                <td>".$row['landmark']."</td>
                                <td><a style='text-decoration:none; color:black;' href='recoveryfound.php?id=$row[id]'><ion-icon name='checkbox'></ion-icon></a></td>
                            </tr>";
                            $i++;
                    }
                    
                }else{
                    ?>
                    <tr>
                        <td colspan="7">No Office Available Available</td>
                    </tr>

                    <?php

                }
            
                ?>
            </tbody>
    </table>
    
</section>
<br>
</body>
</html>

