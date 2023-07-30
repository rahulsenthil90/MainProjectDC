<?php
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$phoneno = $_POST['phonenumber'];
$member = $_POST['userrole'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$epassword = sha1($password);
$ecpassword = sha1($cpassword);

if(!empty($member) || !empty($username) || !empty($name) || !empty($email) || !empty($phoneno) || !empty($password) || !empty($cpassword) )
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
    else
    {
        if($password != $cpassword)
        {
            echo"
                    <script language='javascript'>
                    alert('PASSWORD WRONG');
                    window.location.href='mreg.html';
                    </script>";
        }
        
        else
        {

                $INSERT1 ="INSERT Into driverreg (urole, username, fname, email, phonenumber, upassword, cpassword) values (?,?,?,?,?,?,?);";
                $stmt1 = $conn->prepare($INSERT1);
                $stmt1->bind_param("sssssss", $member, $username, $name, $email, $phoneno, $epassword, $ecpassword);
                $stmt1->execute();
                $snum1 = $stmt1->num_rows;

                if($snum1==0)
                { 
                    echo"
                            <script language='javascript'>
                            alert('SUCCESSFULLY REGISTERED');
                            window.location.href='log.php';
                            </script>";
                }
                else 
                {
                    echo"
                            <script language='javascript'>
                            alert('ALREADY REGISTERED');
                            window.location.href='mreg.html';
                            </script>";
                }

        }
    $stmt1->close();
    $conn->close();
    }
    
}
else
{
    echo "ALL FIELD ARE REQUIRED";
    die();
}

?>