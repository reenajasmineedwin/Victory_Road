<!-- NGO SIGN IN BACK END -->

<?php 
session_start(); 
include "db_con.php";

if (isset($_POST['hid']) &&  isset($_POST['psw'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$hid = validate($_POST['hid']);
	$psw = validate($_POST['psw']);

        
		$sql = "SELECT * FROM NGO WHERE Nid='$hid' AND NPassword='$psw' ";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			
				$_SESSION['hid'] = $hid;
            	header("Location: publicuser.php");
		        exit();
            
		}else{
       
          $sqlx = "SELECT * FROM NGO WHERE Nid='$hid' ";
          $resultx = mysqli_query($conn, $sqlx);

		  if (mysqli_num_rows($resultx) === 0) {
			
           echo "<script>alert('No NGO with this Id is Registered,please Register!!');window.location.href='publicuserregis.html?error=not Registered';</script>";
		         exit();
		  }
		  else {
			
         echo "<script>alert('Incorrect Password');window.location.href='publicusersign-inA.html?error=Incorrect password';</script>";
		        exit();

		
	      }       


		}
	}
	
else{
	header("Location: publicusersign-inA.html");
	exit();
}
