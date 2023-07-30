<?php
include("dbconn.php");
session_start();
if($_SESSION['id']==''){
    header("location:index.php");
}

$sel = "SELECT * FROM userreg WHERE phonenumber='$_SESSION[id]'";
$qry = mysqli_query($conn, $sel);
$fet = mysqli_fetch_assoc($qry)

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
    height: 110vh;
    width: 100%;
    background-image: url(img/bg6.jpg);
    background-size:100%;
    background-position: center;
    padding: 0px;
    overflow: hidden;
    }
    .main{
    background: rgba(15, 11, 11, 0.917);
    width:1000px;
    height:400px;
    padding: 10px 50px;
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
    <body style="background-image:url(img/bg6.jpg);background-size:cover;background-position:center center;">
        <nav>
            <?php include('sidenav.php') ?>
        </nav>
            <main>
                <form autocomplete="off" id="form" action="findwater.php" method="POST" class="form">
                    <section class="main">
                    <i><h2><span class="s4">D</span>eliver    <span class="s4">C</span>hoice</h2></i>
                    <h1 class="heading">Water Service</h1>
                    <form action="#">
                    <div class="main-box">

    
                    <div class="input-box">
                    <span class="text">State</span>
                    <select id="states" name="fstate">
                        <option value=""disabled selected>Select a state</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="West Bengal">West Bengal</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Puducherry">Puducherry</option>
                        </select>
                    </div>
                    <div class="input-box">
                    <span class="text">District</span>
                    <select id="districts" name="fdistrict">
                    <option value=""disabled selected>Select a District</option>
                    </select>
                    </div>
                    <div class="input-box">
                    <span class="text">Purpose</span>
                    <select id="vechile type">
                    <option value=""disabled selected>Select Purpose</option>
                    <option value="agriculture">Agriculture</option>
                    <option value="construction">Construction</option>
                    <option value="dust control">Dust Control</option>
                    <option value="landscaping">Landscaping</option>
                    <option value="home">Home</option>
                    </select>
                    </div>
                    </div>
                    <div class="btn">
                    <input type="submit" name="findwater" value="Find Water Service">
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