
<?php





$servername = "localhost";
$username = "root";
$password = "";
$database = "employee_leave_management";

$conn = mysqli_connect($servername,$username,$password,$database);
?>


<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("Location:home_page.php");
  exit;
}



if(isset($_POST['snoEdit'])){
  if(isset($_POST['snoEdit'])){
      $fname = $_POST["fname_edit"];
    $department = $_POST["department_edit"];
    $id = $_POST["snoEdit"];
    $email_id = $_POST['email_edit'];
    $dob = $_POST['dob_edit'];
    $mobile = $_POST['mobile_edit'];
      $sql = "UPDATE `totalemployee` SET `Frist_name` = '$fname', `Department` = '$department',`Email_id`='$email_id',`DOB`='$dob',`Mobile_no`='$mobile' WHERE `totalemployee`.`id` = $id;";
      $result = mysqli_query($conn,$sql) ;
      if($result){
        echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> Data updated successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
       
      }else{
        echo '<div class="alert alert-danger alert-dismissible fade show text-align-center" role="alert">
        <strong>Holy guacamole!</strong> Data not updated.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
     
      }
    
    }
  
  }

  if(isset($_POST["leave_req"])){
  
  $_SESSION['loggedin']  = true;
  $email  =  $_SESSION['Email_id'];
  $_SESSION['Email_id'] = $email;

header("Location:leave_reest.php") ;
}


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="C:\Users\SEN\Downloads\InstallXamppHere\htdocs\working_employee\employee_management\after_emp_login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </head>
  <body   style="background-color: rgb(160, 148, 148);" >
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
    <a class="btn btn-dark" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
      <img src="images\emp_logo.png" alt="" id="empsign" style="height:30px; border:50%;">  Emplooyee Role
      </a>
      
      
      <div class="offcanvas offcanvas-start  " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel"  style="background-color: gray;" >
        <div class="offcanvas-header " >
          <h5 class="offcanvas-title" id="offcanvasExampleLabel"><?php  echo $_SESSION['Email_id'];?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div>
            See Details
          </div>
          <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
              Options
            </button>
        
            <ul class="dropdown-menu" style="background-color:rgb(167, 153, 153)">
              <li>
              <a class="nav-link text-light">
              <form action="after_emp_login.php" method="POST">
              <i class="bi bi-box-arrow-in-right"></i>View Profile
              <input type="submit" >
              </form>  </a>
              </li>
              <li>
              <a class="nav-link text-light">
              <form action="" method="POST">
              <i class="bi bi-box-arrow-in-right"></i>Leave Request
              <input type="submit" name="leave_req">
              </form>  </a>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
<br>
      <div class="currentDetail">
          <div>
          
        <h1>Welcome to: <?php echo $_SESSION['Email_id']; ?></h1>
    </div>
    <br style="background-color: black; width: 15px;">
    <div class="empinfo">
        <h2>Employee info</h2>
      </div>


<!-- edit modals -->

<div class="modal fade " id="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editmodal">Edit your details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="after_emp_login.php" method ="POST">
        <input type="hidden" name='snoEdit' id='snoEdit'>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Frist_name</label>
          <input type="text" class="form-control" id="fname_edit" aria-describedby="emailHelp" name="fname_edit">

        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Department</label>
          <input type="text" class="form-control" id="department_edit" aria-describedby="emailHelp" name="department_edit">
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Email id</label>
          <input type="text" class="form-control" id="email_edit" aria-describedby="emailHelp" name="email_edit">

        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">DOB</label>
          <input type="text" class="form-control" id="dob_edit" aria-describedby="emailHelp" name="dob_edit">

        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Mobile no</label>
          <input type="text" class="form-control" id="mobile_edit" aria-describedby="emailHelp" name="mobile_edit">

        </div>

        </div>
        <div class="mb-3 form-check">


        </div>
        
        <button type="submit" class="btn btn-danger">Update now</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="editnote" name="editnote" >Save changes</button>
      </div>
    </div>
  </div>
</div>
















<div class="container">
<table class="table" id="myTable"  class="display" >
<thead>
<tr>
    <th scope="col">S No.</th>
    <th scope="col">Employee Code</th>
    <th scope="col">Full Name</th>
    <th scope="col">Department</th>
    <th scope="col">Email id</th>
    <th scope="col">DOB</th>
    <th scope="col">Mobile No.</th>
    <th scope="col">Edit</th>
</tr>
</thead>
<tbody>

<?php

$sql = "SELECT * FROM `totalemployee`";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
  if($_SESSION['Email_id'] == $row['Email_id']){
    echo "    <tr>
    <th scope='row'>".$row['id']."</th>
    <td >".$row['Employee_code']."</td>
    <td >".$row['Frist_name']."</td>
    <td >".$row['Department']."</td>
    <td >".$row['Email_id']."</td>
    <td >".$row['DOB']."</td>
    <td >".$row['Mobile_no']."</td>
    
    <td ><button class='edit btn bg-success' data-srno='".$row['id']."'>Edit</button>
    </td>
    </tr>";
  }


}



?>




</tbody>
</table>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
edits = document.getElementsByClassName('edit');
Array.from(edits).forEach((element) => {
  element.addEventListener('click', (e) => {
    console.log('edit', e.target.parentNode.parentNode);
    tr = e.target.parentNode.parentNode;
    Frist_name = tr.getElementsByTagName("td")[1].innerText;
    Department = tr.getElementsByTagName("td")[2].innerText;
    Email_id = tr.getElementsByTagName("td")[3].innerText;
    DOB = tr.getElementsByTagName("td")[4].innerText;
    Mobile_no = tr.getElementsByTagName("td")[5].innerText;
    snoEdit.value = e.target.getAttribute("data-srno"); // Set snoEdit field value
    fname_edit.value = Frist_name;
    department_edit.value = Department;
    email_edit.value = Email_id;
    dob_edit.value = DOB;
    mobile_edit.value = Mobile_no;

    $('#editmodal').modal('toggle');
  });
});


</script>
  </body>
</html>