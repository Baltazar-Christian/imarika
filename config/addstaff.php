<!-- This is the page that performs staff registration function -->
<?php
include 'connection.php';

if(isset($_POST['save'])) {
  $fname=$_POST['fname'];
  $mname=$_POST['mname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $pnumber=$_POST['pnumber'];
  $role=$_POST['role'];
  $password=sha1($lname);

  $sql="INSERT INTO `user`(`fname`,`mname`,`lname`,`email`,`pnumber`,`password`,`role`) VALUES ('$fname','$mname','$lname','$email','$pnumber','$password','$role')";
  $qry=mysqli_query($conn,$sql);

  if( !$qry){
    die(mysqli_error($conn));
  }
  else {
    header('Location:../allstaffs.php?added');
  }
}
  ?>