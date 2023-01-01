<!-- This is the admin dashboard -->
<?php
  session_start();
  include 'config/connection.php';
  if ($_SESSION['role']!='1') {
    header('Location:index.php');
  }
  else{
    $id=$_SESSION['id'];
    $sql="SELECT * FROM user WHERE id='$id'";
    $qry=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($qry);
    include 'include/header.php'; ?>

        <div id="layoutSidenav">
        <?php include 'include/adminnav.php'; ?>
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
                                    $sql1="SELECT * FROM user WHERE id!='$id'";
                                    $qry1=mysqli_query($conn,$sql1);
                                    $staff=mysqli_num_rows($qry1);
                                ?>
                                <div class="card bg-warning text-dark mb-4">
                                    <div class="card-body">Total Staffs</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-dark stretched-link nav-link" href="#"><?php echo $staff; ?></a>
                                        <div class="small text-dark"><i class="fas fa-user-tie"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <?php
                             
                                $sql="SELECT SUM(issued_amount) FROM loan ";
                                $qry=mysqli_query($conn,$sql);
                                $res=mysqli_fetch_array($qry);

                                ?>
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Issued Loans</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-dark stretched-link nav-link" href="#">
                                        <?php echo $res['SUM(issued_amount)'].' Tsh'; 
                                        if ($res['SUM(issued_amount)']=='') {
                                            echo '00';
                                        }
                                        ?>    
                                        </a>
                                        <div class="small text-white"><i class="fas fa-file"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <?php
                             
                             $sql="SELECT SUM(amount) FROM payment ";
                             $qry=mysqli_query($conn,$sql);
                             $res=mysqli_fetch_array($qry);

                             ?>
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Total Payments</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link nav-link" href="#">
                                        <?php echo $res['SUM(amount)'].' Tsh '; 
                                        if ($res['SUM(amount)']=='') {
                                            echo '00';
                                        }
                                        ?>
                                        </a>
                                        <div class="small text-white"><i class="fas fa-download"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                  
                    </div>
                </main>
                <?php include 'include/footer.php'; 
                
                
  }?>

