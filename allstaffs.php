<!-- This is the page that views all staffs -->
<?php
  session_start();
  include 'config/connection.php';
  if ($_SESSION['id']=='') {
    header('Location:index.php');
  }
  else{
   
    $sql1="SELECT * FROM user WHERE role !='1'";
    $qry1=mysqli_query($conn,$sql1);

    include 'include/header.php'; ?>
        <div id="layoutSidenav">
        <?php include 'include/adminnav.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-2">
                        <ol class="breadcrumb mb-4 text-right">
                            <li class="breadcrumb-item active"><i class="fa fa-user-tie"></i> Manage Staffs/All Staffs</li>
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
                            <div class="card-header bg-dark text-secondary">
                                <i class="fas fa-users me-1"></i>
                                All Staffs
                            </div>
                            <div class="card-body">
                            <?php

                                if (mysqli_num_rows($qry1) == 0){


                                ?>
                                <h4 class="text-center text-danger"> There is no registered staff  yet ! </h4>

                                <?php

                                }

                                else{
                                ?>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Fullnames</th>
                                            <th>Phonenumber</th>
                                            <th>Email</th>
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
                                <h6><?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']; ?></h6> 
                                </td>
                                <td>
                                <h6><?php echo $row['pnumber']; ?></h6>
                                
                                </td>
                                <td>
                                <h6><?php echo $row['email']; ?> </h6>
                                
                                </td>
                                <td>
                                <div class="text-center">
                                  <a class="bg-dark p-1 text-light" href="EditEarning.php?id=<?php echo $row['id'];?>"><i class="fa fa-eye"></i></a>
                                  <a class="bg-dark text-light p-1" href="config/deletestaff.php?id=<?php echo $row['id'];?>"><i class="fa fa-trash "></i></a>
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
                
  }?>
