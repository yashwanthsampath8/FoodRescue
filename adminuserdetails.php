<?php
session_start();//starting the session
require 'dbconfig/dbconfig.php'; // adding the db config file
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <h2 style="text-align-last: right; padding: 10px"> Welcome admin <br><a href="admin.php">Admin Home </a><br><a href="Home.html">logout </a></h2>
  <center><h1> Food details </h1>
    <?php
    $query = "select * from users";
    echo '<table border="1" cellspacing="2" cellpadding="2"> 
      <tr>
          <td> <b><font face="Arial">Name</font></b> </td> 
          <td> <b><font face="Arial">Email</font></b> </td> 
          <td> <b><font face="Arial">Phone Number</font></b> </td> 
      </tr>';
 
if ($query_run= mysqli_query($con,$query)) {
    while ($row = $query_run->fetch_assoc()) {
        echo '<tr> 
                  <td>'.$row["name"].'</td> 
                  <td>'.$row["email"].'</td> 
                  <td>'.$row["phone"].'</td> 
              </tr>';
    }
    $query_run->free();
} 
    ?>
  </center>
</body>
</html>