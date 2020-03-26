<?php
require_once './config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}
$error = array();
   if (isset($_REQUEST['submitclick'])) {
       
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        
        if (empty($email)) {
            array_push($error,"Email is required");
        }
        if (empty($password)) {	
            array_push($error,"Password is required");
        }   
    
         if (count($error) == 0 ){
            $query = "SELECT * FROM tbl_login WHERE email= '".$email."' ";
            $result = mysqli_query($con, $query);
            
            if (mysqli_num_rows($result) > 0)
            {
                    array_push($error, "Email Address already exist!");
            }
            else
            {

                $gettbl_login = mysqli_query($con, "INSERT INTO `tbl_login`(`email`,`password`) "
                . "VALUES ('" . $_POST['email'] . "','" . $_POST['password'] . "')");
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
        <style>
            .error p
            {
                color: red;
            }
        </style>
    </head>
    <body>


        <?php
        require_once './sidebar.php';
        ?>

        <!-- Right Panel -->

        <div id="right-panel" class="right-panel">

        <?php
        require_once './header.php';
        ?>


            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Admin Login</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Admin Login</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>




            
             <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="pay-invoice">
                                        <div class="card-body">
                                          <?php if (!empty($error)): ?>
	
                                            <div class="error">
                                                    <?php foreach ($error as $error1): ?>
                                                            <p><?php echo $error1; ?></p>
                                                    <?php endforeach ?>
                                            </div>
                                    <?php endif ?>

                                            <form name="" action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input name="email"  placeholder="Email ID"  required="" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label> Password</label>
                                                    <input name="password"  placeholder="Password" required="" class="form-control">
                                                </div>

                                                <button type="submit" class="btn btn-primary" name="submitclick" value="Submit" id="submit_form">Submit</button>

                                            </form>                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                 <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="pay-invoice">
                                        <div class="card-body">
                                          
                                             <table class="table">
                                                <tr>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    
                                                    <th>Action</th>
                                                </tr>
                                                <?php
                                                $result_admin = mysqli_query($con, "select * from tbl_login");
                                                while ($row_admin = mysqli_fetch_assoc($result_admin)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                        <?= $row_admin['email'] ?>
                                                        </td>
                                                        <td>
                                                        <?= $row_admin['password'] ?>
                                                        </td>
                                                        
                                                        <td>
                                                            <a href="adminedit.php?id=<?= $row_admin['id'] ?>" class="btn btn-info">Edit</a>
                                                            <a href="admindelete.php?id=<?= $row_admin['id'] ?>" class="btn btn-warning">Delete</a>
                                                        
                                                        </td>
                                                    </tr>

                                                <?php
                                                }
                                                ?>
                                               </table>   
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
            
            
        </div> 



        <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
        <script src="assets/js/dashboard.js"></script>
        <script src="assets/js/widgets.js"></script>
        <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
        <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
        <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
        <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
       
    </body>
</html>

