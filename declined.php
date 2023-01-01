<!-- This is the page for declined loan requests -->
<?php
  session_start();
  include 'config/connection.php';
  if ($_SESSION['id']=='') {
    header('Location:index.php');
  }
  else{
   
    $sql1="SELECT * FROM loan_request,customer 
    WHERE loan_request.req_status='Declined'
    AND customer.cust_id=loan_request.customer";
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
                            <li class="breadcrumb-item active"><i class="fa fa-file"></i> Manage Loans/Declined Loan Requests</li>
                        </ol>
                     
                        <?php
                            if (isset($_GET["declined"])){
                                ?>
                                <p class="alert alert-success">Loan Request Has Successfully Been Declined ! <a href="declined.php" class="text-light "><i class="fa fa-trash float-end text-success"></i></a> </p>
                                <?php     
                                 }
                            if (isset($_GET["deleted"])){
                                ?>
                                <p class="alert alert-danger">Loan Request Has Been Deleted Permanetly ! <a href="declined.php" class="text-light "><i class="fa fa-trash float-end text-danger"></i></a></p>
                                <?php     
                                }

                                 ?>
                        <div class="card mb-4">
                            <div class="card-header bg-dark text-secondary">
                                <i class="fas fa-trash me-1"></i>
                                Declined Loans
                            </div>
                            <div class="card-body">

                            <?php

                            if (mysqli_num_rows($qry1) == 0){

                            ?>

                            <h4 class="text-danger text-center">Sorry,there are no loan requests that have been Declined !</h4>
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
                                            <?php 
        
                                            if ($_SESSION['role']=='1') { ?>
                                            <th>Action</th>
                                            <?php } ?>
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
                                <?php 
        
                                if ($_SESSION['role']=='1') { ?>
                                <td>
                                <div class="text-center">
                                  <a class="bg-primary p-1 text-light btn btn-block btn-sm" href="config/accept_loan.php?id=<?php echo $row['req_id'];?>">Accept</a>
                                  <a class="bg-danger p-1 text-light btn btn-block btn-sm" href="config/delete_request.php?id=<?php echo $row['req_id'];?>">Delete</a>
                               
                                  </div>
                                </td>
                                <?php } ?>
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
