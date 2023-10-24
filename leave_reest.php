


<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "employee_leave_management";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>

<?php
  if(isset($_POST['snoEdit'])){
    $email = $_SESSION['Email_id'];
    
      $leave_type = $_POST["leave_type"];
    $from_date = $_POST["from_date"];
    $to_date = $_POST["to_date"];
    $description = $_POST['description'];

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
    
    
    
    $sql = "INSERT INTO emp_leave_request (Email_id,leave_type, from_date, to_date, description, postiing_date, admin_remark, status)
    VALUES ('$email','$leave_type', '$from_date', '$to_date', '$description', current_timestamp(), '0', 'not update')";
    
    if ($conn->query($sql) === TRUE) {
      echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> Leave request has been submitted.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show text-align-center" role="alert">
            <strong>Holy guacamole!</strong> Data not updated.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
      // echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
 
    
    }
  
  





?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leave Request</title>
    <link rel="stylesheet" href="leave_request.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> 

   
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <a class="btn btn-dark" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
      <img src="images/emp_logo.png" alt="" id="empsign"> Emplooyee Role
      </a>
      
      
      <div class="offcanvas offcanvas-start  " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel"  style="background-color: gray;" >
        <div class="offcanvas-header " >
          <h5 class="offcanvas-title" id="offcanvasExampleLabel"><?php echo $_SESSION['Email_id']; ?></h5>
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
        <h1><?php echo $_SESSION['Email_id']; ?></h1>
    </div>

    <div class="makerequest">
        <div id="request">
            

            <button   class="edit" name="edit" id="edit">+Make Request</button>
            <div id="popup" class="popup">
</div>
</div>


   
<div class="container">
<table class="table" id="myTable"  class="display" >
<thead>
<tr>
    <th scope="col">S No.</th>
    <th scope="col">Emaile id</th>
    <th scope="col">Leave Type</th>
    <th scope="col">From Date</th>
    <th scope="col">To Date</th>
    <th scope="col">Description</th>
    <th scope="col">Posting Date</th>
    <th scope="col">Admin Remark</th>
    <th scope="col">Status</th>
</tr>
</thead>
<tbody>

<?php
$sql = "SELECT * FROM `emp_leave_request`";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
  if($row['Email_id'] == $_SESSION['Email_id']){
echo "    <tr>
<th scope='row'>".$row['sr_no']."</th>
<td >".$row['Email_id']."</td>
<td >".$row['leave_type']."</td>
<td >".$row['from_date']."</td>
<td >".$row['to_date']."</td>
<td >".$row['description']."</td>
<td >".$row['postiing_date']."</td>
<td >".$row['admin_remark']."</td>

<td >".$row['status']."  </td>
</tr>";
}
}



?>




</tbody>
</table>


</div>
    




<!-- edit modals -->

<div class="modal fade " id="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editmodal">Make a Leave request</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

      
        <input type="hidden" name='snoEdit' id='snoEdit'>
        <!-- <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Sr_no</label>
          <input type="int" class="form-control" id="sr_no" aria-describedby="emailHelp" name="sr_no">

        </div> -->
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Leave_type</label>
          <input type="text" class="form-control" id="leave_type" aria-describedby="emailHelp" name="leave_type">
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">From Date</label>
          <input type="date" class="form-control" id="from_date" aria-describedby="emailHelp" name="from_date">

        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">To Date</label>
          <input type="date" class="form-control" id="to_date" aria-describedby="emailHelp" name="to_date">

        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" maxlength="50">Description</label>
          
          <textarea name="description"  cols="3" rows="10"  class="form-control" id="description" aria-describedby="emailHelp" ></textarea>
        </div>

        

        </div>
        <div class="mb-3 form-check">


        </div>
        
        <button type="submit" class="btn btn-danger">Make leave</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="editnote" name="editnote" >Save changes</button>
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
    
    Leave_type = tr.getElementsByTagName("td")[1].innerText;
    from_data = tr.getElementsByTagName("td")[2].innerText;
    to_data = tr.getElementsByTagName("td")[3].innerText;
    desc = tr.getElementsByTagName("td")[4].innerText;
    console.log(desc);
    snoEdit.value = e.target.getAttribute("data-srno"); // Set snoEdit field value
    // sr_no.value = sr_no;
    leave_type.value = Leave_type;
    from_date.value = from_data;
    to_date.value = to_data;
    description.value = desc;

    $('#editmodal').modal('toggle');

  });
});


</script>





  </body>
</html>