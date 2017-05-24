<?php

//$host = "localhost";
//$username = "root";
//$password = "ubuntu";
//$database = "Devices";
//$port = "161";

require 'db.php';

// Create connection
$conn = mysqli_connect($host, $username,$password,$database,$port);

// Check connection
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
} 
echo "Connected successfully";

//selecting table

$ctable = "CREATE TABLE IF NOT EXISTS managerh_details (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    IP varchar(30) NOT NULL,
    PORT int(11) NOT NULL,
    COMMUNITY varchar(255) NOT NULL,
    UNIQUE key(IP,PORT,COMMUNITY)
    
)";


if (mysqli_query($conn,$ctable)){
             echo "created";
}else{
      echo "Error:".$insert."<br>". mysqli_error($conn); 
}

?>
<html>
<head>
     <title>Assignment-2 </title>
     <style type="text/css">
body
{
background: #E0E0E0;
}
</style>
</head>
<body>

<form action="" method="post">
IP : <input type = "text" name="IP"> <br>
PORT : <input type = "text" name="PORT"> <br>
COMMUNITY : <input type = "text" name="COMMUNITY"> <br>
<input type="submit">
</form>
<?php
if (isset($_POST["IP"]) && isset($_POST["PORT"]) && isset($_POST["COMMUNITY"])){
$IP = $_POST["IP"];
$PORT = $_POST["PORT"];
$COMMUNITY = $_POST["COMMUNITY"];
$insert = "INSERT IGNORE INTO managerh_details (IP,PORT,COMMUNITY) VALUES ('$IP','$PORT','$COMMUNITY');";

if (mysqli_query($conn, $insert)){
             echo "IP entered success";
}else{
      echo "Error:".$insert."<br>". mysqli_error($conn); 
}
}

$table = "SELECT * FROM Asgn33 ORDER BY name";
$result = mysqli_query($conn,$table);

?>
   <table style="width:60%" border="1" cellpadding="1" cellspacing="1">
<tr>
    <th>name</th>
    <th>newtime</th>
    <th>newstatus</th>
    <th>oldtime</th>
   
    <th>oldstatus</th>
</tr>
<?php

    
   if (mysqli_num_rows($result) > 0) {
     // output data of each row
     while($row = mysqli_fetch_assoc($result)) {
 // var_dump($row);
  echo "<tr>"; 
      
  echo "<td>".$row['name']."</td>";
  echo "<td>".$row['newtime']."</td>";
  echo "<td>".$row['newstatus']."</td>";
  echo "<td>".$row['oldtime']."</td>";
  echo "<td>".$row['oldstatus']."</td>";
  echo "</tr>";
  }
  }

?>
</body>
</html>
       
