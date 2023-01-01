<!-- This page performs the customer deletion operation -->
<?php
  session_start();
  include 'connection.php';

  $sql= "DELETE FROM customer WHERE cust_id='".$_GET['id']."'";
  $qry=mysqli_query($conn,$sql);
 
  if ($qry) {
      header('Location:../allcustomers.php?deleted');
  }
?>