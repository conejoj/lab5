<?php
session_start();

if(isset($_SESSION['user_logged_in'])) {
    header("Location: redirect.php"); 
    exit();
}

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $_SESSION['user_logged_in'] = true;
    header("Location: redirect.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EMS - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-5">                  
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Conejo's Education Management System</h1>
                    </div>
                    <div class="centered-container">
                        <div class="form-container">
                            <div class="text-center">
                                <form id="login" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="form-group" style="text-align: center;">
                                        <input type="email" class="form-control form-control-user" 
                                               id="exampleInputEmail" name="email" aria-describedby="emailHelp" 
                                               placeholder="Enter Email Address..." style="width: 400px; margin-left: auto; 
                                                margin-right: auto; display: block;">
                                    </div>
                                    <div class="form-group" style="text-align: center;">
                                        <input type="password" class="form-control form-control-user" 
                                               id="exampleInputPassword" name="password" placeholder="Password" 
                                               style="width: 400px; margin-left: auto; margin-right: auto; display: block;">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block"
                                            style="display: block; width: 400px; margin-left: auto; margin-right: auto; text-align: center;">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
