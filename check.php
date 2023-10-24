<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "employee_leave_management";

$conn = mysqli_connect($servername, $username, $password, $database);

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("Location: home_page.php");
  exit;
}

if (isset($_GET['delete'])) {
  $sno = $_GET['delete'];
  $sql = "DELETE FROM `totalemployee` WHERE `id` = $sno";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Data deleted successfully.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
  } else {
    echo '<div class="alert alert-dark alert-dismissible fade show text-align-center" role="alert">
      <strong>Data not deleted.</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
  }
}

if (isset($_POST['snoEdit'])) {
  $sno = $_POST['snoEdit'];
  $title = $_POST['title'];
  $description = $_POST['description'];

  $sql = "UPDATE `totalemployee` SET `Employee_code`='$title', `Frist_name`='$description' WHERE `id`=$sno";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Data updated successfully.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible fade show text-align-center" role="alert">
      <strong>Data not updated.</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <!-- ... Your HTML head content ... -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="E:\NewProject\WebDevlopment Project\Employee leave management system\employeeLogin.css"> -->
    <!-- <link rel="stylesheet" href="E:\NewProject\WebDevlopment Project\Employee leave management system\employeeLogin.css"> -->
    <link rel="stylesheet" href="after_emp_login.css">
</head>
<body style="background-color: rgb(160, 148, 148);">


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
      <img src="images\emp_logo.png" alt="" id="empsign">  Emplooyee Role
      </a>
      
      
      <div class="offcanvas offcanvas-start  " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel"  style="background-color: gray;" >
        <div class="offcanvas-header " >
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">User@gmail.com</h5>
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
              <li><a class="dropdown-item" href="E:\NewProject\WebDevlopment Project\Employee leave management system\afterEmployeeLogin.html"><i class="bi bi-person-lines-fill"></i>My profile</a></li>
              <li><a class="dropdown-item" href="E:\NewProject\WebDevlopment Project\Employee leave management system\employeeLeaveRequest.html"><i class="bi bi-file-earmark-fill"></i>Leave Request</a></li>
              
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
        <h1 class="modal-title fs-5" id="editmodal">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="after_emp_login.php" method ="POST">
        <input type="hidden" name='snoEdit' id='snoEdit'>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">add title</label>
          <input type="text" class="form-control" id="title_edit" aria-describedby="emailHelp" name="title">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" maxlength="60">Title description</label>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="description_edit" style="height: 100px" name="description"></textarea>
                <label for="floatingTextarea2">Note description</label>
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
echo "    <tr>
<th scope='row'>".$row['id']."</th>
<td >".$row['Employee_code']."</td>
<td >".$row['Frist_name']."</td>
<td >".$row['Department']."</td>
<td >".$row['Email_id']."</td>
<td >".$row['DOB']."</td>
<td >".$row['Mobile_no']."</td>

<td ><button class='delete btn bg-danger me-3' id = d".$row['id'].">Delete</button><button class='edit btn bg-success' data-srno='".$row['id']."'>Edit</button>
</td>
</tr>";
}



?>




</tbody>
</table>


</div>



  <!-- ... Your HTML body content ... -->

  <script>
    // Edit functionality
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener('click', (e) => {
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[1].innerText;
        description = tr.getElementsByTagName("td")[2].innerText;
        snoEdit.value = e.target.getAttribute("data-srno");
        description_edit.value = description;
        title_edit.value = title;

        $('#editmodal').modal('toggle');
      });
    });

    // Delete functionality
    delets = document.getElementsByClassName('delete');
    Array.from(delets).forEach((element) => {
      element.addEventListener("click", (e) => {
        sno = e.target.getAttribute("data-srno");

        if (confirm("Are you sure want to delete?")) {
          window.location = `your_php_file.php?delete=${sno}`;
        } else {
          console.log("NO");
        }
      });
    });
  </script>
</body>
</html>
