<!-- NGO REGISTRATION BACK END -->
<?php 
session_start(); 
include "db_con.php";


if (isset($_POST['hid']) && isset($_POST['hname']) && isset($_POST['website']) && 
isset($_POST['contact']) && isset($_POST['email']) && isset($_POST['psw']) && isset($_POST['address'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}


    $hid = validate($_POST['hid']);
	$hname = validate($_POST['hname']);
    $website = validate($_POST['website']);
    $contact = validate($_POST['contact']);
    $email = validate($_POST['email']);
    $psw = validate($_POST['psw']);
    $address= validate($_POST['address']);


        
	
        
    $sql ="INSERT INTO NGO (Nid, NName, Website, Contact, Email, NPassword, NAddress)
    VALUES ('$hid', '$hname', '$website', '$contact', '$email', '$psw', '$address')";
	
		$result = mysqli_query($conn, $sql);

		if ($result) {
				//header("Location: hospregis.html?error=Inserted successfully");
			echo "<script>alert('Registration Complete');window.location.href='publicuserregis.html?error=successfully Registered';</script>";
	        exit();
			}
		else{
		       echo "<script>alert('Hospital is already Registered');window.location.href='publicusersign-inA.html?error=already Registered';</script>";
	        exit();
		}
	}
	
else{ 
	//echo "hello";

	header("Location: publicuserregis.html");
	exit();
}