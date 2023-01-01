<!-- This is the page that views all customers -->
<?php
  session_start();
  include 'config/connection.php';
  if ($_SESSION['id']=='') {
    header('Location:index.php');
  }
  else{
   
    $user=$_SESSION['id'];
    $sql1="SELECT * FROM user WHERE id='$user'";
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
                            <li class="breadcrumb-item active"><i class="fa fa-user-tie"></i> My Profile</li>
                        </ol>
                              
                        <?php
                            if (isset($_GET["added"])){
                                ?>
                                <p class="alert alert-success">Staff is Successfully Added ! <a href="allstaffs.php" class="text-light "><i class="fa fa-trash float-end text-success"></i></a> </p>
                                <?php     
                                 }
                            if (isset($_GET["deleted"])){
                                ?>
                                <p class="alert alert-danger">Staff is Successfully Deleted ! <a href="allstaffs.php" class="text-light "><i class="fa fa-trash float-end text-danger"></i></a></p>
                                <?php     
                                }

                                 ?>
                     
                        
                        <div class="card mb-4">
                            <div class="card-header bg-dark text-light">
                                <i class="fas fa-user me-1"></i>
                                My Details
                            </div>
                            <div class="card-body">
                            <?php

                                if (mysqli_num_rows($qry1) == 0){


                                ?>
                                <h4 class="text-center text-danger"> There is no such customer yet ! </h4>

                                <?php

                                }

                                else{
                                    $row = mysqli_fetch_array($qry1);
                                ?>



                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>
                                            <h6><?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']; ?></h6> 
                                            </th>
                                        </tr>
                                  
                                        <tr>
                                        <th>Email</th>
                                        <td>
                                <h6><?php echo $row['email']; ?></h6>
                                
                                </td>
                                        </tr>
                                        <tr>
                                        <th>Phonenumber</th>
                                        <td>
                                <h6><?php echo $row['pnumber']; ?> </h6>
                                
                                </td>
                                        </tr>
                                 
                                                        
                                    </thead>
                              
                                   <tbody>
                      

                                   <?php 
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
