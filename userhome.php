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
input[type=text], input[type=datetime-local], select {
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
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width: 500px;
}
h1 {
color: #7c795d; 
font-family: 'Trocchi', serif; 
font-size: 45px; 
font-weight: normal; 
line-height: 48px; 
margin: 0;
}
h2 {
 font-family: 'Open Sans', sans-serif;
}
</style>
<body>
  <h2 style="text-align-last: right; padding: 10px"> Welcome <?php echo $_SESSION['username']; ?><br><a href="rescuedetails.php">Rescue History </a><br><a href="Home.html">logout </a></h2>
  <center><h1> Please enter the Food details </h1>
  <?php
    $name = $_SESSION['username'];
    $query = "select * from users where name='$name'";
    $query_run= mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($query_run);
    $_SESSION['email'] = $row['email'];
    $_SESSION['phone'] = $row['phone'];
    $email = $row['email'];
    $phone = $row['phone'];
  ?> 
  <div>
  <form action="userhome.php" method="POST">
  <table>
  <tr><td><b>User name:</b></td><td><input type="text" name="uname" disabled="true" value="<?php echo $name;?>"><br><br></td></tr>
  <tr><td><b>Email:</b></td><td><input type="text" name="email" disabled="true" value="<?php echo $email;?>"><br><br></td></tr>
  <tr><td><b>Mob number:</b></td><td><input type="text" name="phone" disabled="true" value="<?php echo $phone;?>"><br><br></td></tr>
  <tr><td><b>Food type:</b></td><td>
  <select name="foodtype" class="foodtype">
    <option value="Vegitables">Vegitables</option>
    <option value="Food">Food</option>
    <option value="Fruits">fruits</option>
  </select>
    <br><br></td></tr><tr><td>
  <b>Food Name:</b></td><td> <input type="text" name="foodname" id="fn" required>
    <br><br></td></tr><tr><td>
  <b>Quantity(in kg): </b></td><td><input type="text" name="Quantity" id="qa" required>
    <br><br></td></tr><tr><td>
    <b>Expire Date/time: </b></td><td><input type="datetime-local" name="Expiretime" id="ex" required>
    <br><br> </td></tr><tr><td>
    <b>Address: </b></td><td><textarea rows="4" cols="30" name="address" id="ad" required></textarea>
    <br><br></td></tr><tr><td>
      <input type="submit" name="rescue" value="Submit"></td><td>
      <button onclick="clear()">Clear input field</button></td></tr>
  </table>
  </form></div>
</center>
<?php
if(isset($_POST['rescue']))
{
  //Declaring variables
  $name = $_SESSION['username'];
  $email = $_SESSION['email'];
  $phone = $_SESSION['phone'];
  $foodtype = $_POST['foodtype'];
  $foodname = $_POST['foodname'];
  $quantity = $_POST['Quantity'];
  $expire = $_POST['Expiretime'];
  $address = $_POST['address'];
  $query = "insert into rescuedetails (name,email,phone,foodtype,foodname,quantity,expiredatetime,address) values ('$name','$email','$phone','$foodtype','$foodname','$quantity','$expire','$address')"; 
  $query_run1 = mysqli_query($con,$query);
  if($query_run1)
  {
     echo '<script type="text/javascript"> alert("Thanks for Rescuing the food..!")</script>';
 
  }else
  {  
    echo '<script type="text/javascript"> alert("Data not inserted try again.")</script>';  
  }  
}
?>
<script type="text/javascript">
  function clear() {
  document.getElementById('fn').value = '';
  document.getElementById('qa').value = '';
  document.getElementById('et').value = '';
  document.getElementById('ad').value = '';
}
</script>
</body>
</html>
