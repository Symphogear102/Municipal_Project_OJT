<?php 
include 'misc/header.php';

  $updates = new UsersView();

  $showUpdate = $updates->displayRecordById($editId);

  $updateProfile = new AdminController();
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
          timer: 3000,
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
        <li class="breadcrumb-item"><a href="A_Index.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
      </ol>
    </nav>

    <div class="row gutters-sm">
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <img src="img/<?php echo $showUpdate['userImage']; ?>" alt="Admin" class="rounded-circle shadow-4-strong " width="180px" height="180px">
            </div>
            <div class="mt-4 text-center">
                <h4><?php echo $showUpdate['userFirst']; ?> <?php echo $showUpdate['userMid']; ?> <?php echo $showUpdate['userLast']; ?></h4>
                  <p> Position:  Admin</p>
                 
                  <button type="submit" class="btn btn-outline-primary px-5" data-toggle="modal" data-target="#modalImg">Change Profile Picture</button>
              </div>
          </div>
        </div>
      </div>
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?php echo $_SESSION['msg'] ?> text-center">
      <?php
      echo ($_SESSION['message']);
      unset($_SESSION['message']);
    } ?>
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              <?php echo $showUpdate['userFirst']; ?> <?php echo $showUpdate['userMid']; ?> <?php echo $showUpdate['userLast']; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              <?php echo $showUpdate['userName']; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Birthdate</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              <?php echo $showUpdate['userBirthDate']; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Mobile</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              <?php echo $showUpdate['userContact']; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Age</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              <?php echo $showUpdate['userAge']; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex justify-content-center">
                  <button type="button" class="btn btn-dark px-5" data-toggle="modal" data-target="#exampleModalCenter"> Edit information </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



<!-- User Profile Img Modal -->
<div class="modal fade" id="modalImg" tabindex="-1" role="dialog" aria-labelledby="modalImgLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="d-flex flex-column align-items-center text-center">
          <img src="img/<?php echo $showUpdate['userImage']; ?>" alt="Admin" class="rounded-circle" width="150">
        </div>
        <div class="mt-4 text-center">
          <h4><?php echo $showUpdate['userFirst']; ?> <?php echo $showUpdate['userMid']; ?> <?php echo $showUpdate['userLast']; ?></h4>
            <p> Position:  Admin</p>
            <form action="" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="id" value="<?php echo $showUpdate['userCode']; ?>">
            <input type="file" name="image">
          
        </div>
        <div class="d-flex justify-content-center my-3">
          <button type="submit" name="UploadImage" value="Upload Image" class="btn btn-primary px-5">Submit Changes</button>
        </div>
          </form>
      </div>
      
    </div>
  </div>
</div>


<!-- User Info Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile Information!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">

          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="hidden" class="form-control" aria-describedby="emailHelp" name="id" value="<?php echo $showUpdate['userCode']; ?>">
            <input type="text" class="form-control"  aria-describedby="emailHelp" name="userFirst" placeholder="First Name" value="<?php echo $showUpdate['userFirst']; ?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Middle Name</label>
            <input type="text" class="form-control" name="userMid" placeholder="Middle Name"value="<?php echo $showUpdate['userMid']; ?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Last Name</label>
            <input type="text" class="form-control"  name="userLast" placeholder="Last Name" value="<?php echo $showUpdate['userLast']; ?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" class="form-control" name="userName" placeholder="Enter email" value="<?php echo $showUpdate['userName']; ?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Birthdate</label>
            <input type="date" class="form-control" name="userBirthDate" placeholder="Birthdate" value="<?php echo $showUpdate['userBirthDate']; ?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mobile Number</label>
            <input type="text" class="form-control" name="userContact" placeholder="Contact" value="<?php echo $showUpdate['userContact']; ?>" required>
          </div>
        <div class="d-flex justify-content-center">
          <button type="submit" name="update" class="btn btn-dark px-5 my-2">Save changes</button>
        </div>
      </div>
        
      </form>
    </div>
  </div>
</div>

<?php include("misc/footer.html") ?>

