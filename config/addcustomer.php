<!-- This is the page that performs customer registration function -->
<?php
include 'connection.php';

if(isset($_POST['save'])) {
  $fname=$_POST['fname'];
  $mname=$_POST['mname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $nin=$_POST['nin'];
  $pnumber=$_POST['pnumber'];
  $sex=$_POST['sex'];
 

  $sql="INSERT INTO `customer`(`fname`,`mname`,`lname`,`email`,`pnumber`,`sex`,`nin`,`address`) VALUES ('$fname','$mname','$lname','$email','$pnumber','$sex','$nin','$address')";
  $qry=mysqli_query($conn,$sql);

  if( !$qry){
    die(mysqli_error($conn));
  }
  else {
    header('Location:../allcustomers.php?added');
  }
}
  ?>