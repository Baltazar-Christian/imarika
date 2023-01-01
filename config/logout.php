<!-- This is the file that performs the logout function -->

<?php
 session_start();
 session_destroy();

 header('Location:../index.php?success');


 ?>