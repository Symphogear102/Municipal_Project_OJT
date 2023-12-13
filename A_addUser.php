<?php 
include 'misc/header.php';

  $updates = new UsersView();

  $showUpdate = $updates->displayRecordById($editId);

  $updateProfile = new ShitController();
  $show = $updateProfile->action();
    
?>
  <!-- Sweet Alert  -->
  <?php if (isset($_SESSION['message'])) { ?>
    <script>
      swal({
          title: "<?php echo $_SESSION['title'] ?>",
          text: "<?php echo $_SESSION['message'] ?>",
          icon: "<?php echo $_SESSION['msg'] ?>",
          button: "OK!",
          timer: 4000,
      });
    </script>
  <?php
  unset($_SESSION['message']);
    } 
  ?>
  <!-- Sweet Alert End --> 

  <div class="col-xl-12 col-lg-6">    
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="A_Index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Staff</li>
      </ol>
    </nav>
  </div> 

<div class="col-xl-12">
  <div class="card shadow mb-4">
    <div class="card-body ">
        <div class="text-xl font-weight-bold text-primary text-uppercase text-center mb-1"> <h5 class="font-weight-bold" >add new User!</h5> </div>
      <hr>
      <form action="" method="POST">   

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="fName">First Name:</label>
            <input class="form-control" type="text" name="userFirst" id="fName" placeholder="Enter First Name" required> 
          </div>
          <div class="form-group col-md-4">
            <label for="mName">Middle Name:</label>
            <input class="form-control" type="text" name="userMid" id="mName" placeholder="Enter Middle  Name" required> 
          </div>
          <div class="form-group col-md-4">
            <label for="lName">Last Name:</label>
            <input class="form-control" type="text" name="userLast" id="lName" placeholder="Enter Last Name" required> 
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="BirthDate">BirthDate:</label>
            <input class="form-control" type="date" name="userBirthDate" id="BirthDate" placeholder="Enter Birthdate" required>
          </div>
          <div class="form-group col-md-6">
            <label for="Age">Age:</label>
            <input class="form-control" type="text" name="userAge" id="Age" placeholder="Enter Age" required>
          </div>
        </div>
       
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="ContactNumber">Contact Number:</label>
            <input class="form-control" type="text" name="userContact" id="ContactNumber" 
            placeholder="Contact Number" required>
          </div>
          <div class="form-group col-md-3">
            <label for="staffPosition">Position:</label>
            <input class="form-control" type="text" name="staffPosition" id="staffPosition" 
            placeholder="Enter Staff Position" required>
          </div>
          <div class="form-group col-md-3">
            <label for="inputState"> User Level: </label>
            <select id="inputState" class="form-control" name="userTypeCode">
              <option selected value="1"> Staff </option>
              <option value="2"> Admin </option>
            </select>
          </div>          
          <div class="form-group col-md-3">
            <label for="inputState"> Gender: </label>
            <select id="inputState" class="form-control" name="userGender">
              <option disabled selected> --Select-- </option>
              <option value="M"> Male </option>
              <option value="F"> Female </option>
            </select>
          </div>
        </div>
          <hr>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="Username">Username:</label>
            <input class="form-control" type="text" name="userName" id="Username" placeholder="Enter Username" required>
          </div>
          <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="userPass" id="password" placeholder="Enter Password" required>
          </div>
        </div>
          <hr>
        <div class="d-flex justify-content-center">
          <button type="submit" name="addUser" class="btn btn-primary text-center px-5 my-3"> <i class="fa fa-user-plus" aria-hidden="true"> Add User </i> </button>
        </div>
      </form>
    </div>
  </div>
</div>

  <?php include("misc/footer.html") ?>

