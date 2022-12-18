<?php 
session_start(); 
include "db_con.php";

if (isset($_POST['aadhar']) &&  isset($_POST['vpsw'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$aadhar = validate($_POST['aadhar']);
	$vpsw = validate($_POST['vpsw']);


		

        
		$sqlu = "SELECT * FROM VOLUNTEER WHERE Aadhar='$aadhar' ";

		$resultu = mysqli_query($conn, $sqlu);

		if (mysqli_num_rows($resultu) === 1) {
			
				$sqlv = "SELECT * FROM VOLUNTEER WHERE vpassword='$vpsw' AND Aadhar='$aadhar' ";
                $resultv = mysqli_query($conn, $sqlv);
                    
                   if (mysqli_num_rows($resultv) === 1) {

                   	   $sqlw = "DELETE FROM VOLUNTEER WHERE Aadhar='$aadhar' ";
                       $resultw = mysqli_query($conn, $sqlw); 
                       echo "<script>alert('Removed as a Volunteer');window.location.href='hackvoldelete.html?error=not Registered';</script>";
		               exit();


                   }
                   else{
                          echo "<script>alert('Incorrect Password');window.location.href='hackvoldelete.html?error=not Registered';</script>";
		                  exit();
                    }

		        exit();
            
		}
		else{
       
                 echo "<script>alert('You are not Registered as a Volunteer');window.location.href='hackvoldelete.html?error=not Registered';</script>";
		         exit();
          


		}
	}
	
else{
	header("Location: hackvoldelete.html");
	exit();
}
