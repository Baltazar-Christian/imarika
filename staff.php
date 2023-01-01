<!-- This is staff's home page -->
<?php
  session_start();
  include 'config/connection.php';
  if ($_SESSION['role']!='2') {
    header('Location:index.php');
  }
  else{
    $id=$_SESSION['id'];
     include 'include/header.php'; ?>
        <div id="layoutSidenav">
        <?php include 'include/staffnav.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4">Dashboard</h5>
                        <hr>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <?php
                                    $sql1="SELECT * FROM customer";
                                    $qry1=mysqli_query($conn,$sql1);
                                    $customers=mysqli_num_rows($qry1);
                                ?>
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Customers</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link nav-link" href="#"><?php echo $customers; ?></a>
                                        <div class="small text-white"><i class="fas fa-users"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <?php
                                    $sql1="SELECT * FROM payment WHERE staff='$id'";
                                    $qry1=mysqli_query($conn,$sql1);
                                    $staff=mysqli_num_rows($qry1);
                                ?>
                                <div class="card bg-warning text-dark mb-4">
                                    <div class="card-body">Received Payments</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-dark stretched-link nav-link" href="#"><?php echo $staff; ?></a>
                                        <div class="small text-dark"><i class="fas fa-download"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <?php
                                    $sql1="SELECT * FROM loan  WHERE loan_status='Unpaid'";
                                    $qry1=mysqli_query($conn,$sql1);
                                    $loans=mysqli_num_rows($qry1);
                                ?>
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Active Loans</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link nav-link" href="#"><?php echo $loans; ?></a>
                                        <div class="small text-white"><i class="fas fa-file"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <!-- <?php
                                    $sql1="SELECT * FROM loan_request WHERE staff='$id' AND req_status='Declined'";
                                    $qry1=mysqli_query($conn,$sql1);
                                    $declined=mysqli_num_rows($qry1);
                                ?> -->
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Declined Loans</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link nav-link" href="#"><?php echo $declined; ?></a>
                                        <div class="small text-white"><i class="fas fa-trash"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
               
                  
                    </div>
                </main>
                <?php include 'include/footer.php';
                
  }
                ?>

