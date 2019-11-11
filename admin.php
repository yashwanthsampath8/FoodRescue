<?php
session_start();//starting the session
require 'dbconfig/dbconfig.php'; // adding the db config file
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
input[type=datetime-local] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit], button {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=submit]:hover, button:hover {
  background-color: #45a049;
}
</style>
<body>
  <h2 style="text-align-last: right; padding: 10px"> Welcome admin <br><a href="adminuserdetails.php">User details </a><br><a href="Home.html">logout </a></h2>
  <center><h1> Food details </h1>
    <form action="admin.php" method="POST">
      <table>
      <tr><td><b>From Date:</b></td><td><input type="datetime-local" name="Fromdate" id="datetime" required><br><br></td>
     <td><b>To date:</b></td><td><input type="datetime-local" name="Todate" id="datetime" required><br><br></td>
     <td><input type="submit" name="View"></td></tr>
   </table>
    </form>
    <?php
    if(isset($_POST['View']))
{
    $fromdate =$_POST['Fromdate'];
    $todate = $_POST['Todate'];
    $query = "select * from rescuedetails where expiredatetime BETWEEN '$fromdate' AND '$todate' ";
    $query_run= mysqli_query($con,$query);
    if (mysqli_num_rows($query_run)>0)
    {
          echo '<table border="1" cellspacing="2" cellpadding="2"> 
          <tr>
          <td> <b><font face="Arial">Name</font></b> </td> 
          <td> <b><font face="Arial">Email</font></b> </td> 
          <td> <b><font face="Arial">Phone Number</font></b> </td> 
          <td> <b><font face="Arial">Food Type</font></b> </td> 
          <td> <b><font face="Arial">Food Name</font></b> </td> 
          <td> <b><font face="Arial">Quantity</font></b> </td> 
          <td> <b><font face="Arial">Expire date time</font> </b></td>
          <td> <b><font face="Arial">Address</font> </td> </b>
      </tr>';
        while ($row = $query_run->fetch_assoc())
        {
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
    }
    else
    {
       echo '<script type="text/javascript"> alert("No details present")</script>';  
    }
   } ?>
  </center>
</body>
</html>