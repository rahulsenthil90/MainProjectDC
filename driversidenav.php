<?php

include("dbconn.php");

if($_SESSION['id']==''){
    header("location:index.php");
}

$sel = "SELECT * FROM driverreg WHERE urole='Driver' AND phonenumber='$_SESSION[id]'";
$qry = mysqli_query($conn, $sel);
$fet = mysqli_fetch_assoc($qry);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC Dashboard</title>
    <link rel="icon" href="img/logo.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Martian+Mono:wght@200;400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        *{
    padding: 0;
    margin: 0;
    font-family:'Josefin Sans',sans-serif;
    box-sizing: border-box;
        }
        body{
            min-height: 100vh;
            background:#fff;
        }
        .navigation{
            position: fixed;
            top:10px;
            left:5px;
            bottom: 10px;
            width:70px;
            border-radius: 10px;
            box-sizing: initial;
            border-left: 5px solid #f9004d;
            background: #f9004d;
            transition: width 0.5s;
            overflow: hidden;
        }
        .navigation.active{
            width:280px
        }
        .navigation ul{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding-left: 5px;
            padding-top: 70px;
        }
        .navigation ul li{
            position: relative;
            list-style: none;
            width: 100%;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }
        .navigation ul li.active{
            background:#fff;

        }
        .navigation ul li b:nth-child(1){
            position: absolute;
            top:-20px;
            height:20px;
            width:100%;
            background:#fff;
            display: none;
        }
        .navigation ul li b:nth-child(1)::before{
            content: '';
            position: absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            border-bottom-right-radius: 20px;
            background-color: #f9004d;
        }
        .navigation ul li b:nth-child(2){
            position: absolute;
            bottom:-20px;
            height:20px;
            width:100%;
            background:#fff;
            display: none;
        }
        .navigation ul li b:nth-child(2)::before{
            content: '';
            position: absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            border-top-right-radius: 20px;
            background-color: #f9004d;
        }
        .navigation ul li.active b:nth-child(1),
        .navigation ul li.active b:nth-child(2){
            display: block;
        }
        .navigation ul li a{
            position: relative;
            display: block;
            width: 100%;
            display: flex;
            text-decoration: none;
            color:#e3dddd;
        }
        .navigation ul li.active a{
            color: #f9004d;
        }
        .navigation ul li a .icon{
            position: relative;
            display: block;
            min-width: 60px;
            height: 60px;
            line-height: 70px;
            text-align: center;
        }
        .navigation ul li a .icon ion-icon{
            font-size: 1.9em;
        }
        .navigation ul li a .title{
            position: relative;
            display: block;
            padding-left: 10px;
            height: 60px;
            color: #000;
            line-height: 60px;
            white-space: normal;
        }
        .navigation ul li a .title.active{
            color: #f9004d;
        }
        .toggle{
            position: fixed;
            top:25px;
            left:25px;
            width:40px;
            height:40px;
         
            background:white;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .toggle.active
        {
            background:#e3dddd;
        }
/* Style the side nav list */
.sidenav {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

/* Style the list items */
.sidenav li {
  display: block;

}

/* Style the active list item */
.sidenav li:active {
  background-color: #fff;
  color: white;
}
</style>
</head>
<body>
    <nav>
        <div class="navigation">
            <ul class="sidenav">
                <li class="list">
                    <b></b>
                    <b></b>
                    <a>
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <span class="title"><?php echo $fet['fname'];  ?></span>
                    </a>
                </li>
                <li class="list">
                    <b></b>
                    <b></b>
                    <a href="driverdashboard.php">
                        <span class="icon"><ion-icon name="grid"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="list">
                    <b></b>
                    <b></b>
                    <a href="registertruck.php">
                        <span class="icon"><ion-icon name="bus"></ion-icon></span>
                        <span class="title">Register/Update</span>
                    </a>
                </li>
                <li class="list">
                    <b></b>
                    <b></b>
                    <a href="viewshipping.php">
                        <span class="icon"><ion-icon name="albums-outline"></ion-icon></span>
                        <span class="title">View Shipping Post</span>
                    </a>
                </li>
                <li class="list">
                    <b></b>
                    <b></b>
                    <a href="drivernotify.php">
                        <span class="icon"><ion-icon name="chatbubbles-sharp"></ion-icon></span>
                        <span class="title">Notification</span>
                    </a>
                </li>

                <li class="list">
                    <b></b>
                    <b></b>
                    <a href="logout.php" onclick="signout()">
                        <span class="icon"><ion-icon name="log-out"></ion-icon></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="toggle">
            <img src="img/logo.png" alt="" width="20" height="20">
        </div>
    </nav>

            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
            <script>
                let menuToggle=document.querySelector('.toggle');
                let navigation=document.querySelector('.navigation');
                menuToggle.onclick = function(){
                    menuToggle.classList.toggle('active')
                    navigation.classList.toggle('active')
                }
                let list = document.querySelector('.list');
                for(let i = 0;i<list.length; i++){
                    list[i].onclick=function(){
                        let j=0;
                        while(j<list.length){
                            list[j++].className='list';
                        }
                        list[i].className='list active';
                    }
                }
                
              /*  let menuToggle=document.querySelectorAll('.toggle');
                let navigation=document.querySelectorAll('.navigation');
                menuToggle.onclick=function(){
                    menuToggle.classList.toggle('active');
                    navigation.classList.toggle('active');
                }

                let list = document.querySelectorAll('.list');
                for(let i=0;i<list.length;i++){
                    list[i].onclick = function(){
                        let j=0;
                        while(j<list.length){
                            list[j++].className='list';
                        }
                        list[i].className='list active';
                    }
                }*/
                var currentPage = window.location.pathname.split('/').pop();
var listItems = document.querySelectorAll(".sidenav li a");
for (var i = 0; i < listItems.length; i++) {
  var href = listItems[i].getAttribute("href");
  if (href === currentPage) {
    listItems[i].parentNode.classList.add("active");
  } else {
    listItems[i].parentNode.classList.remove("active");
  }
}
            </script>                  
</body>
</html>