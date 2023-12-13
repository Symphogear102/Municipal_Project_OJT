<?php 
include 'misc/S_header.php';

  $display = new StaffView();
  $editId = $_GET['editId'];
  $showDisplay = $display->showClientInfo($editId);
  $showFamilityData = $display->getClientFamilityData($editId);

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
        <li class="breadcrumb-item"><a href="S_Index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Client</li>
      </ol>
    </nav>
  </div> 

<section id="Users">
    <div class="col-xl-12">
        <div class="card shadow mb-4">
            <div class="card-body ">
            <div class="text-xl font-weight-bold text-primary text-uppercase text-center mb-1"> 
                <h5 class="font-weight-bold" >Update Client Info</h5> 
            </div>
            <hr>
            <h6 class="text text-uppercase py-2"> Personal Information: </h6>
            <form action="" method="POST">   

                <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="fName">First Name:</label>
                    <input class="form-control" type="hidden" name="id"  value="<?php echo $showDisplay['clientCode'] ?>" required> 
                    <input class="form-control" type="text" name="firstName"  value="<?php echo $showDisplay['firstName'] ?>" placeholder="Enter First Name" required> 
                </div>
                <div class="form-group col-md-3">
                    <label for="mName">Middle Name:</label>
                    <input class="form-control" type="text" name="middleName"  value="<?php echo $showDisplay['middleName'] ?>" placeholder="Enter Middle  Name" required> 
                </div>
                <div class="form-group col-md-3">
                    <label for="lName">Last Name:</label>
                    <input class="form-control" type="text" name="lastName" value="<?php echo $showDisplay['lastName'] ?>" placeholder="Enter Last Name" required> 
                </div>
                <div class="form-group col-md-3">
                    <label for="Suffix">Suffix:</label>
                    <input class="form-control" type="text" name="suffix" value="<?php echo $showDisplay['suffix'] ?>" placeholder="Enter Suffix" >
                </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Age">BirthDate:</label>
                    <input class="form-control" type="date" name="birthDate" value="<?php echo $showDisplay['birthDate'] ?>" placeholder="Enter BirthDate" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="Age">Age:</label>
                    <input class="form-control" type="text" name="age" value="<?php echo $showDisplay['age'] ?>" placeholder="Enter Age" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState"> Gender: </label>
                    <select id="inputState" class="form-control" name="gender" required>

                    <option value="M"> Male </option>
                    <option value="F"> Female </option>
                    </select>
                </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="birthPlace">Birthplace:</label>
                    <input class="form-control" type="text" name="birthPlace" value="<?php echo $showDisplay['birthPlace'] ?>" id="birthPlace"  placeholder="Enter Birthplace" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="ContactNumber">Contact Number:</label>
                    <input class="form-control" type="text" name="contactNum" id="ContactNumber" 
                    value="<?php echo $showDisplay['contactNum'] ?>" placeholder="Enter Contact Number"  required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState"> Civil Status: </label>
                    <select id="inputState" class="form-control" name="civilStatus" required>

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
                    <input class="form-control" type="text" name="street" value="<?php echo $showDisplay['street'] ?>" placeholder="Enter Street" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState"> Barangay: </label>
                    <select id="inputState" class="form-control"  name="brgy" required>

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
                    <input class="form-control" type="text" name="city" value="<?php echo $showDisplay['city'] ?>"  placeholder="Enter City" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="Province">Province:</label>
                    <input class="form-control" type="text" name="province" value="<?php echo $showDisplay['province'] ?>" placeholder="Enter Province" required>
                </div>

                </div>

            <hr>
                <h6 class="text text-uppercase py-2"> Additional Information: </h6>
                <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="MonthlyIncome">Monthly Income:</label>
                    <input class="form-control" type="text" name="monthlyIncome" value="<?php echo $showDisplay['monthlyIncome'] ?>" placeholder="0.00" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="MonthlyIncome">Occupation:</label>
                    <input class="form-control" type="text" name="clientOccupation" value="<?php echo $showDisplay['clientOccupation'] ?>" placeholder="Occupation" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="religion">Religion:</label>
                    <input class="form-control" type="text" name="religion" value="<?php echo $showDisplay['religion'] ?>" placeholder="religion" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="inputState"> Solo Parent: (<?php echo $showDisplay['soloParent'] ?>) </label>
                    <select id="inputState" class="form-control" name="soloParent" required>

                    <option selected value="Yes"> Yes </option>
                    <option value="No"> No </option>
                    </select>
                </div>  
                
                <div class="form-group col-md-3">
                    <label for="inputState"> No. of Children: (<?php echo $showDisplay['numofChildren'] ?>) </label>
                    <select id="inputState" class="form-control" name="numofChildren" required>

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
                
                </div>

                <div class="form-row">        
                <div class="form-group col-md-3">
                    <label for="inputState"> Senior: (<?php echo $showDisplay['senior'] ?>) </label>
                    <select id="inputState" class="form-control" name="senior" required>

                    <option selected value="Yes"> Yes </option>
                    <option value="No"> No </option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState"> PWD: (<?php echo $showDisplay['pwd'] ?>) </label>
                    <select id="inputState" class="form-control" name="pwd" required>

                    <option selected value="Yes"> Yes </option>
                    <option value="No"> No </option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState"> Youth: (<?php echo $showDisplay['youth'] ?>) </label>
                    <select id="inputState" class="form-control" name="youth" required>

                    <option selected value="Yes"> Yes </option>
                    <option value="No"> No </option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState"> 4P's: (<?php echo $showDisplay['4pc'] ?>) </label>
                    <select id="inputState" class="form-control" name="4pc" required>

                    <option selected value="Yes"> Yes </option>
                    <option value="No"> No </option>
                    </select>
                </div>
                </div>
                
            <hr>
            <div class="d-flex justify-content-center">
            
                <button type="submit" name="updateClientInfoDatas" class="btn btn-outline-primary  btn-lg align-center px-5 "> <i class="fa fa-user-plus" aria-hidden="true"> Update </i> </button>
            </div>
            </form>
            </div>
        </div>
    </div>
</section>

<Section id="Family">
    <div class="col-xl-12 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Family Compositions</h6>
            </div>
            <div class="card-body ">
                <!-- Data table -->
                <table id="dtBasicExample" class="table table-bordered table-hover dt-responsive text-center" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Familiy Full Name</th>
                                <th>Age</th>
                                <th>Civil Status</th>
                                <th>RelationShip</th>
                                <th>Education</th>
                                <th>Occupation</th>
                                <th>Income</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if ($showFamilityData) {
                                    while ($info = mysqli_fetch_assoc($showFamilityData)) {
                            ?>
                            <tr>
                                <td><?php  echo $info['famName']; ?></td>
                                <td><?php  echo $info['famAge']; ?></td>
                                <td><?php  echo $info['famCivilStatus']; ?></td>
                                <td><?php  echo $info['famRelationship']; ?></td>
                                <td><?php  echo $info['famEducational']; ?></td>
                                <td><?php  echo $info['famOccupation']; ?></td>
                                <td><?php  echo $info['famIncome']; ?></td>
                                <td>
                                  <!-- Button trigger modal -->
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $info['famCode']?>">
                                <i class="fa fa-eye" aria-hidden="true"> View </i> 
                                </button>
                            </td>
                        </tr>
                              <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $info['famCode']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Client's Full Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <!--MODAL TABLE INSERT HERE!!!!!-->
                                <form action="" method="POST">  
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Family Name</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                    <input class="form-control" type="hidden" name="id" value="<?php echo $showDisplay['clientCode']?>" required> 
                                    <input class="form-control" type="hidden" name="famCode"  value="<?php echo $info['famCode']?>" required> 
                                    <input class="form-control" type="text" name="famName"  value="<?php echo $info['famName']?>" required> 
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">  
                                        <h6 class="mb-0">Age</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <input class="form-control" type="number" name="famAge"  value="<?php echo $info['famAge']?>" required> 
                                    </div>
                                </div>
                                    <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Civil Status</h6>
                                    </div>
                                    <div class="form-group col-md-4">
                    <select id="inputState" class="form-control" name="famCivilStatus" required>

                    <option value="Single"> Single </option>
                    <option value="Married"> Married </option>
                    <option value="Widowed"> Widowed </option>
                    <option value="Separated"> Separated </option>
                    </select>
                </div>
                </div>
                                    <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Relationship</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <input class="form-control" type="text" name="famRelationship"  value="<?php echo $info['famRelationship']?>" required> 
                                    </div>
                                </div>
                                    <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Education</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <input class="form-control" type="text" name="famEducational"  value="<?php echo $info['famEducational']?>" required> 
                                    </div>
                                </div>
                                    <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Occupation</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <input class="form-control" type="text" name="famOccupation"  value="<?php echo $info['famOccupation']?>" required> 
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-2">Income</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <input class="form-control" type="number" name="famIncome"  value="<?php echo $info['famIncome']?>" required> 
                                    </div>
                                </div>
                                
                          
                                <div class="modal-footer">

                                    <div class="justify-content-between d-flex"></div>
                                    <button type="submit" class="btn btn-primary mx-4 " name="updateFamilityStatus">Update </i></button>
                                    </form>
                                    <button type="button" class="btn btn-secondary mx-4  " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"> CLOSE </i></button>
       
                                </div>
                                </div>
                            </div>
                            </div>
                        <?php 
                            } 
                                }
                        ?>

                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</section>               

<!-- Data table -->
<script>  
$('table').DataTable();  
</script>

<?php include("misc/footer.html") ?>

