<!-- This page allows admin to decline loan request -->
<?php
  session_start();
  include 'connection.php';

  $sql= "UPDATE `loan_request`
  SET `req_status`='Declined'
   WHERE req_id='".$_GET['id']."'";
  $qry=mysqli_query($conn,$sql);
 
  if ($qry) {
      header('Location:../declined.php?approved');
  }
?>