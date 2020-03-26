<?php
require_once './config.php';
$errors =  array();
if (isset($_POST['submit'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];
    if (empty($username)) 
    {
        array_push($errors, "Email is required");
    }
    if (empty($password)) 
    {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $query = "SELECT * FROM tbl_login WHERE email = '".$username."' AND password = '".$password."' LIMIT 1 ";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 1) {
            $getrecord = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $getrecord['id'];
            $_SESSION['email'] = $username;
            header('location:dashboard.php'); 
        } 
        else 
        {
            array_push($errors, "Email and Password wrong!");
        }
    }
}

?>

<!doctype html>
<html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Login</title>
        <meta name="description" content="Sufee Admin - HTML5 Admin Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-icon.png">

       <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="assets/scss/style.css">
    </head>
    <body class="bg-dark">


        <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="index.html">
                            <img class="align-content" src="images/logo.png" alt="">
                        </a>
                    </div>
                    <div class="login-form">
                        <?php
                        if(!empty($errors))
                        { ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach ($errors as $value)
                            { ?>
                                <div>
                                    <?=$value?>
                                </div>
                           <?php }
                           ?>
                        </div>
                            <?php
                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" value="admin@bladephp.co" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password"  value="123456" class="form-control" placeholder="Password">
                            </div>
                         
                            <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>


    </body>
</html>
