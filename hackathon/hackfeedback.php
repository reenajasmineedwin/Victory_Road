<?php
session_start(); 
include "db_con.php";


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phnno']) && isset($_POST['aadharno']) && isset($_POST['rating']) && isset($_POST['feedback'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}


    $name = validate($_POST['name']);
	$email = validate($_POST['email']);
    $phnno = validate($_POST['phnno']);
    $aadharno = validate($_POST['aadharno']);
    $rating = validate($_POST['rating']);
    $feedback = validate($_POST['feedback']);




    
    $sql1 = "SELECT * FROM FEEDBACK WHERE Aadhar='$aadharno'";   
	$result1 = mysqli_query($conn, $sql1);

	if (mysqli_num_rows($result1) === 1) {
			
            	
            $sql2 ="UPDATE FEEDBACK SET Fname='$name',Email='$email', Phone='$phnno', Rating='$rating', MESS_TEXT='$feedback'  WHERE Aadhar='$aadharno' ";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
				echo "<script>alert('Thank You for Feedback');window.location.href='hackfeedback.html?error=feedback submitted';</script>";
		        exit();
			   }
		    else{
			     
			    echo "<script>alert('Please Resubmit Your Feedback');window.location.href='hackfeedback.html?error=please resubmit';</script>";
	        	exit();
		  	}
            
		}

    $sql ="INSERT INTO FEEDBACK (Fname, Email, Phone, Aadhar, Rating, Mess_Text)
    VALUES ('$name', '$email', '$phnno', '$aadharno', '$rating', '$feedback')";
	
		$result = mysqli_query($conn, $sql);

		if ($result) {
				//header("Location: hospregis.html?error=Inserted successfully");
			echo "<script>alert('Thank You for Feedback');window.location.href='hackfeedback.html?error=feedback submitted';</script>";
	        exit();
	    }
	    else{

	    	echo "<script>alert('Please Resubmit Your Feedback');window.location.href='hackfeedback.html?error=please resubmit';</script>";
	        exit();
	    }
	}
	
else{
	header("Location: hackfeedback.html");
	exit();
}