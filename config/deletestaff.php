<!-- This page performs the staff deletion operation -->
<?php
  session_start();
  include 'connection.php';

  $sql= "DELETE FROM user WHERE id='".$_GET['id']."'";
  $qry=mysqli_query($conn,$sql);
 
  if ($qry) {
      header('Location:../allstaffs.php?deleted');
  }
?>