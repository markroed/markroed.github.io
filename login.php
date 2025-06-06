<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fellazar Optical Clinic</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>
<?php
ob_start();
include("connection/connect.php"); //INCLUDE CONNECTION
error_reporting(0); // hide undefine index errors
session_start(); // temp sessions var_dump($_SESSION["email"]);
if (isset($_POST['submit']))   // if button is submit
{
    $username = $_POST['username'];  //fetch records from login form
    $pass = $_POST['password'];
    if (!empty($_POST["submit"]))   // if records were not empty
    {
        $loginquery = "SELECT * FROM admin WHERE adminUsername='$username' && adminPassword='$pass'"; //selecting matching records
        $result = mysqli_query($db, $loginquery); //executing
        // var_dump($result);
        $row = mysqli_fetch_assoc($result);
        // var_dump($row);

        if (is_array($row))  // if matching records in the array & if everything is right
        {

            $_SESSION["adminUsername"] = $row['adminUsername']; // put user id into temp session
            header("Location:index.php"); // redirect to index.php page

        } else {
            $message = "Invalid Username or Password!"; // throw error
        }
    }
}
?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">LOGIN ACCOUNT</h1>
                                        <?php echo $message ?>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="Username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>

                                        <input type="submit" class="btn btn-primary btn-user btn-block" id="buttn" name="submit" value="Login" />

                                    </form>
                                  

                   

                                </div>
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