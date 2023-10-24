
<?php





$servername = "localhost";
$username = "root";
$password = "";
$database = "employee_leave_management";

$conn = mysqli_connect($servername,$username,$password,$database);
?>


<?php

session_start();


?>

<?php
  if(isset($_POST['snoEdit'])){
   
    
      $emp_code = $_POST["emp_code"];
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $department = $_POST["department"];
    $faddress = $_POST['faddress'];
    $country = $_POST['country'];
    $mobile_no = $_POST['mobile_no'];
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
  
    $querych = "SELECT Email_id FROM totalemployee WHERE Email_id = ?";
$stmt = $conn->prepare($querych);
$stmt->bind_param("s", $email);

// Execute the query
$stmt->execute();

// Bind the result
$stmt->bind_result($existingEmail);

// Fetch the result
$stmt->fetch();

    if($email === $existingEmail){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Holy guacamole!</strong> This mail already exit!.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
     $stmt->close();
    }
    else{
    $sql = "INSERT INTO totalemployee(Employee_code, Frist_name, Last_name, Email_id, Password, Gender, DOB, Department, Address, Country, Mobile_no)
    VALUES ('$emp_code','$first_name', '$last_name', '$email', '123', '$gender', '$dob', '$department','$faddress','$country','$mobile_no')";
    
    if ($conn->query($sql) === TRUE) {
      echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> New Employee has been added.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show text-align-center" role="alert">
            <strong>Holy guacamole!</strong> Data not updated.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
    }







    if(isset($_POST['snoEdite'])){
      if(isset($_POST['snoEdite'])){
          $fname = $_POST["fname_edit"];
        $department = $_POST["deparmetnt_edit"];
        $id = $_POST["snoEdite"];
        $emp_code = $_POST['emp_code_edit'];
        $fanme = $_POST['fname_edit'];
        $posting_date = $_POST['pdate_edit'];
        $status = $_POST['status_edit'];

        

        $queryy =  "select * from totalemployee totemp, emp_leave_request leavrq where totemp.Email_id = leavrq.Email_id ";

        $resultt =  mysqli_query($conn,$queryy);
        while($row=mysqli_fetch_assoc($resultt)){
          if($id == $row['id']){
            $myid = $row['sr_no'];
            
            break;
          }
          
        }
          $sql = "UPDATE `emp_leave_request` SET `status` = '$status' WHERE `emp_leave_request`.`sr_no` = $myid;";
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

// delete record







?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="total_employee.css">
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
        <h4>Manage Employee</h4>
    
            <button id="openPopup"   class="edit" name="edit" id="edit">+New Employee</button>


<table class="table" id="myTable"  class="display" >
<thead>
<tr>
    <th scope="col">S No.</th>
    <th scope="col">Employee Code</th>
    <th scope="col">Employee Name</th>
    <th scope="col">Department</th>
    <th scope="col">Email Id</th>
    <!-- <th scope="col">Status</th> -->
      <th scope="col">Action</th>
</tr>
</thead>
<tbody>

<?php

$query =  "select * from totalemployee ";

$result =  mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){
  echo "    <tr>
  <th scope='row'>".$row['id']."</th>
  <td >".$row['Employee_code']."</td>
  <td >".$row['Frist_name']."</td>
  <td >".$row['Department']."</td>
  <td >".$row['Email_id']."</td>
  
  
  
  <td ><button class='edite btn bg-success' data-srnoe='".$row['id']."'>Edit</button>  <button class='delete btn bg-danger' data-srno='".$row['id']."'>Delete</button>
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
        <h1 class="modal-title fs-5" id="editmodal">Add new Employee.</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

      
        <input type="hidden" name='snoEdit' id='snoEdit'>
      
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Employee Code</label>
          <input type="text" class="form-control" id="emp_code" aria-describedby="emailHelp" name="emp_code">
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Frist Name</label>
          <input type="text" class="form-control" id="fname" aria-describedby="emailHelp" name="fname">

        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Last Name</label>
          <input type="text" class="form-control" id="lname" aria-describedby="emailHelp" name="lname">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Email Id</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Gender</label>
          <select class="form-control" id="gender" aria-describedby="emailHelp" name="gender">
            <option value="">--Select--</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Date of Birth</label>
          <input type="date" class="form-control" id="dob" aria-describedby="emailHelp" name="dob">
        </div>        
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Department</label>
          <select class="form-control" id="department" aria-describedby="emailHelp" name="department">
      <option value="">--select--</option>
      <option value="cs">CSE</option>
      <option value="sales">Salse</option>
      <option value="acc">Acc.</option>
    </select>
        </div>   
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Country</label>
          <input type="text" class="form-control" id="country" aria-describedby="emailHelp" name="country">
        </div>  
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Mobile No</label>
          <input type="number" class="form-control" id="mobile_no" aria-describedby="emailHelp" name="mobile_no">
        </div>  


        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Full Address</label>
          
          <textarea name="faddress"  cols="3" rows="10"  class="form-control" id="faddress" aria-describedby="emailHelp" ></textarea>
        </div>
        </div>

        <div class="mb-3 form-check">


        </div>
        
        <button type="submit" class="btn btn-success">Add Employee</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="editnote" name="editnote" >Save changes</button>
      </div>
    </div>
  </div>
</div>





<!-- edit modals edit  -->

<div class="modal fade " id="editmodale" tabindex="-1" aria-labelledby="editmodale" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editmodale">Update the Employee Leave</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

      
        <input type="hidden" name='snoEdite' id='snoEdite'>
      
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Employee Code</label>
          <input type="text" class="form-control" id="emp_code_edit" aria-describedby="emailHelp" name="emp_code_edit">
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Frist Name</label>
          <input type="text" class="form-control" id="fname_edit" aria-describedby="emailHelp" name="fname_edit">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Department</label>
          <input type="text" class="form-control" id="deparmetnt_edit" aria-describedby="emailHelp" name="deparmetnt_edit">
        </div>
      
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Posting Date</label>
          <input type="date" class="form-control" id="pdate_edit" aria-describedby="emailHelp" name="pdate_edit">
        </div>        
  
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Status</label>
          <input type="text" class="form-control" id="status_edit" aria-describedby="emailHelp" name="status_edit">
        </div>  
 


        </div>

        <div class="mb-3 form-check">


        </div>
        
        <button type="submit" class="btn btn-success">Update Leave</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="editnote" name="editnote" >Save changes</button>
      </div>
    </div>
  </div>
</div>



<!-- edit modals delete  -->
<!-- 
<div class="modal fade " id="editmodale" tabindex="-1" aria-labelledby="editmodale" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editmodale">Update the Employee Leave</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

      
        <input type="hidden" name='snoEdite' id='snoEdite'>
      
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Employee Code</label>
          <input type="text" class="form-control" id="emp_code" aria-describedby="emailHelp" name="emp_code">
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Frist Name</label>
          <input type="text" class="form-control" id="fname" aria-describedby="emailHelp" name="fname">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Department</label>
          <input type="text" class="form-control" id="deparmtnt" aria-describedby="emailHelp" name="department">
        </div>
      
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Posting Date</label>
          <input type="date" class="form-control" id="pdate" aria-describedby="emailHelp" name="pdate">
        </div>        
  
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Status</label>
          <input type="text" class="form-control" id="status" aria-describedby="emailHelp" name="status">
        </div>  
 


        </div>

        <div class="mb-3 form-check">


        </div>
        
        <button type="submit" class="btn btn-success">Update Leave</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="editnote" name="editnote" >Save changes</button>
      </div>
    </div>
  </div>
</div>
 -->



























<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
edits = document.getElementsByClassName('edit');
Array.from(edits).forEach((element) => {
  element.addEventListener('click', (e) => {
    console.log('edit', e.target.parentNode.parentNode);
    tr = e.target.parentNode.parentNode;
    
    Leave_type = tr.getElementsByTagName("td")[1].innerText;
    from_data = tr.getElementsByTagName("td")[2].innerText;
    to_data = tr.getElementsByTagName("td")[3].innerText;
    desc = tr.getElementsByTagName("td")[4].innerText;
    console.log(desc);
    snoEdit.value = e.target.getAttribute("data-srno"); // Set snoEdit field value
    // sr_no.value = sr_no;
    // leave_type.value = Leave_type;
    // from_date.value = from_data;
    // to_date.value = to_data;
    // description.value = desc;

    $('#editmodal').modal('toggle');

  });
});




editse = document.getElementsByClassName('edite');
Array.from(editse).forEach((element) => {
  element.addEventListener('click', (e) => {
    console.log('edite', e.target.parentNode.parentNode);
    tr = e.target.parentNode.parentNode;
    
    emp_c = tr.getElementsByTagName("td")[0].innerText;
    fnamee = tr.getElementsByTagName("td")[1].innerText;
    dept = tr.getElementsByTagName("td")[2].innerText;
    pdata = tr.getElementsByTagName("td")[3].innerText;
    statuss = tr.getElementsByTagName("td")[4].innerText;
    
    snoEdite.value = e.target.getAttribute("data-srnoe"); // Set snoEdit field value
    emp_code_edit.value = emp_c;
    fname_edit.value = fnamee;
    deparmetnt_edit.value = dept;
    pdate_edit.value = pdata;
    status_edit.value = statuss;
  

    $('#editmodale').modal('toggle');

  });
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function () {
    $('.delete').click(function () {
        var sr_no = $(this).data('data-srno'); // Get the sr_no of the record to be deleted
        console.log(sr_no);
        if (confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                url: 'totempdelete.php', // Create a separate PHP script for handling deletions
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

  </body>
</html>