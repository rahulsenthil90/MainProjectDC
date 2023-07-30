<?php

include("dbconn.php");

session_start();

if($_SESSION['id']==''){
    header("location:index.php");
}


$sel = "SELECT * FROM driverreg WHERE urole='Driver' AND phonenumber='$_SESSION[id]'";
$qry = mysqli_query($conn, $sel);
$fet = mysqli_fetch_assoc($qry);

$sel1 = "SELECT * FROM driver WHERE phonenumber='$_SESSION[id]'";
$qry1 = mysqli_query($conn, $sel1);
$fet1 = mysqli_fetch_assoc($qry1);

if(isset($_POST['reg'])){
    $dname = $_POST['dname'];
    $trucktype = $_POST['trucktype'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $trucksize = $_POST['trucksize'];
    


    $sel ="SELECT * FROM driver where phonenumber ='$phonenumber' limit 1";
    $insert = "INSERT INTO driver VALUES ('','$dname', '$email', '$phonenumber', '$state', '$district', '$trucktype', '$trucksize')";
    $qry = mysqli_query($conn, $sel);
    $sum = mysqli_num_rows($qry);
    if($sum == 0)
    { 
        $qry = mysqli_query($conn, $insert);
        echo"
                <script language='javascript'>
                alert('SUCCESSFULLY REGISTERED YOUR TRUCK DETAILS');
                window.location.href='registertruck.php';
                </script>";
    }
    else 
    {
        echo"
                <script language='javascript'>
                alert('ALREADY REGISTERED');
                window.location.href='registertruck.php';
                </script>";
    }
}

if(isset($_POST['upd'])){
    $dname = $_POST['dname'];
    $trucktype = $_POST['trucktype'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $trucksize = $_POST['trucksize'];
    
    $update = "UPDATE driver SET drivername='$dname', email='$email', state='$state', district='$district', trucktype='$trucktype', trucksize='$trucksize' WHERE phonenumber='$phonenumber'";
    $qry = mysqli_query($conn, $update);
    if($qry)
    { 
        echo"
                <script language='javascript'>
                alert('SUCCESSFULLY REGISTERED YOUR TRUCK DETAILS');
                window.location.href='registertruck.php';
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
    <title>DC Truck Rent</title>

    <link rel="icon" href="img/logo.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Martian+Mono:wght@200;400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
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
            .main{
                background: rgba(15, 11, 11, 0.817);
                width:970px;
                height:610px;
                padding: 20px 50px;
                margin-bottom: 5%;
                transform: translate(0%,0%);
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
                margin: 10px 0 0px 0;
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
                color: black;
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
<body style="background-image:url(img/bg2.jpg);background-size:cover;background-position:center center;">
    <nav>
        <?php include('driversidenav.php') ?>
    </nav>
    <main>
    <form autocomplete="off" id="form" action="" method="POST" class="form">
            <section class="main">
                <i><h2><span class="s4">D</span>eliver    <span class="s4">C</span>hoice</h2></i>
                <?php
                if(mysqli_num_rows($qry1)==0){
                    ?>
                    <h1 class="heading">Register/Update</h1>
                    <form action="#">
                        <div class="main-box">
                        
                            <div class="input-box">
                                <span class="text">Driver Name</span>
                                <input type="text" value="<?php echo $fet['fname'] ?>" name="dname" placeholder="Please enter your name" required>
                            </div>
                            <div class="input-box">
                                <span class="text">Email</span>
                                <input type="email" value="<?php echo $fet['email'] ?>" name="email" placeholder="abc@gmail.com" required>
                            </div>
                            <div class="input-box">
                                <span class="text">Phone Number</span>
                                <input type="tel" readonly value="<?php echo $fet['phonenumber'] ?>" name="phonenumber" placeholder="Phone Number" required>
                            </div>
                            <div class="input-box">
                                <span class="text">State</span>
                                <select id="states" name="state">
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
                                <select id="districts" name="district">
                                    <option value=""disabled selected>Select a District</option>
                                </select>
                            </div>
                            <div class="input-box">
                                <span class="text">Truck Type</span>
                                <select id="trucktype" name="trucktype">
                                    <option value=""disabled selected>Select Truck Type</option>
                                    <option value="open half body">Open Half Body</option>
                                    <option value="open full body">Open Full Body</option>
                                    <option value="half body trailer">Half Body Trailer</option>
                                    <option value="full body trailer">Full Body Trailer</option>
                                    <option value="flatbed trailer">Flatbed Trailer</option>
                                    <option value="open container">Open Container</option>
                                    <option value="coveredtruck">Covered Truck</option>
                                </select>
                            </div>
                            <div class="input-box">
                                <span class="text">Truck Size</span>
                                <select id="trucksize" name="trucksize">
                                    <option value=""disabled selected>Select Truck Size</option>
                                </select>
                                </div>
                        </div>
                        <div class="btn">
                            <input type="submit" name="reg" value="Register">
                        </div>
                    </form>

                    <?php
                }else{

                        ?>
                        <h1 class="heading">Register/Update</h1>
                    <form action="#">
                        <div class="main-box">
                        
                            <div class="input-box">
                                <span class="text">Driver Name</span>
                                <input type="text" value="<?php echo $fet1['drivername'] ?>" name="dname" placeholder="Please enter your name" required>
                            </div>
                            <div class="input-box">
                                <span class="text">Email</span>
                                <input type="email" value="<?php echo $fet1['email'] ?>" name="email" placeholder="abc@gmail.com" required>
                            </div>
                            <div class="input-box">
                                <span class="text">Phone Number</span>
                                <input type="tel" readonly value="<?php echo $fet1['phonenumber'] ?>" name="phonenumber" placeholder="Phone Number" maxlength="10" required>
                            </div>
                            <div class="input-box">
                                <span class="text">State</span>
                                <select id="states" name="state">
                                        <option value="<?php echo $fet1['state'] ?>"><?php echo $fet1['state'] ?></option>
                                        <option value="">Select a state</option>
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
                                <select id="districts" name="district">
                                    <option value="<?php echo $fet1['district'] ?>"><?php echo $fet1['district'] ?></option>
                                    <option value="">Select a District</option>
                                </select>
                            </div>
                            <div class="input-box">
                                <span class="text">Truck Type</span>
                                <select id="trucktype" name="trucktype">
                                    <option value="<?php echo $fet1['trucktype'] ?>"><?php echo $fet1['trucktype'] ?></option>
                                    <option value="">Select Truck Type</option>
                                    <option value="open half body">Open Half Body</option>
                                    <option value="open full body">Open Full Body</option>
                                    <option value="half body trailer">Half Body Trailer</option>
                                    <option value="full body trailer">Full Body Trailer</option>
                                    <option value="flatbed trailer">Flatbed Trailer</option>
                                    <option value="open container">Open Container</option>
                                    <option value="coveredtruck">Covered Truck</option>
                                </select>
                            </div>
                            <div class="input-box">
                                <span class="text">Truck Size</span>
                                <select id="trucksize" name="trucksize">
                                    <option value="<?php echo $fet1['trucksize'] ?>"><?php echo $fet1['trucksize'] ?></option>
                                    <option value="">Select Truck Size</option>
                                </select>
                                </div>
                        </div>
                        <div class="btn">
                            <input type="submit" name="upd" value="Update">
                        </div>
                    </form>

                        <?php
                    
                }
                ?>
                
            </section>
        </form>
    </main>
</body>
<script>
    const states = {
        "Andhra Pradesh": ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Krishna", "Kurnool", "Nellore", "Prakasam", "Srikakulam", "Visakhapatnam", "Vizianagaram", "West Godavari", "YSR Kadapa"],
"Arunachal Pradesh": ["Anjaw", "Changlang", "Dibang Valley", "East Kameng", "East Siang", "Kamle", "Kra Daadi", "Kurung Kumey", "Lepa Rada", "Lohit", "Longding", "Lower Dibang Valley", "Lower Siang", "Lower Subansiri", "Namsai", "Pakke Kessang", "Papum Pare", "Shi Yomi", "Siang", "Tawang", "Tirap", "Upper Siang", "Upper Subansiri", "West Kameng", "West Siang"],
"Assam": ["Baksa", "Barpeta", "Biswanath", "Bongangaon", "Cachar", "Charaideo", "Chirang", "Darrang", "Dhemaji", "Dhubri", "Dibrugarh", "Dima Hasao", "Goalpara", "Golaghat", "Hailakandi", "Hojai", "Jorhat", "Kamrup", "Kamrup Metropolitan", "Karbi Anglong", "Karimganj", "Kokrajhar", "Lakhimpur", "Majuli", "Morigaon", "Nagaon", "Nalbari", "Sivasagar", "Sonitpur", "South Salmara-Mankachar", "Tinsukia", "Udalguri", "West Karbi Anglong"],
"Bihar": ["Araria", "Arwal", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Bhojpur", "Buxar", "Darbhanga", "East Champaran (Motihari)", "Gaya", "Gopalganj", "Jamui", "Jehanabad", "Kaimur (Bhabua)", "Katihar", "Khagaria", "Kishanganj", "Lakhisarai", "Madhepura", "Madhubani", "Munger (Monghyr)", "Muzaffarpur", "Nalanda", "Nawada", "Patna", "Purnia (Purnea)", "Rohtas", "Saharsa", "Samastipur", "Saran", "Sheikhpura", "Sheohar", "Sitamarhi", "Siwan", "Supaul", "Vaishali", "West Champaran"],
"Chhattisgarh": ["Balod", "Baloda Bazar", "Balrampur", "Bastar", "Bemetara", "Bijapur", "Bilaspur", "Dantewada (South Bastar)", "Dhamtari", "Durg", "Gariyaband", "Janjgir-Champa", "Jashpur", "Kabirdham (Kawardha)", "Kanker (North Bastar)", "Kondagaon", "Korba", "Korea (Koriya)", "Mahasamund", "Mungeli", "Narayanpur", "Raigarh", "Raipur", "Rajnandgaon", "Sukma", "Surajpur", "Surguja"],
"Goa": ["North Goa", "South Goa"],
"Gujarat": ["Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha (Palanpur)", "Bharuch", "Bhavnagar", "Botad", "Chhota Udepur", "Dahod", "Dangs (Ahwa)", "Devbhoomi Dwarka", "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh", "Kheda (Nadiad)", "Kutch (Bhuj)", "Mahisagar", "Mehsana", "Morbi", "Narmada (Rajpipla)", "Navsari", "Panchmahal (Godhra)", "Patan", "Porbandar", "Rajkot", "Sabarkantha (Himmatnagar)", "Surat", "Surendranagar", "Tapi (Vyara)", "Vadodara"],
"Haryana": ["Ambala", "Bhiwani", "Charkhi Dadri", "Faridabad", "Fatehabad", "Gurugram (Gurgaon)", "Hisar", "Jhajjar", "Jind", "Kaithal", "Karnal", "Kurukshetra", "Mahendragarh", "Nuh", "Palwal", "Panchkula", "Panipat", "Rewari", "Rohtak", "Sirsa", "Sonipat", "Yamunanagar"],
"Himachal Pradesh": ["Bilaspur", "Chamba", "Hamirpur", "Kangra", "Kinnaur", "Kullu", "Lahaul & Spiti", "Mandi", "Shimla", "Sirmaur (Sirmour)", "Solan", "Una"],
"Jharkhand": ["Bokaro", "Chatra", "Deoghar", "Dhanbad", "Dumka", "East Singhbhum", "Garhwa", "Giridih", "Godda", "Gumla", "Hazaribag", "Jamtara", "Khunti", "Koderma", "Latehar", "Lohardaga", "Pakur", "Palamu", "Ramgarh", "Ranchi", "Sahibganj", "Seraikela-Kharsawan", "Simdega", "West Singhbhum"],
"Karnataka": ["Bagalkot", "Ballari (Bellary)", "Belagavi (Belgaum)", "Bengaluru (Bangalore) Rural", "Bengaluru (Bangalore) Urban", "Bidar", "Chamarajanagar", "Chikballapur", "Chikkamagaluru (Chikmagalur)", "Chitradurga", "Dakshina Kannada", "Davangere", "Dharwad", "Gadag", "Hassan", "Haveri", "Kalaburagi (Gulbarga)", "Kodagu", "Kolar", "Koppal", "Mandya", "Mysuru (Mysore)", "Raichur", "Ramanagara", "Shivamogga (Shimoga)", "Tumakuru (Tumkur)", "Udupi", "Uttara Kannada (Karwar)", "Vijayapura (Bijapur)", "Yadgir"],
"Kerala": ["Alappuzha", "Ernakulam", "Idukki", "Kannur", "Kasaragod", "Kollam", "Kottayam", "Kozhikode", "Malappuram", "Palakkad", "Pathanamthitta", "Thiruvananthapuram", "Thrissur", "Wayanad"],
"Madhya Pradesh": ["Agar Malwa", "Alirajpur", "Anuppur", "Ashoknagar", "Balaghat", "Barwani", "Betul", "Bhind", "Bhopal", "Burhanpur", "Chhatarpur", "Chhindwara", "Damoh", "Datia", "Dewas", "Dhar", "Dindori", "Guna", "Gwalior", "Harda", "Hoshangabad", "Indore", "Jabalpur", "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Niwari", "Panna", "Raisen", "Rajgarh", "Ratlam", "Rewa", "Sagar", "Satna", "Sehore", "Seoni", "Shahdol", "Shajapur", "Sheopur", "Shivpuri", "Sidhi", "Singrauli", "Tikamgarh", "Ujjain", "Umaria", "Vidisha"],
"Maharashtra": ["Ahmednagar", "Akola", "Amravati", "Aurangabad", "Beed", "Bhandara", "Buldhana", "Chandrapur", "Dhule", "Gadchiroli", "Gondia", "Hingoli", "Jalgaon", "Jalna", "Kolhapur", "Latur", "Mumbai City", "Mumbai Suburban", "Nagpur", "Nanded", "Nandurbar", "Nashik", "Osmanabad", "Palghar", "Parbhani", "Pune", "Raigad", "Ratnagiri", "Sangli", "Satara", "Sindhudurg", "Solapur", "Thane", "Wardha", "Washim", "Yavatmal"],
"Manipur": ["Bishnupur", "Chandel", "Churachandpur", "Imphal East", "Imphal West", "Jiribam", "Kakching", "Kamjong", "Kangpokpi", "Noney", "Pherzawl", "Senapati", "Tamenglong", "Tengnoupal", "Thoubal", "Ukhrul"],
"Meghalaya": ["East Garo Hills", "East Jaintia Hills", "East Khasi Hills", "North Garo Hills", "Ri Bhoi", "South Garo Hills", "South West Garo Hills", "South West Khasi Hills", "West Garo Hills", "West Jaintia Hills", "West Khasi Hills"],
"Mizoram": ["Aizawl", "Champhai", "Hnahthial", "Khawzawl", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Saitual", "Serchhip"],
"Nagaland": ["Dimapur", "Kiphire", "Kohima", "Longleng", "Mokokchung", "Mon", "Peren", "Phek", "Tuensang", "Wokha", "Zunheboto"],
"Odisha": ["Angul", "Balangir", "Balasore", "Bargarh", "Bhadrak", "Boudh", "Cuttack", "Deogarh", "Dhenkanal", "Gajapati", "Ganjam", "Jagatsinghpur", "Jajpur", "Jharsuguda", "Kalahandi", "Kandhamal", "Kendrapara", "Kendujhar (Keonjhar)", "Khordha", "Koraput", "Malkangiri", "Mayurbhanj", "Nabarangpur", "Nayagarh", "Nuapada", "Priya", "Rayagada", "Sambalpur", "Subarnapur (Sonepur)", "Sundergarh"],
"Puducherry": ["Karaikal", "Mahe", "Pondicherry", "Yanam"],
"Punjab": ["Amritsar", "Barnala", "Bathinda", "Faridkot", "Fatehgarh Sahib", "Fazilka", "Ferozepur", "Gurdaspur", "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana", "Mansa", "Moga", "Muktsar", "Nawanshahr (Shahid Bhagat Singh Nagar)", "Pathankot", "Patiala", "Rupnagar", "Sahibzada Ajit Singh Nagar (Mohali)", "Sangrur", "Tarn Taran"],
"Rajasthan": ["Ajmer", "Alwar", "Banswara", "Baran", "Barmer", "Bharatpur", "Bhilwara", "Bikaner", "Bundi", "Chittorgarh", "Churu", "Dausa", "Dholpur", "Dungarpur", "Ganganagar", "Hanumangarh", "Jaipur", "Jaisalmer", "Jalore", "Jhalawar", "Jhunjhunu", "Jodhpur", "Karauli", "Kota", "Nagaur", "Pali", "Pratapgarh", "Rajsamand", "Sawai Madhopur", "Sikar", "Sirohi", "Tonk", "Udaipur"],
"Sikkim": ["East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"],
"Tamil Nadu": ["Ariyalur", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kanchipuram", "Kanyakumari", "Karur", "Krishnagiri", "Madurai", "Nagapattinam", "Namakkal", "Nilgiris", "Perambalur", "Pudukkottai", "Ramanathapuram", "Salem", "Sivaganga", "Thanjavur", "Theni", "Thoothukudi (Tuticorin)", "Tiruchirappalli", "Tirunelveli", "Tiruppur", "Tiruvallur", "Tiruvannamalai", "Tiruvarur", "Vellore", "Viluppuram", "Virudhunagar"],
"Telangana": ["Adilabad", "Bhadradri Kothagudem", "Hyderabad", "Jagtial", "Jangaon", "Jayashankar Bhoopalpally", "Jogulamba Gadwal", "Kamareddy", "Karimnagar", "Khammam", "Komaram Bheem Asifabad", "Mahabubabad", "Mahabubnagar", "Mancherial", "Medak", "Medchal–Malkajgiri", "Mulugu", "Nagarkurnool", "Nalgonda", "Narayanpet", "Nirmal", "Nizamabad", "Peddapalli", "Rajanna Sircilla", "Rangareddy", "Sangareddy", "Siddipet", "Suryapet", "Vikarabad", "Wanaparthy", "Warangal Rural", "Warangal Urban", "Yadadri Bhuvanagiri"],
"Tripura": ["Dhalai", "Gomati", "Khowai", "North Tripura", "Sepahijala", "South Tripura", "Unakoti", "West Tripura"],
"Uttar Pradesh": ["Agra", "Aligarh", "Ambedkar Nagar", "Amethi (Chatrapati Sahuji Mahraj Nagar)", "Amroha (J.P. Nagar)", "Auraiya", "Ayodhya", "Azamgarh", "Baghpat", "Bahraich", "Ballia", "Balrampur", "Banda", "Barabanki", "Bareilly", "Basti", "Bhadohi", "Bijnor", "Budaun", "Bulandshahr", "Chandauli", "Chitrakoot", "Deoria", "Etah", "Etawah", "Farrukhabad", "Fatehpur", "Firozabad", "Gautam Buddha Nagar", "Ghaziabad", "Ghazipur", "Gonda", "Gorakhpur", "Hamirpur", "Hapur (Panchsheel Nagar)", "Hardoi", "Hathras", "Jalaun", "Jaunpur", "Jhansi", "Kannauj", "Kanpur Dehat", "Kanpur Nagar", "Kasganj (Kanshiram Nagar)", "Kaushambi", "Kheri", "Kushinagar (Padrauna)", "Lalitpur", "Lucknow", "Maharajganj", "Mahoba", "Mainpuri", "Mathura", "Mau", "Meerut", "Mirzapur", "Moradabad", "Muzaffarnagar", "Pilibhit", "Pratapgarh", "Prayagraj (Allahabad)", "Raebareli", "Rampur", "Saharanpur", "Sambhal (Bhim Nagar)", "Sant Kabir Nagar", "Shahjahanpur", "Shamli", "Shrawasti", "Siddharthnagar", "Sitapur", "Sonbhadra", "Sultanpur", "Unnao", "Varanasi"],
"Uttarakhand": ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri Garhwal", "Pithoragarh", "Rudraprayag", "Tehri Garhwal", "Udham Singh Nagar", "Uttarkashi"],
"West Bengal": ["Alipurduar", "Bankura", "Birbhum", "Cooch Behar", "Dakshin Dinajpur (South Dinajpur)", "Darjeeling", "Hooghly", "Howrah", "Jalpaiguri", "Jhargram", "Kalimpong", "Kolkata", "Malda", "Murshidabad", "Nadia", "North 24 Parganas", "Paschim Medinipur (West Medinipur)", "Paschim (West) Burdwan (Bardhaman)", "Purba Burdwan (Bardhaman)", "Purba Medinipur (East Medinipur)", "Purulia", "South 24 Parganas", "Uttar Dinajpur (North Dinajpur)"]

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

    const trucktype ={
        "open half body":["28ft x 8ft","40ft x 8ft","48ft x 8ft"],
        "open full body":["10ft","14ft","16ft","24ft","26ft"],
        "half body trailer":["28ft x 8ft","40ft x 8ft","48ft x 8ft"],
        "full body trailer":["28ft","40ft","45ft","53ft"],
        "flatbed trailer":["8ft x 4ft","10ft x 6ft","12ft x 6ft","14ft x 7ft","16ft x 8ft","48ft x 8.5ft","53ft x 8.5ft"],
        "open container":["20ft","40ft","45ft"],
        "coveredtruck":["20ft","40ft","40ft high cube","45ft"]
    }
    const truckselect = document.getElementById("trucktype");
    const sizeselect = document.getElementById("trucksize");
    
    truckselect.addEventListener("change", function() {
      sizeselect.innerHTML = "";
      sizeselect.innerHTML = "<option value=''>Select a Truck Size</option>";
      if (this.value === "") return;
      const trucksize = trucktype[this.value];
      trucksize.forEach(function(size) {
        const option = document.createElement("option");
        option.value = size;
        option.text = size;
        sizeselect.appendChild(option);
      });
    });
</script>
</html>