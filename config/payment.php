<!-- This is the file that performs the loan payment process -->
<?php
include 'connection.php';

if(isset($_POST['pay'])) {
  $loan=$_POST['loan'];
  $staff=$_POST['staff'];
  $amount=$_POST['amount'];
  $date=date('Y'.'-'.'m'.'-'.'d');


  $sql="SELECT * FROM loan WHERE loan_id='$loan'";
  $qry=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($qry);

  $remain=$row['remain'];
  $paid=$row['paid_amount'];
  $new_paid=$paid+$amount;
  $new_remain=$row['issued_amount']-$new_paid;
  if( $row['pay_date']> $date){
    if ($new_paid>=$remain){

      $sql="INSERT INTO `payment`(`loan`,`amount`,`staff`) 
      VALUES('$loan','$amount','$staff')";
      $qry=mysqli_query($conn,$sql);
      if ($qry) {
      $sql="UPDATE `loan` SET `paid_amount`='$new_paid',`loan_status`='Cleared',`remain`='$new_remain'
      WHERE loan_id='$loan'";
      $qry=mysqli_query($conn,$sql);
      if ($qry) {
        header('Location:../paid.php?cleared');          
       
      }
      else{
        die(mysqli_error($conn));
      }

    }
    else{
      die(mysqli_error($conn));
    }
    }
    else
    {

      $sql="INSERT INTO `payment`(`loan`,`amount`,`staff`) 
      VALUES('$loan','$amount','$staff')";
      $qry=mysqli_query($conn,$sql);
      if ($qry) {
        $sql="UPDATE `loan` SET `paid_amount`='$new_paid',`remain`='$new_remain'
        WHERE loan_id='$loan'";
        $qry=mysqli_query($conn,$sql);
        if ($qry) {          
          header('Location:../unpaid.php?success');   
        }
        else{
          die(mysqli_error($conn));
        }

      }
      else{
        die(mysqli_error($conn));
      }
  
    }
    
  }
  else{

    $fine=$row['issued_amount']/4 +$row['fine'];
    $total_remain=$new_remain+$fine;

    if ($new_paid>=$total_remain){
      $sql="INSERT INTO `payment`(`loan`,`amount`,`staff`) 
      VALUES('$loan','$amount','$staff')";
      $qry=mysqli_query($conn,$sql);
      if ($qry) {
      $sql="UPDATE `loan` SET `paid_amount`='$new_paid',`loan_status`='Cleared',`remain`='$total_remain',`fine`='$fine'
      WHERE loan_id='$loan'";
      $qry=mysqli_query($conn,$sql);
      if ($qry) {          
        header('Location:../paid.php?cleared');   
      }
      else{
        die(mysqli_error($conn));
      }

    }
    else{
      die(mysqli_error($conn));
    }
    }
    else
    {

      $sql="INSERT INTO `payment`(`loan`,`amount`,`staff`) 
      VALUES('$loan','$amount','$staff')";
      $qry=mysqli_query($conn,$sql);
      if ($qry) {
        $sql="UPDATE `loan` SET `paid_amount`='$new_paid',`remain`='$total_remain',`fine`='$fine'
        WHERE loan_id='$loan'";
        $qry=mysqli_query($conn,$sql);
        if ($qry) {          
          header('Location:../unpaid.php?success');  
         }
        else{
          die(mysqli_error($conn));
        }

      }
      else{
        die(mysqli_error($conn));
      }
  
    }
       


  }



}
  ?>