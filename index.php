<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="home_page.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   
<style>
  p{
    color:yellow;
    font-size:25px;

  }
  h2{
    color:white;
  }
  h4{
    color:white;
    font-size:20px;
    
  }
  #redp{
    color:red;
  }
</style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid" >
          <a class="navbar-brand text-light" href="#"  >Employee Leaves Management System</a>
         
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
            <div class="navbar-nav" id="navleft"  >
              <a class="nav-link active text-light" aria-current="page" href="#" style="float: right;" >Home</a>
              
              <a class="nav-link text-light">
              <form action="emp_login.php" method="POST">
              <i class="bi bi-box-arrow-in-right"></i>Emplooyee
              <input type="submit" >
              </form>  </a>

              <a class="nav-link text-light">
              <form action="admin_login.php" method="POST">
              <i class="bi bi-box-arrow-in-right"></i>Admin Login
              <input type="submit" >
              </form>  </a>
              
            </div>
          </div>
        </div>
      </nav>v>

      <div class="container text-center">
  <div class="row" style="background-color:black;">
  <h2>Just an example to demo..</h2>
    <div class="col">
      <p id="redp">Admin Login</p>
      <p>username</p><h4>rohit</h4>
      <p>password</p><h4>123</h4>
    </div>
    <div class="col">
      <p id="redp">Employee Login</p>
      <p>gmail</p><h4>rohitsen098@gmail.com</h4>
      <p>password</p><h4>123</h4>
    </div>
    
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>