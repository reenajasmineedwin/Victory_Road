
<?php 
session_start(); 
include "db_con.php";


if (isset($_POST['vname']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['phone']) && 
isset($_POST['aadhar']) && isset($_POST['city']) && isset($_POST['vpsw'])  && isset($_POST['v'])) {
//if(true){

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }


    $vname = validate($_POST['vname']);
    $age = validate($_POST['age']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $aadhar = validate($_POST['aadhar']);
    $city = validate($_POST['city']);
    $vpsw = validate($_POST['vpsw']);
    $v = $_POST['v'];

 

    $sqlr = "SELECT * FROM VOLUNTEER WHERE Aadhar='$aadhar' ";
    $resultr = mysqli_query($conn, $sqlr);


    if (mysqli_num_rows($resultr) === 1) { 
        echo "<script>alert('Already Registered as Volunteer');window.location.href='hackvol.html?error=Already Registered';</script>";
        exit();
    }

    $sqlp ="INSERT INTO VOLUNTEER (Vname,Age,Email,Phone,Aadhar,City,vpassword)
    VALUES ('$vname', '$age', '$email', '$phone', '$aadhar', '$city','$vpsw')";

    $resultp = mysqli_query($conn, $sqlp);

    for($u=0; $u < count($v); $u++){

            $temp = $v[$u];

            if($temp == "Blood Donation"){
                $sqlq ="UPDATE VOLUNTEER SET Blood_Donate = 'T' WHERE Aadhar = '$aadhar'";
            }
            if($temp == "Healthcare System"){
                $sqlq ="UPDATE VOLUNTEER SET Healthcare_System = 'T' WHERE Aadhar = '$aadhar'";
            }
            if($temp == "Humane Services"){
                $sqlq ="UPDATE VOLUNTEER SET Humane_Services = 'T' WHERE Aadhar = '$aadhar'";
            }
            if($temp == "Society Services"){
                $sqlq ="UPDATE VOLUNTEER SET Society_Services = 'T' WHERE Aadhar = '$aadhar'";
            }
            if($temp == "Environmental Services"){
                $sqlq ="UPDATE VOLUNTEER SET Environmental_Services = 'T' WHERE Aadhar = '$aadhar'";
            }
            if($temp == "Donation Services"){
                $sqlq ="UPDATE VOLUNTEER SET Donation = 'T' WHERE Aadhar = '$aadhar'";
            }
            if($temp == "Other Services"){
                $sqlq ="UPDATE VOLUNTEER SET Other = 'T' WHERE Aadhar = '$aadhar'";
            }
     
            $resultq = mysqli_query($conn, $sqlq);
    }

    echo "<script>alert('Registered sucessfully as Volunteer');window.location.href='hackvol.html?error=Sucessfully Registered';</script>";
    exit();
            
    }
    
else{
    header("Location: hackvol.html");
    exit();
}
?>