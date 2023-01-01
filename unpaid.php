<!-- This is the page that views all loans that have not been paid off -->
<?php
  session_start();
  include 'config/connection.php';
  if ($_SESSION['id']=='') {
    header('Location:index.php');
  }
  else{
   
    $sql1="SELECT * FROM loan,customer 
    WHERE loan.loan_status='Unpaid'
    AND customer.cust_id=loan.customer
    ORDER BY loan.issued_date DESC";
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
                            <li class="breadcrumb-item active"><i class="fa fa-file"></i> Manage Loans/Active Loans</li>
                        </ol>
                     
                        
                        <div class="card mb-4">
                            <div class="card-header bg-dark text-secondary">
                                <i class="fas fa-file me-1"></i>
                                 Unpaid Loans
                            </div>
                            <div class="card-body">
                           <?php     
                            if (mysqli_num_rows($qry1) == 0){

                                ?>
                                <h4 class="text-danger text-center">Sorry, there are no active loans currently !</h4>

                                <?php
                            }
                            else{ ?>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Customer</th>
                                            <th>Return Date</th>
                                            <th>Amount</th>
                                            <th>Paid </th>
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
                                <h6> <?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']; ?></h6> 
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
                                <div class="text-center">
                                  <a class="bg-primary p-1 text-light btn btn-sm" href="payment.php?id=<?php echo $row['loan_id'];?>">Payment</a>
                                 
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
