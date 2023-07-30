<?php
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$phoneno = $_POST['phonenumber'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$epassword = sha1($password);
$ecpassword = sha1($cpassword);

if(!empty($username) || !empty($name) || !empty($email) || !empty($phoneno) || !empty($password) )
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "deliverchoice";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if(mysqli_connect_error())
    {
        die('Connect Error ('. mysqli_connect_errno() .') ' . mysqli_connect_error());
    }
    elseif($password != $cpassword)
        {
            echo"
                    <script language='javascript'>
                    alert('PASSWORD WRONG');
                    window.location.href='reg.html';
                    </script>";
        }
        else{
        

        $SEL ="SELECT * FROM userreg where phonenumber ='$phoneno' limit 1";
        $INSERT1 = "INSERT Into userreg (username, fname, email, phonenumber, upassword, cpassword) values ('$username', '$name', '$email', '$phoneno', '$epassword', '$ecpassword')";
        $stmt = mysqli_query($conn,$SEL);

        if(mysqli_num_rows($stmt)==0)
        { 
            $inst = mysqli_query($conn,$INSERT1);
            echo"
                    <script language='javascript'>
                    alert('INSERT SUCCESSFULLY');
                    window.location.href='log.php';
                    </script>";
            
        }
        else 
        {
           

                    echo"
                    <script language='javascript'>
                    alert('USER ALREADY EXISTS');
                    window.location.href='reg.html';
                    </script>";
            
        }

    }
}
else
{
    echo "ALL FIELD ARE REQUIRED";
    die();
}

?>