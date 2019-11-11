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
  <h2 style="text-align-last: right; padding: 10px"> Welcome <?php echo $_SESSION['username']; ?><br><a href="userhome.php">User home </a><br><a href="Home.html">logout </a></h2>
  <center><h1> Food details </h1>
<?php
    $name=$_SESSION['username'];
    $query = "select * from rescuedetails where name='$name'";
    if ($query_run = mysqli_query($con,$query)) {
    echo '<table border="1" cellspacing="2" cellpadding="2"> 
      <tr>
          <td> <b><font face="Arial">Name</font></b> </td> 
          <td> <b><font face="Arial">Email</font></b> </td> 
          <td> <b><font face="Arial">Phone Number</font></b> </td> 
          <td> <b><font face="Arial">Food Type</font></b> </td> 
          <td> <b><font face="Arial">Food Name</font></b> </td> 
          <td> <b><font face="Arial">Quantity</font></b> </td> 
          <td> <b><font face="Arial">Expire Date Time</font> </b></td>
          <td> <b><font face="Arial">Address</font> </td> </b>
      </tr>';
 

    while ($row = $query_run->fetch_assoc()) {
        echo '<tr> 
                  <td>'.$row["name"].'</td> 
                  <td>'.$row["email"].'</td> 
                  <td>'.$row["phone"].'</td> 
                  <td>'.$row["foodtype"].'</td> 
                  <td>'.$row["foodname"].'</td> 
                  <td>'.$row["quantity"].'</td> 
                  <td>'.$row["expiredatetime"].'</td> 
                  <td>'.$row["address"].'</td> 
              </tr>';
    }
    $query_run->free();
} 
    ?>
  </center>
</body>
</html>