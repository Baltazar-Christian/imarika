<!-- This is the page that views all loans that need to be approved -->
<?php
  session_start();
  include 'config/connection.php';
  if ($_SESSION['id']=='') {
    header('Location:index.php');
  }
  else{
   
    $sql1="SELECT * FROM loan_request,customer 
    WHERE loan_request.req_status='Pending'
    AND customer.cust_id=loan_request.customer
    ORDER BY loan_request.req_date DESC";
    $qry1=mysqli_query($conn,$sql1);
    
    include 'include/header.php'; ?>
        <div id="layoutSidenav">
        <?php include 'include/adminnav.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-2">
                        <ol class="breadcrumb mb-4 text-right">
                            <li class="breadcrumb-item active"><i class="fa fa-file"></i> Manage Loans/Approve Loans</li>
                        </ol>
                     
                        
                        <div class="card mb-4">
                            <div class="card-header bg-dark text-secondary">
                                <i class="fas fa-file me-1"></i>
                                Pending Loan Requests
                            </div>
                            <div class="card-body">

                            <?php

                            if (mysqli_num_rows($qry1) == 0){

                            ?>

                            <h4 class="text-danger text-center">Sorry,there are no loans to Approve !</h4>
                            <?php 

                            }else{
                                ?>
                                
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Date</th>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Reason</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                            
                                   <tbody>
                                   <?php
                                for ($i=1; $i<=mysqli_num_rows($qry1); $i++){
                                $row = mysqli_fetch_array($qry1);
                           
                                 ?>
                                 <tr>
                                 <td>
                                <?php echo $i; ?>
                                </td>
                                <td>
                                <h6><?php echo $row['req_date']; ?></h6>
                                
                                </td>
                                <td>
                                <h6><?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']; ?></h6>
                                </td>
                                <td>
                                <h6><?php echo $row['amount']; ?> </h6>
                                
                                </td>
                               
                                <td>
                                <h6><?php echo $row['reason']; ?> </h6>
                                
                                </td>
                                <td>
                                <div class="text-center">
                                  <a class="bg-primary p-1 text-light btn btn-sm" href="config/accept_loan.php?id=<?php echo $row['req_id'];?>">Accept</a>
                                  <a class="bg-danger text-light p-1 btn btn-sm" href="config/decline_loan.php?id=<?php echo $row['req_id'];?>"><i>Decline</i></a>
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
