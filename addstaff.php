<!-- This is the page for adding a new staff -->
<?php
  session_start();
  include 'config/connection.php';
  if ($_SESSION['id']=='') {
    header('Location:index.php');
  }
  else{
       include 'include/header.php'; ?>
        <div id="layoutSidenav">
        <?php include 'include/adminnav.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-2">
                        <ol class="breadcrumb mb-4 text-right">
                            <li class="breadcrumb-item active"><i class="fa fa-user-tie"></i> Manage Staffs/Add Staff</li>
                        </ol>
                      
                        
                        <div class="card mb-4">
                            <div class="card-header bg-dark text-secondary">
                                <i class="fas fa-user-tie me-1"></i>
                                Add Staff
                            </div>
                            <div class="card-body">
                            <form method="post" action="config/addstaff.php">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="fname" id="inputFirstName" type="text" required />
                                                        <label for="inputFirstName">First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="mname" id="inputLastName" type="text" required />
                                                        <label for="inputLastName">Middle name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="lname" id="inputFirstName" type="text" required />
                                                        <label for="inputFirstName">Last name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="email" id="inputLastName" type="email" required />
                                                        <label for="inputLastName">Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="pnumber" id="inputFirstName" type="text" required />
                                                        <label for="inputFirstName">Phonenumber</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="">
                                                        <select name="role" class="form-control">
                                                           
                                                            <option value="2">Normal Staff </option>
                                                            <option value="1">Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-outline-primary btn-block" name="save"><i class="fa fa-save"></i> Save Staff</button>
                                                 
                                                </div>
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include 'include/footer.php'; 
  }
                ?>
