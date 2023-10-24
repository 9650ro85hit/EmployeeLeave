<?php
error_reporting(0);
$mysqli = new mysqli("localhost", "root", "", "employee_leave_management");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $password = $_POST['pass'];

    	
	
    $query = "SELECT * FROM `adminlogin` WHERE `UserName` = '$user' AND `Password` = '$password'";

    $result = $mysqli->query($query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            
             echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong>You have Loged-in successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
           session_start();
          $_SESSION['loggedin']  = true;
          $_SESSION['username'] = $user;
        header("Location:after_admin_login.php") ;
    
        } else {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Holy guacamole!</strong>Your Username or Password not match.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        }
    } else {
        echo 'Error: ' . mysqli_error($mysqli);
    }


}
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="admin_login.css">
  </head>
  <body    >
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="height: 80px;" >
        <div class="container-fluid" >
          <a class="navbar-brand" href="#"  >Employee Leaves Management System</a>
         
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
            <div class="navbar-nav" id="navleft"  >
              <a class="nav-link active" aria-current="page" href="index.php" style="float: right;" >Home</a>
            </div>
          </div>
        </div>
      </nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <div class="loginform">
        <div class="content">
            <img src="images\emp_logo.png" alt="">
            <h3>Welcome Back!</h3>
            <br>
            <h5>Admin Sign-in</h5>

        </div>
        <form action=""method="POST">
            <div>
            Username:
            <input type="text" name="username" id="username" placeholder="Username">
        </div>
        <div>
            Password:
            <input type="password" placeholder="Password" id="password" name="pass">
        </div>
    
        <button type="submit">Login </button>
   
    
        </form>
        
        <h3>Employee Leave Management System @ 2023</h3>
    </div>



  </body>
</html>