<?php 
include 'misc/S_header.php';

  $updates = new UsersView();

  $showUpdate = $updates->displayRecordById($editId);

  $addClient = new AdminController();
  $show = $addClient->action();
    
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
        <li class="breadcrumb-item"><a href="S_Index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Client</li>
      </ol>
    </nav>
  </div> 

  <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?php echo $_SESSION['msg'] ?> text-center">
                <?php
                echo ($_SESSION['message']);
                unset($_SESSION['message']);
            } ?>
   </div>

<div class="col-xl-12">
  <div class="card shadow mb-4">
    <div class="card-body ">
      <div class="text-xl font-weight-bold text-primary text-uppercase text-center mb-1"> 
        <h5 class="font-weight-bold" >add new Client</h5> 
      </div>
      <hr>
     <h6 class="text text-uppercase py-2"> Personal Information: </h6>
      <form action="" method="POST">   

        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="fName">First Name:</label>
            <input class="form-control" type="text" name="firstName" id="fName" placeholder="Enter First Name" required> 
          </div>
          <div class="form-group col-md-3">
            <label for="mName">Middle Name:</label>
            <input class="form-control" type="text" name="middleName" id="mName" placeholder="Enter Middle  Name" required> 
          </div>
          <div class="form-group col-md-3">
            <label for="lName">Last Name:</label>
            <input class="form-control" type="text" name="lastName" id="lName" placeholder="Enter Last Name" required> 
          </div>
          <div class="form-group col-md-3">
            <label for="Suffix">Suffix:</label>
            <input class="form-control" type="text" name="suffix" id="Suffix" placeholder="Enter Suffix">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="Age">BirthDate:</label>
            <input class="form-control" type="date" name="birthDate" id="Age" placeholder="Enter Age" required>
          </div>
          <div class="form-group col-md-4">
            <label for="Age">Age:</label>
            <input class="form-control" type="text" name="age" id="Age" placeholder="Enter Age" required>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState"> Gender: </label>
            <select id="inputState" class="form-control" name="gender">
              <option disabled selected> --Select-- </option>
              <option value="M"> Male </option>
              <option value="F"> Female </option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="birthPlace">Birthplace:</label>
            <input class="form-control" type="text" name="birthPlace" id="birthPlace" 
            placeholder="Enter Birthplace" required>
          </div>
          <div class="form-group col-md-4">
            <label for="ContactNumber">Contact Number:</label>
            <input class="form-control" type="text" name="contactNum" id="ContactNumber" 
            placeholder="Enter Contact Number" required>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState"> Civil Status: </label>
            <select id="inputState" class="form-control" name="civilStatus">
            <option disabled selected> --Select-- </option>
              <option value="Single"> Single </option>
              <option value="Married"> Married </option>
              <option value="Widowed"> Widowed </option>
              <option value="Separated"> Separated </option>
            </select>
          </div>
        </div>

      <hr>
        <h6 class="text text-uppercase py-2"> Address: </h6>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="Street">Street:</label>
            <input class="form-control" type="text" name="street" id="Username" placeholder="Enter Street" required>
          </div>
          <div class="form-group col-md-3">
            <label for="inputState"> Barangay: </label>
            <select id="inputState" class="form-control"  name="brgy">
            <option disabled selected> --Select-- </option>
              <option value="Binuangan">Binuangan</option>
              <option value="Catanghalan">Catanghalan</option>
              <option value="Hulo">Hulo</option>
              <option value="Lawa">Lawa</option>
              <option value="Salambao">Salambao</option>
              <option value="Paco">Paco</option>
              <option value="Pag-Asa">Pag-Asa</option>
              <option value="Paliwas">Paliwas</option>
              <option value="Panghulo">Panghulo</option>
              <option value="San Pascual">San Pascual</option>
              <option value="Tawiran">Tawiran</option>
        
            </select>
          </div>
          
          <div class="form-group col-md-3">
            <label for="City">City</label>
            <input class="form-control" type="text" name="city" id="password" placeholder="Enter City" required>
          </div>

          <div class="form-group col-md-3">
            <label for="Province">Province:</label>
            <input class="form-control" type="text" name="province" id="Username" placeholder="Enter Province" required>
          </div>

        </div>

      <hr>
        <h6 class="text text-uppercase py-2"> Additional Information: </h6>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="MonthlyIncome">Monthly Income:</label>
            <input class="form-control" type="text" name="monthlyIncome" id="monthlyIncome" 
            placeholder="0.00" required>
          </div>

          <div class="form-group col-md-3">
            <label for="Educational Attainment">Educational Attainment:</label>
            <input class="form-control" type="text" name="clientEducation" id="clientEducation" 
            placeholder="Educational Attainment" required>
          </div>

          <div class="form-group col-md-3">
            <label for="MonthlyIncome">Occupation:</label>
            <input class="form-control" type="text" name="clientOccupation" id="clientOccupation" 
            placeholder="Occupation" required>
          </div>

          <div class="form-group col-md-3">
            <label for="religion">Religion:</label>
            <input class="form-control" type="text" name="religion" id="religion" 
            placeholder="Religion" required>
          </div>
         
          <div class="form-group col-md-2">
            <label for="inputState"> No. of Children: </label>
            <select id="inputState" class="form-control" name="numofChildren">
              <option disabled selected> --Select-- </option>
              <option value="0"> 0 </option>
              <option value="1"> 1 </option>
              <option value="2"> 2 </option>
              <option value="3"> 3 </option>
              <option value="4"> 4 </option>
              <option value="5"> 5 </option>
              <option value="6"> 6 </option>
              <option value="7"> 7 </option>
              <option value="8"> 8 </option>
              <option value="9"> 9 </option>
              <option value="10"> 10 </option>
              <option value="11"> 11 </option>
              <option value="12"> 12 </option>
              <option value="13"> 13 </option>
              <option value="14"> 14 </option>
              <option value="15"> 15 </option>
              <option value="16"> 16 </option>
              <option value="17"> 17 </option>
              <option value="18"> 18 </option>
              <option value="19"> 19 </option>
              <option value="20"> 20 </option>
            </select>
          </div>

          <div class="form-group col-md-2">
            <label for="inputState"> Solo Parent: </label>
            <select id="inputState" class="form-control" name="soloParent">
            <option disabled selected> --Select-- </option>
              <option value="Yes"> Yes </option>
              <option value="No"> No </option>
            </select>
          </div>            
 
        

       
          <div class="form-group col-md-2">
            <label for="inputState"> Senior: </label>
            <select id="inputState" class="form-control" name="senior">
            <option disabled selected> --Select-- </option>
              <option selected value="Yes"> Yes </option>
              <option value="No"> No </option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputState"> PWD: </label>
            <select id="inputState" class="form-control" name="pwd">
            <option disabled selected> --Select-- </option>
              <option selected value="Yes"> Yes </option>
              <option value="No"> No </option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputState"> Youth: </label>
            <select id="inputState" class="form-control" name="youth">
            <option disabled selected> --Select-- </option>
              <option selected value="Yes"> Yes </option>
              <option value="No"> No </option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputState"> 4P's: </label>
            <select id="inputState" class="form-control" name="4pc">
            <option disabled selected> --Select-- </option>
              <option selected value="Yes"> Yes </option>
              <option value="No"> No </option>
            </select>
          </div>
        </div>
        
      <hr>
      <div class="d-flex justify-content-center">
        <button type="submit" name="S_addClient" class="btn btn-outline-primary  btn-lg align-center px-5 "> <i class="fa fa-user-plus" aria-hidden="true"> Add Users </i> </button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php include("misc/footer.html") ?>

