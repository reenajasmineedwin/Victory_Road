<!-- POTHOLE DISPLAY IN TABLE PAGE -->
  

  <style>.registerbtn {
      background-color:#1A5276;
      color: white;
      padding: 12px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 10%;
      opacity: 0.9;
      border-radius: 4px;
    }






.header {
  padding: 50px;
  text-align: left;
  background:#DCC7AA;

  color:#8F5B34;

  max-height: 350px;
}

.navbar {
  overflow: hidden;
  /*background-color: #8D9B6A;*/
  background-color: #77262c;
  position: sticky;
  position: -webkit-sticky;
  top: 0;
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}


/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}

/* Active/current link */
.navbar a.active {
  background-color: #666;
  color: white;}




/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}


table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
tr:nth-child(odd) {
  background-color: #E0CEBA;
}


</style>
<body style="background-color:#A6ACAF;">
<form method="POST">
<!-- 
   <div class="header">
    
    <center><h1>NAMMA BENGALURU</h1></center>
    <center><p> Lets stand together and make Bengaluru a Better place to live</p></center>
    </div> -->
<div class="header">
  <img src="logonamma.svg"style="float:left; width:180px;height:130px;margin-right:15px;margin-left:18%">

  <h1>&nbsp&nbsp&nbsp&nbsp Victory Road</h1>
  <p>  Lets stand together and make India a Better place to live</p>

</div>
    <div class="navbar">
     <a href="hackhome.html">Home</a>
     <a href="index.php">User</a>
     <a href="hackvol.html">Volunteer</a>
     <a href="publicuserregis.html" class="active">NGO</a>
     <a href="#footerid" class="right">Contact us</a>
     <a href="hackfeedback.html" class="right">Feedback</a>
   </div>
    

   



<form method="POST">
  <style type="text/css">
input[type=text], select {
    width: 50%;

     padding: 14px;
      margin: 5px 0 15px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
  font-size: 17px;
}</style>
    <!-- <p>
        <input type="text" name="latitude" id="latitude" placeholder="Enter latitude">
    </p>

    <p>
        <input type="text" name="longitude" id="longitude"placeholder="Enter longitude">
    </p>

    <input class="registerbtn" type="submit" value="Find Location" name="submit_coordinates">
 -->

<table id="table">
<tr style="background-color:#A6ACAF;color: black">
    <th><center>Pothole ID</center></th>
    <th><center>Pothole image</center></th>
    <th><center>Location</center></th>

</tr>


<?php
    include "db_con.php";
          $sql = "SELECT * FROM IMG ";
          $r = mysqli_query($conn,$sql);
          //echo $r;


while($row = mysqli_fetch_array($r))
 {
    ?>
    <tr>
        <td style="text-align: center;"><?php echo $row['id']?></td>
        <td style="text-align: center;"><?php echo '<image src="data:image;base64,'.base64_encode($row['image']).'" alt="pothole image" style="width:200px;height:200px;">';?></td>
        <td style="text-align: center;"> <iframe width="100%" height="" src="https://maps.google.com/maps?q=<?php echo $row['latitude']; ?>,<?php echo $row['longitude']; ?>&output=embed"></iframe>
  </tr>
  <?php 
 }


?>
  </table>

<p>
<center><button class="registerbtn"><a style="cursor: default; color:white; text-decoration:none;"href="reportngo.html">Report Work</a></button></center></p>




</form>

        
        <script>
    
                var table = document.getElementById('table');
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                         document.getElementById("latitude").value = this.cells[2].innerHTML;
                         document.getElementById("longitude").value = this.cells[3].innerHTML;
                        
                    };
                }
    
         </script>

</body>










