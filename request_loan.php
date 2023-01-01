<!-- This is the page for issuing customer a loan -->
<?php
  session_start();
  include 'config/connection.php';
  if ($_SESSION['id']=='') {
    header('Location:index.php');
  }
  else{
   
    $customer=$_GET['id'];
    $sql1="SELECT * FROM loan WHERE customer='$customer'AND loan_status='Unpaid'";
    $qry1=mysqli_query($conn,$sql1);
    
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
                            <li class="breadcrumb-item active"><i class="fa fa-users"></i> Manage Customers/Issue Loan</li>
                        </ol>
                        <?php
                            if (isset($_GET["requested"])){
                                ?>
                                <p class="alert alert-success">Loan is Successfully requested wait for approval ! <a href="allcustomers.php" class="text-light "><i class="fa fa-trash float-end text-success"></i></a> </p>
                                <?php     
                                 }
                        

                                 ?>
                        <div class="card mb-4">
                            <div class="card-header bg-dark text-secondary">
                                <i class="fas fa-file me-1"></i>
                                Issue Loan
                            </div>
                            <div class="card-body">
                            <?php

                            if (mysqli_num_rows($qry1) == 0){

                                $sql="SELECT * FROM customer 
                                WHERE cust_id='$customer'";
                                $qry=mysqli_query($conn,$sql);
                                $row=mysqli_fetch_array($qry);
                                $sql1="SELECT * FROM loan_request,customer 
                                WHERE loan_request.req_status='Pending'
                                AND customer.cust_id='$customer'
                                AND loan_request.customer='$customer'";
                                $qry1=mysqli_query($conn,$sql1);
                                if (mysqli_num_rows($qry1) == 0){
                            ?>
                         
                            <form method="post" action="config/loan_request.php">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                <h5>Customer: <?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']; ?></h5>
                                <input type="text" name="customer" value="<?php echo $row['cust_id']; ?>" hidden> 
                                <input type="text" name="staff" value="<?php echo $_SESSION['id']; ?>" hidden>
                                </div>   
                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="return_date" id="inputFirstName" type="date" placeholder="Enter your first name" required />
                                                        <label for="inputFirstName">Return Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="amount" id="inputLastName" type="text" placeholder="Enter your last name" required />
                                                        <label for="inputLastName">Amount(Tsh)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="referee" id="inputFirstName" type="text" placeholder="Enter your first name" required />
                                                        <label for="inputFirstName">Referee Names</label>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <textarea name="reason" id="" class="form-control" rows="15" required></textarea>
                                                        <label for="inputFirstName">Reasons For Loan</label>
                                                    </div>
                                                </div>
                                                
                                               
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <textarea name="bound" id="" class="form-control" rows="15" required></textarea>
                                                        <label for="inputFirstName">Bound For Loan</label>
                                                    </div>
                                                </div>
                                                
                                               
                                            </div>
                                       
                                         
    
    
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button type="submit" name="issue" class="btn btn-outline-primary btn-block"><i class="fa fa-download"></i> Issue Loan</button>
                                                    
                                                </div>
                                            </div>
                                        </form>

                                        <?php

                            }else{
                                ?>
                                <h4 class="text-primary text-center">Customer's loan is on process !</h4>
                                <?php
                            }
                        
                        }


                            else{
                            ?>   
                                                          <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Issued Date</th>
                                            <th>Return Date</th>
                                            <th>Issued Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                               
                                   <tbody>
                                <?php
                                for ($i=1; $i<=mysqli_num_rows($qry1); $i++){
                                $row = mysqli_fetch_array($qry1);
                           
                                 ?>
                                 <tr>
                                 <td>
                                <?php echo $i; ?></td>
                                <td>
                                <h6><?php echo $row['issued_date']; ?></h6> 
                                </td>
                                <td>
                                <h6><?php echo $row['pay_date']; ?></h6>
                                
                                </td>
                                <td>
                                <h6><?php echo $row['issued_amount']; ?> </h6>
                                
                                </td>
                                <td>
                                <h6><?php echo $row['paid_amount']; ?> </h6>
                                
                                </td>
                                <td>
                                <h6 class="text-danger"><?php echo $row['loan_status']; ?> </h6>
                                
                                </td>
                                <td>
                                <div class="text-center">
                                <a class="bg-primary p-1 text-light btn btn-sm" href="payment.php?id=<?php echo $row['loan_id'];?>">Payment</a>
                                  </div>
                                </td>
                                 </tr>

                                   <?php 
                                    }
                                }
                                    ?>
                                   </tbody>
                                </table>
                        </div>
                        </div>
                    </div>
                </main>
                <?php include 'include/footer.php'; 
                
                
                
  }
  ?>
