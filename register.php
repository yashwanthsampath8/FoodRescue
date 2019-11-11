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
  height: 600px;
  background: inherit;
  position: absolute;
  overflow: hidden;
  top: 50%;
  left: 50%;
  margin-left: -175px;
  margin-top: -300px;
  border-radius: 8px;
}
#container:before{
  width: 500px;
  height: 550px;
  content: "";
  position: absolute;
  top: -2px;
  left: -25px;
  bottom: 0;
  right: 0;
  background: inherit;
  box-shadow: inset 0 0 0 300px rgba(300,290,300,0.2);
  filter: blur(10px);
}

form img{
  width: 120px;
  height: 120px;
  border-radius: 10%;
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
  font-size: 15px;
  font-weight: bold;
  color: rgba(255,255,255, 0.8);
}
input[type="submit"]{
  border: 0;
  border-radius: 8px;
  padding-bottom: 0;
  height: 50px;
  background: #df2359;
  color: white;
  cursor: pointer;
  transition: all 60ms ease-in-out;
}
}
input[type="submit"]:hover{
  background: #C0392B;
}

}
</style>
<body><main>
<div id="container">
  <form action="register.php" method="POST">
    <img src="images/login2.png"><br>
    <input type="text" placeholder="Name" name="Name" required><br>
    <input type="email" placeholder="Email" name="Email" required><br>
    <input type="text" placeholder="Phonenumber" name="Phonenumber" required><br>
    <input type="password" placeholder="Password" name="password" required><br>
    <input type="password" placeholder="ConfirmPassword" name="conpassword" required><br>
    <input type="submit" value="REGISTER" name="register"><br>
    <a style="color:red;" href="login.php">Already Register Login</a>
  </form>

<?php
 if(isset($_POST['register']))
 {
//Declaring variables
$name = $_POST['Name'];
$email = $_POST['Email'];
$phone = $_POST['Phonenumber'];
$pwd = $_POST['password'];
$conpwd = $_POST['conpassword'];
if($pwd == $conpwd)
{
  $query = "select email, phone from users where email='$email' OR phone='$phone'";
  $query_run= mysqli_query($con,$query);
  if (mysqli_num_rows($query_run)>0)
  {
    echo '<script type="text/javascript"> alert("User already registerd") </script>';
  }else
  {
    $query = "insert into users (name,email,phone,password) values ('$name','$email','$phone','$pwd')";
    $query_run= mysqli_query($con,$query);
    if ($query_run)
      {
        echo '<script type="text/javascript"> alert("Thanks for registering with food rescue.")</script>';
        header('location: login.php');
      }
  }
}else
{
  echo '<script type="text/javascript"> alert("Password and confirm password is not matching") </script>';
}}
?> 

</div>
</main>
</body></html>
</style>
</html>