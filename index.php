<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>IMARIKA | Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/fontawesome.js" crossorigin="anonymous"></script>
    </head>
    <style>
    body{
      background-image: url('assets/img/micro.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    

    }
    </style>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center mt-5">
                            <div class="col-lg-8 mt-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header bg-dark">
                                        <h4 class="text-light" style="font-weight:bold;" >Imarika <i class="text-danger">microfinance</i></h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="config/authentication.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
  
                                                <!-- Login failure message -->
                                            <?php
                                            if (isset($_GET["fail"])){
                                            ?>
                                            <p class="alert alert-danger ">wrong Email or Password</p>
                                            <?php     
                                            }

                                            ?>
                                            <div class="float-right col-md-12 mx-auto mt-4 mb-0">
 
                                                <button class="btn btn-outline-primary  form-control" name="login" type="submit">Login</button>
                                               
                                            </div>
                                        </form>
                                    </div>
         
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
     <?php include 'include/footer.php'; ?>
