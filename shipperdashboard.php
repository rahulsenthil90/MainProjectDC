<?php

session_start();

if($_SESSION['id']==''){
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC Shipper Dashboard</title>
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
                overflow: hidden;
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
			margin: 20px;
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
</style>
</head>
<body style="background-image:url(img/bg8.jpg);background-size:cover;background-position:center center;">
    <nav>
        <?php include('shippersidenav.php') ?>
    </nav>
    <div class="container">
		<div class="card">
			<h2>Users</h2>
			<p>Number of registered users: 100</p>
			<p>Number of active users: 50</p>
		</div>
		<div class="card">
			<h2>Orders</h2>
			<p>Number of open orders: 20</p>
			<p>Number of closed orders: 80</p>
		</div>
		<div class="card">
			<h2>Revenue</h2>
			<p>Total revenue: $10,000</p>
			<p>Revenue this month: $1,000</p>
		</div>
		<div class="card">
			<h2>Feedback</h2>
			<p>Number of feedback submissions: 5</p>
			<p>Average rating: 4.5 stars</p>
		</div>
	</div>
</body>
</html>
