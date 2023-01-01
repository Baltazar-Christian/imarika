<!-- This page performs loan request operation -->
<?php
include 'connection.php';

if(isset($_POST['issue'])) {
  $customer=$_POST['customer'];
  $staff=$_POST['staff'];
  $reason=$_POST['reason'];
  $amount=$_POST['amount'];
  $bound=$_POST['bound'];
  $return_date=$_POST['return_date'];
  $referee=$_POST['referee'];
  

  $sql="INSERT INTO `loan_request`(`customer`, `staff`, `amount`, `reason`, `bound`, `referee`,`return_date`) 
  VALUES ('$customer','$staff','$amount','$reason','$bound','$referee','$return_date')";
  $qry=mysqli_query($conn,$sql);

  if( !$qry){
    die(mysqli_error($conn));
  }
  else {
    header('Location:../request_loan.php?id='.$customer.'+requested');
  }
}
  ?>