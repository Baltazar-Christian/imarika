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
        <?php 
        
        if ($_SESSION['role']=='1') {
        include 'include/adminnav.php'; 
        }
        else{
            include 'include/staffnav.php'; 
        }
        
        ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-2">
                        <ol class="breadcrumb mb-4 text-right">
                            <li class="breadcrumb-item active"><i class="fa fa-users"></i> Manage Customers/Register Customer</li>
                        </ol>
                
                        <div class="card mb-4">
                            <div class="card-header bg-dark text-secondary">
                                <i class="fas fa-user-tie me-1"></i>
                                Register Customer
                            </div>
                            <div class="card-body">
                            <form method="post" action="config/addcustomer.php">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="fname" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="mname" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Middle name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="lname" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Last name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="nin" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">NIN</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="pnumber" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Phonenumber</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="email" id="inputFirstName" type="email" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Email</label>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="address" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Address</label>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-6">
                                                    <div class="">
                                                        <select name="sex" class="form-control">  
                                                            <option value="Male">Male </option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                         
    
    
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button type="submit" name="save" class="btn btn-outline-primary btn-block"><i class="fa fa-save"></i> Save Customer</button>
                                                    
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
