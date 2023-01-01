<!-- This page allows the admin to perform the loan request deletion operation -->
<?php
  session_start();
  include 'connection.php';

  $sql= "DELETE FROM loan_request WHERE req_id='".$_GET['id']."'";
  $qry=mysqli_query($conn,$sql);
 
  if ($qry) {
      header('Location:../declined.php?deleted');
  }
?>