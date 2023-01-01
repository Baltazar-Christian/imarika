<!-- This is the page that views all customers -->
<?php
  session_start();
  include 'config/connection.php';
  if ($_SESSION['id']=='') {
    header('Location:index.php');
  }
  else{
   
    $sql1="SELECT * FROM customer";
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
                            <li class="breadcrumb-item active"><i class="fa fa-users"></i> Manage Customers/All Customers</li>
                        </ol>
                              
                        <?php
                            if (isset($_GET["added"])){
                                ?>
                                <p class="alert alert-success">Customer is Successfully Added ! <a href="allcustomers.php" class="text-light "><i class="fa fa-trash float-end text-success"></i></a> </p>
                                <?php     
                                 }
                            if (isset($_GET["deleted"])){
                                ?>
                                <p class="alert alert-danger">Customer is Successfully Deleted ! <a href="allcustomers.php" class="text-light "><i class="fa fa-trash float-end text-danger"></i></a></p>
                                <?php     
                                }

                                 ?>
                     
                        
                        <div class="card mb-4">
                            <div class="card-header bg-dark text-secondary">
                                <i class="fas fa-users me-1"></i>
                                All Customers
                            </div>
                            <div class="card-body">
                            <?php

                                if (mysqli_num_rows($qry1) == 0){


                                ?>
                                <h4 class="text-center text-danger"> There is no registered customers yet ! </h4>

                                <?php

                                }

                                else{
                                ?>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Full Name</th>
                                            <th>NIN</th>
                                            <th>Phonenumber</th>
                                            <th>Address</th>
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
                                <?php echo $i; ?></td>
                                <td>
                                <h6><?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']; ?></h6> 
                                </td>
                                <td>
                                <h6><?php echo $row['nin']; ?></h6>
                                
                                </td>
                                <td>
                                <h6><?php echo $row['pnumber']; ?> </h6>
                                
                                </td>
                                <td>
                                <h6><?php echo $row['address']; ?> </h6>
                                
                                </td>
                                <td>
                                <div class="text-center">
                                  <a class="bg-primary p-1 text-light btn btn-sm" href="singlecustomer.php?id=<?php echo $row['cust_id'];?>"><i class="fa fa-eye"></i></a>
                                  <?php 
        
                                if ($_SESSION['role']=='1') {
                                ?>
                                  <a class="bg-danger text-light btn btn-sm p-1" href="config/deletecustomer.php?id=<?php echo $row['cust_id'];?>"><i class="fa fa-trash"></i></a>
                                <?php }
                                ?>  
                                
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
