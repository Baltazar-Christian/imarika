<!-- This is the file that allows the admin to approve loans -->
<?php
  session_start();
  include 'connection.php';

  $sql= "UPDATE `loan_request`
  SET `req_status`='Accepted'
   WHERE req_id='".$_GET['id']."'";
  $qry=mysqli_query($conn,$sql);
 
  if ($qry) {

    $sql="INSERT INTO `loan`(`customer`,`pay_date`, `issued_amount`, `remain`) SELECT `customer`,`return_date`,`amount`,`amount` FROM `loan_request` WHERE req_id='".$_GET['id']."'";
    $qry=mysqli_query($conn,$sql);
    if ($qry) {
        header('Location:../unpaid.php?approved');
    }
    else
    {
        die(mysqli_error($conn));
    }
     
  }
?>