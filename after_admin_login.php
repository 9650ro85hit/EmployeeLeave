
<?php





$servername = "localhost";
$username = "root";
$password = "";
$database = "employee_leave_management";

$conn = mysqli_connect($servername,$username,$password,$database);
?>


<?php

session_start();
 $user  = $_SESSION['username'] ;

?>

<?php

if(isset($_POST['snoEdit'])){
   
    
  $emp_code = $_POST["emp_code"];
  $fname = $_POST["fname"];
  $leave_type = $_POST["leave_type"];
  $creation_date = $_POST["creation_date"];
  $status = $_POST["astatus"];
  $id = $_POST["snoEdit"];
$servername = "localhost";
$username = "root";
$password = "";
$database = "employee_leave_management";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `emp_leave_request` SET `status` = '$status' WHERE `emp_leave_request`.`sr_no` = $id";

if ($conn->query($sql) === TRUE) {
  echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> Leave request has been updated.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
} else {
  echo '<div class="alert alert-danger alert-dismissible fade show text-align-center" role="alert">
        <strong>Holy guacamole!</strong>  not updated.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- <link rel="stylesheet" href="C:\Users\SEN\Downloads\InstallXamppHere\htdocs\working_employee\employee_management\after_admin_login.css"> -->
    <link rel="stylesheet" href="after_admin_login.css">
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

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <a class="btn btn-dark" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
      <img src="images\emp_logo.png" alt="" id="empsign">  Administrator Role
      </a>
      
      
      <div class="offcanvas offcanvas-start  " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel"  style="background-color: gray;" >
        <div class="offcanvas-header " >
          <h5 class="offcanvas-title" id="offcanvasExampleLabel"><?php  echo $_SESSION['username'] ; ?></h5>
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
              <li><a class="nav-link text-light">
              <form action="after_admin_login.php" method="POST">
              <i class="bi bi-box-arrow-in-right"></i>Dash Board
              <input type="submit" >
              </form>  </a></li>
              <li><a class="nav-link text-light">
              <form action="total_department.php" method="POST">
              <i class="bi bi-box-arrow-in-right"></i>Departments
              <input type="submit" >
              </form>  </a></li>
              <li><a class="nav-link text-light">
              <form action="total_leave_typee.php" method="POST">
              <i class="bi bi-box-arrow-in-right"></i>Leave Type
              <input type="submit" >
              </form>  </a></li>
              <li><a class="nav-link text-light">
              <form action="total_employee.php" method="POST">
              <i class="bi bi-box-arrow-in-right"></i>Employees
              <input type="submit" >
              </form>  </a></li>
       <li>
        
        
        </div>


       </li>



             
            </ul>
          </div>
        </div>
      </div>
<br>
      <div class="currentDetail">
          <div>
        <h3>Welcome <?php  echo $_SESSION['username'] ; ?></h3>
    </div>
    <br style="background-color: black; width: 15px;">

    </div>
<br>
<div class="alldetls">
    <div class="row">
        <div class="col" ><button onclick="gotodept()"><i class="bi bi-file-earmark-fill" id="totdpt"><a  style ="font-size:25px; text-decoration:none; color:black;" href="total_department.php">Total Department</a>
        </i></button>
        </div>
        
        <div class="col" ><button onclick="gotoemp()"><i class="bi bi-people-fill" id="totemp"></i><a  style ="font-size:25px; text-decoration:none; color:black;" href="total_employee.php">Total Employee</a></button></div>
        <div class="col" ><button onclick="gotoleave()"><i class="bi bi-person-badge" id="levtpye"></i><a  style ="font-size:25px; text-decoration:none; color:black;" href="total_leave_typee.php">Leave Type</a></button></div>
    </div>
</div>
<br>
    <div class="textt">
        <div>
      <h3>Latest leave application</h3>
  </div>

        

<div class="container">
<table class="table" id="myTable"  class="display" >
<thead>
<tr>
    <th scope="col">S No.</th>
    <th scope="col">Employee Code</th>
    <th scope="col">Employee Name</th>
    <th scope="col">Leave Type</th>
    <th scope="col">Posting Date</th>
    <th scope="col">Status</th>
  
    <th scope="col">Action</th>
</tr>
</thead>
<tbody>

<?php

$query =  "select * from totalemployee totemp, emp_leave_request leavrq where totemp.Email_id = leavrq.Email_id ";

$result =  mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){
  echo "    <tr>
  <th scope='row'>".$row['id']."</th>
  <td >".$row['Employee_code']."</td>
  <td >".$row['Frist_name']."</td>
  <td >".$row['leave_type']."</td>
  <td >".$row['postiing_date']."</td>
  <td >".$row['status']."</td>
  
  <td ><button class='edit btn bg-success' name='edit' id='edit' data-srno='".$row['sr_no']."'>Edit</button>
  <button class='delete btn bg-danger' data-srno='".$row['sr_no']."'>Delete</button>
  </td>
  </tr>";
  
}

?>




</tbody>
</table>


<!-- edit modals -->

<div class="modal fade " id="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editmodal">Update Employee Leave</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

      
        <input type="hidden" name='snoEdit' id='snoEdit'>
      
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Employe Code</label>
          <input type="text" class="form-control" id="emp_code" aria-describedby="emailHelp" name="emp_code">
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Frist Name</label>
          <input type="text" class="form-control" id="fname" aria-describedby="emailHelp" name="fname">

        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Leave Type</label>
          <input type="text" class="form-control" id="leave_type" aria-describedby="emailHelp" name="leave_type">
        </div>


        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Creation Date</label>
          <input type="date" class="form-control" id="creation_date" aria-describedby="emailHelp" name="creation_date">
        </div>  
        
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Status</label>
          <input type="text" class="form-control" id="astatus" aria-describedby="emailHelp" name="astatus">
        </div>
        </div>

        
        </div>

        
        <button type="submit" class="btn btn-success">Update</button>
      </form>
      </div>
      
    </div>
  </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>





edits = document.getElementsByClassName('edit');
  Array.from(edits).forEach((element) => {
    element.addEventListener('click', (e) => {
      console.log('edit', e.target.parentNode.parentNode);
      tr = e.target.parentNode.parentNode;
      empcode = tr.getElementsByTagName("td")[0].innerText;
      frname = tr.getElementsByTagName("td")[1].innerText;
      leavetype = tr.getElementsByTagName("td")[2].innerText;
      date = tr.getElementsByTagName("td")[3].innerText;
      statuss = tr.getElementsByTagName("td")[4].innerText;
      snoEdit.value = e.target.getAttribute("data-srno"); // Set snoEdit field value
      emp_code.value = empcode; // Updated ID here
      fname.value = frname; // Updated ID here
      console.log(leave_type);
      console.log(statuss);
      leave_type.value = leavetype; // Updated ID here
      creation_date.value = date; // Updated ID here
      astatus.value = statuss; // Updated ID here

      $('#editmodal').modal('toggle');
    });
  });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function () {
    $('.delete').click(function () {
        var sr_no = $(this).data('srno'); // Get the sr_no of the record to be deleted
        if (confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                url: 'totleavrqdelete.php', // Create a separate PHP script for handling deletions
                method: 'POST',
                data: { sr_no: sr_no },
                success: function (response) {
                    if (response === 'success') {
                        // Reload the page or update the table to reflect the deletion
                        location.reload();
                    } else {
                        alert('Failed to delete record.');
                    }
                }
            });
        }
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  </body>
</html>