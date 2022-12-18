<!-- UPLOAD PICS PAGE --- FRONT END AND BACK END (BOTH) -->

<?php
require 'db_con.php';
if(isset($_POST["submit"])){
   $file=addslashes(file_get_contents($_FILES['image']['tmp_name']));
   $lat=$_POST["lat"];
   $lon=$_POST["lon"];
   $sql="INSERT INTO IMG (image,latitude,longitude) VALUES ('$file','$lat','$lon')";
   $res=mysqli_query($conn,$sql);
   if($sql)
   {
       echo "<script>alert('uploaded sucessfully');window.location.href='index.php?error=uploaded ';</script>";
       exit();
    }
   else
   {
       echo "<script>alert('error in uploading');window.location.href='index.php?error=unsucess';</script>";
        exit();
   }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>namma Bengaluru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" href="stylling.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
    <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
      background-color:#A6ACAF;

    }
    
    
    /* Add padding to containers */
    .container {
      border-radius: 5px;
      background-color:#f2f2f2;
      padding: 20px;
    }
    
    /* Full-width input fields */
    input[type=text], input[type=password] ,input[type=number],input[type=file]{
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border-radius: 4px;
      border: 1px solid #ccc;

      background: #f2f2f2;
    }
    
    input[type=text]:focus, input[type=password]:focus ,input[type=number]:focus {
      background-color: #ddd;
      outline: none;
    }
    
    
    /* Set a style for the submit button */
    .registerbtn {
      background-color:#1A5276;
      color: white;
    
      padding: 12px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
      border-radius: 4px;
    }
    
    .registerbtn:hover {

      background-color: grey;

      opacity: 1;
    }
    
    /* Add a blue text color to links */
    a {
      color: dodgerblue;
    }
   
  
    </style>
    </head>
    <body onload="getLocation();">
  <!--   <div class="header">
    
    <center><h1>NAMMA BENGALURU</h1></center>
    <center><p> Lets stand together and make Bengaluru a Better place to live</p></center>
    </div> -->
    <div class="header">
  <img src="logonamma.svg"style="float:left; width:180px;height:130px;margin-right:15px;margin-left:18%">

  <h1>&nbsp&nbsp&nbsp&nbsp Victory Road</h1>
  <p>  Lets stand together and make India a Better place to live</p>

</div>

    <div class="navbar" style="background-color: #77262c">
     <a href="hackhome.html">Home</a>
     <a href="index.php" class="active">User</a>
     <a href="hackvol.html">Volunteer</a>
     <a href="publicuserregis.html">NGO</a>
     <a href="#footerid" class="right">Contact us</a>
     <a href="hackfeedback.html" class="right">Feedback</a>
   </div>
    
 <!--    <form action="getLocation.php" method="post" enctype="multipart/form-data"> -->
     <form class="myForm" action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <h1 style="text-align: center; color:  #1A5276;  text-decoration: bolder"><i>UPLOAD IMAGE AND LOCATION</i></h1>
        <p style="text-align: center">Please fill in this form to Upload</p>
         <div class="container">


      
        <label for="image"><b>Upload Image</b></label>
        <input type="file" name="image" id="image"Required>
        <input type="hidden" name="lat" value="">
        <input type="hidden" name="lon" value="">
        <hr>
        <input type="submit" name="submit" class="registerbtn" value="submit"/>
      </div>
      
      
    </form>

    <script type="text/javascript">
      function getLocation(){
        if (navigator.geolocation){
          navigator.geolocation.getCurrentPosition(showPosition,showError);
        }
      }

      function showPosition(position){
        document.querySelector('.myForm input[name = "lat"]').value=position.coords.latitude;
        document.querySelector('.myForm input[name = "lon"]').value=position.coords.longitude;

      }
      function showError(error){
        switch(error.code){
          case error.PERMISSION_DENIED:
          alert("You Must Allow The Request For Geolocation To Fill Out The Form");
          location.reload();
          break;
        }
      }
    </script>
    
   <!--  <a href="getLocation.php"></a> -->

    <div class="footer" id="footerid"><p style="text-decoration: underline;">CONTACT US</p><p>
      <i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Bangalore,INDIA &nbsp&nbsp
      <i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Phone: 91-9468425678 &nbsp&nbsp
      <i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"> </i> Email:nammabengaluru@gmail.com</p>
    </div>


<!-- 
<script>

$(document).ready(function(){
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showLocation);
    }else{ 
        $('#location').html('Geolocation is not supported by this browser.');
    }
});

function showLocation(position){
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    $.ajax({
        type:'POST',
        url:'getLocation.php',
        data:'latitude='+latitude+'&longitude='+longitude,
        success:function(msg){
            if(msg){
               $("#location").html(msg);
            }else{
                $("#location").html('Not Available');
            }
        }
    });
}
</script> -->


    </body>
    </html>
