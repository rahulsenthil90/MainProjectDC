<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <title>Deliver Choice</title>
    <link rel="icon" href="img/logo.png"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    ::-webkit-scrollbar{width: 0px;}

    ::selection{
        background-color:#f9004d;
    }
</style>
</head>
<style>
    *{
    padding: 0;
    margin: 0;
    font-family:'Josefin Sans',sans-serif;
    box-sizing: border-box;
}
.hea{
    height:100vh;
    width:100%;
    background-image:url("img/index.jpg");
    background-size: cover;
    background-position: center;
}
nav{
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #3432326e;
    padding-bottom: 0%;
}
.logo{
    color: white;
    font-size: 28px;
    letter-spacing: 1px;
    cursor: pointer;
}
.s1{
    color:#f9004d;
    font-size: 50px;
}
.s2{
    color:#f9004d;
    font-size: 40px;
}
.s3{
    color:#fefdfd;
    font-size: 23px;
}
.s5{
    color:#fefdfd;
    font-size: 28px;
}
nav ul li{
    list-style-type: none;
    display: inline-block;
    font-size: 20px;
    padding: 10px 20px;
}
nav ul li a{
    color: white;
    text-decoration: none;
    font-weight: bold;
    text-transform: capitalize;
}
nav ul li a:hover{
    color:#f9004d;
    transition: .4s;
}
.btn{
    background-color: #f9004d;
    color: white;
    text-decoration: none;
    border: 2px solid transparent;
    font-weight: bold;
    font-size: 20px;
    padding: 15px 45px;
    border-radius: 30px;
    transition:transform .4s;
}
.btn:hover{
    transform: scale(1.3);
}
.content{
    position: absolute;
    top: 50%;
    left: 8%;
    transform:translateY(-50%) ;
}
h1{
    color:white;
    margin: 20px 0px 20px;
    font-size: 75px;
}
h2{
    color: white;
    font-size: 35px;
    margin-bottom: 20px;
}
h3{
    font-family: Arial, Helvetica, sans-serif; 
    background: linear-gradient(to right, #f9004d, #ff6b08, #eedd44,#fff); 
    -webkit-text-fill-color: transparent;
    background-clip: padding-box;
    -webkit-background-clip: text; 
}
.s4{
    color:#f9004d;
    font-size: 85px;
}
.about{
    width: 100%;
    padding: 60px 0px;
    background-color: #191919;
}
.about img{
    height: 570px;
    width: 560px;
}
.about-text{
    width: 550px;
}
.main{
    width: 1130px;
    max-width: 95%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-around;
}
.about-text h2{
    color: white;
    font-size: 75px;
    text-transform: capitalize;
    margin-bottom: 20px;
}
.about-text h2{
    color: white;
    font-size: 75px;
    text-transform: capitalize;
    margin-bottom: 20px;
}
.s5{
    color:#f9004d;
    font-size: 30px;
}
.about-text p{
    color:#fcfc;
    letter-spacing: 1px;
    line-height: 28px;
    font-size: 18px;
    margin-bottom: 45px;
}
.service{
    background: #101010;
    width:100%;
    padding:100px 0px;
}
.title h2{
    color: white;
    font-size: 75px;
    width:1130px;
    margin:30px auto;
    text-align: center;
}
.box{
    display:flex;
    justify-content: center;
    align-items: center;
    min-height: 400px;
}
.card{
    height: 425px;
    width:335px;
    padding:20px 35px;
    background: #191919;
    border-radius: 20px;
    margin:15px;
    position:relative;
    overflow: hidden;
    text-align: center;
}
.card i{
    font-size: 50px;
    display: block;
    text-align: center;
    margin: 25px 0px;
    color: #f9004d;
}
h5{
    color: white;
    font-size: 23px;
    margin-bottom: 15px;
}
.pra p{
    color: #fcfc;
    font-size: 16px;
    line-height: 27px;
    margin-bottom: 25px;
}
.card .button{
    background-color: #f9004d;
    color: white;
    text-decoration: none;
    border:2px solid transparent;
    font-weight:bold;
    padding:13px 30px;
    border-radius: 30px;
    transition: .4s;
}
.card .button:hover{
    background-color: transparent;
    border:2px solid #f9004d;
    cursor: pointer;
}
.contact-me{
    width: 100%;
    height: 290px;
    background: #191919;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
}
.contact-me p{
    color: white;
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 25px;
}
.contact-me .button-two{
    background-color: #f9004d;
    color: white;
    text-decoration: none;
    border:2px solid transparent;
    font-weight:bold;
    padding:13px 30px;
    border-radius: 30px;
    transition: .4s;
}
.contact-me .button-two:hover{
    background-color: transparent;
    border:2px solid #f9004d;
    cursor: pointer;
}
footer{
    position: relative;
    width: 100%;
    height: 300px;
    background: #101010;
    display:flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
footer p:nth-child(1){
    font-size: 30px;
    color:white;
    margin-bottom: 20px;
    font-weight: bold;
}
footer p:nth-child(2){
    color:white;
    font-size: 17px;
    width:500px;
    text-align: center;
    line-height: 26px;
}
.social{
    display:flex;
}
.social a{
    width:45px;
    height:45px;
    display:flex;
    align-items: center;
    justify-content: center;
    background: #f9004d;
    border-radius:50%;
    margin: 22px 10px;
    color:white;
    text-decoration: none;
    font-size: 20px;
}
.social a:hover{
    transform:scale(1.3);
    transition: .3s;
}
.end{
    position:absolute;
    color: #f9004d;
    bottom: 35px;
    font-size: 14px;
}
</style>
<body>
    <div class="hea">
        <nav>
        <h2 class="logo"><i><span class="s1">D</span>eliver <span class="s1">C</span>hoice</i><br><i><h3>Life is for service</h3></i></h2>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#service">Services</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
            <a href ="log.php" class="btn">Login</a>
        </nav>
        
        <div class="content">
            <span class="s5">Welcome to</span>
            <h1><i><span class="s4">D</span>eliver <span class="s4">C</span>hoice</i></h1>
            <span class="s3">Get </span><span class="s2">Easy</span><span class="s3"> with </span><span class="s2">DC</span>
        </div>
    </div>
   <section class ="about"  id="about">
    <div class="main">
        <img src="img/index4 (2).png">
        <div class="about-text">
            <h2>About us</h2>
            <h5><span class="s5">Life is to Service</span></h5>
            <p>"ONLINE LOGISTICS AND TRANSPORTATION BOOKING” is a web-based. The primary objective of this project is to make it possible for users to schedule transportation services online. Examples of these services include renting a truck, using a cargo service, hiring packers and movers, or using a water delivery , and getting assistance with vehicle recovery. Both the shipper and the driver may register their businesses, submit their shipment details, and see the cargo details, respectively.  to the next level.</p>
        </div>
    </div>
   </section> 

   <div class="service" id="service">
    <div class="title">
        <h2>Our Services</h2>
    </div>
     <div class="box">
        <div class="card">
            <i class="fa-solid fa-bars"></i>
            <h5>Web Development</h5>
            <div class="pra">
                <p>The Online logistics and
transportation booking is system that allows users to simply and efficiently book and plan
transportation and logistics services using an online platform.</p>
                <p style="text-align: center;">
                <a class="button" href="#">Read More</a>
            </p>
            </div>
        </div>
        <div class="card">
            <i class="fa-regular fa-user"></i>
            <h5>Our Goal</h5>
            <div class="pra">
                <p>This portal's primary function is to connect the customer with the service provider.</p>
                <p style="text-align: center;">
                <a class="button" href="#">Read More</a>
            </p>
            </div>
        </div>
        <div class="card">
            <i class="fa-regular fa-bell"></i>
            <h5>Our Aim</h5>
            <div class="pra">
                <p>  This helps to advance logistics and transportation to the next level.to the advancement of logistics and transportation</p>
                <p style="text-align: center;">
                <a class="button" href="#">Read More</a>
            </p>
            </div>
        </div>
        <br>
        
     </div>
   </div>
   <div class="contact-me" id="contact">
    <p>Let me know your queries.</p>
    <a class="button-two" href="contact.php">Contact Us</a>
</div>
<footer>
    <p><span class="s2">D</span>eliver <span class="s2">C</span>hoice</p>
    <p>For more details - please click on the link below</p>
    <div class="social">
        <a href="https://www.facebook.com/profile.php?id=100015587768789&mibextid=ZbWKwL"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/somasundaramshanmuganathan"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://www.linkedin.com/in/rahul-senthil-a43566199"><i class="fa-brands fa-linkedin-in"></i></a>
    </div>
    <p class="end">CopyRight By Deliver Choice</p>
</footer>
</body>
</html>