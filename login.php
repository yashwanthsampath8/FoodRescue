<?php
session_start();//starting the session
require 'dbconfig/dbconfig.php'; // adding the db config file
?>
<html>
<style>
*{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
}
main{
  height: 100vh;
  background-image: url("images/log2.jpg");
  background-size: cover;
}
#container{
  width: 350px;
  height: 500px;
  background: inherit;
  position: absolute;
  overflow: hidden;
  top: 50%;
  left: 50%;
  margin-left: -175px;
  margin-top: -250px;
  border-radius: 8px;
}
#container:before{
  width: 400px;
  height: 550px;
  content: "";
  position: absolute;
  top: -25px;
  left: -25px;
  bottom: 0;
  right: 0;
  background: inherit;
  box-shadow: inset 0 0 0 200px rgba(255,255,255,0.2);
  filter: blur(10px);
}
form img{
  width: 120px;
  height: 120px;
  border-radius: 100%;
}
form{
  text-align: center;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
}
input{
  background: 0;
  width: 200px;
  outline: 0;
  border: 0;
  border-bottom: 2px solid rgba(255,255,255, 0.3);
  margin: 20px 0;
  padding-bottom: 10px;
  font-size: 18px;
  font-weight: bold;
  color: rgba(255,255,255, 0.8);
}
input[type="submit"]{
  border: 0;
  border-radius: 8px;
  padding-bottom: 0;
  height: 60px;
  background: #df2359;
  color: white;
  cursor: pointer;
  transition: all 600ms ease-in-out;
}
input[type="submit"]:hover{
  background: #C0392B;
}
span a{
  color: rgba(255,255,255, 0.8);
}
</style>
<body><main>
<div id="container">
  <form action="login.php" method="POST">
    <img src="images/login2.png"><br>
    <input type="email" placeholder="Email" name="Email" required><br>
    <input type="password" placeholder="Password" name="password" required><br>
    <input type="submit" value="LOG IN" name="login"><br>
    <a style="color:black;" href="register.php">CREATE ACCOUNT</a>
  </form>
  <?php
if(isset($_POST['login']))
{
  $email = $_POST['Email'];
  $pwd = $_POST['password'];
  if($email == 'admin@fr.com' && $pwd == 'admin')
  {
    header('location: admin.php');
  }else
  {
    $query = "select * from users where email='$email' AND password='$pwd'";
    $query_run= mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($query_run);
    $_SESSION['username']=$row['name'];
    echo $_SESSION['username'];
      if (mysqli_num_rows($query_run)==1)
      {
        echo '<script type="text/javascript"> alert("Login successful") </script>';
        echo $row['name'];
        header('location: userhome.php');
      }else
      {
        echo '<script type="text/javascript"> alert("Invalid login credentails") </script>';
      }
  }
  }
?> 
</div>
</main>
</body></html>