<?php
require_once './config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}

if (isset($_POST['action'])) {
    
if (!empty($_FILES["user_image"]["name"])) {
    
$image = $_FILES["user_image"]["name"];
$upload_image = $_FILES["user_image"]["name"];
$folder = "images/";
move_uploaded_file($_FILES["user_image"]["tmp_name"], $folder . $_FILES["user_image"]["name"]);
} else {
$image = '';
}
$gettbl_portfolio = mysqli_query($con, "INSERT INTO tbl_portfolio(`image`,`name`) "
. "VALUES ('" . $image . "','" . $_POST['name'] . "')");
}
           

?>

<!doctype html>
<html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Portfolio</title>
        <meta name="description" content="Sufee Admin - HTML5 Admin Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/css/lightbox.min.css" rel="stylesheet">
        <link rel="apple-touch-icon" href="apple-icon.png">
        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="assets/scss/style.css">
        <link rel="stylesheet" type="text/css" href="assets/scss/styleservice.css">
    </head>
    <body>


         <?php
         require_once './sidebar.php';
         ?>

        <div id="right-panel" class="right-panel">

        <?php
        require_once './header.php';
        ?>


            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Portfolio</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Portfolio</li>
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
                                       
                                            
             
                                            
        <form method="post" action="" enctype="multipart/form-data">    
            
           <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" placeholder="Image Name" required="" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Image</label>
                <br /><br />
                <input id="cc-pament" name="user_image" type="file">
            </div>
            
            <div>
                <br />
                <button  type="submit" class="btn btn-info" name="action">Submit</button>
                <span id="user_uploaded_image"></span>

            </div>
        </form>  
                                            
                                            
                                            
            

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="pay-invoice">
                                        <div class="card-body">
                                       
                                            
             
                                            
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
            $result = mysqli_query($con, "select * from tbl_portfolio ");
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?=$row['name']?></td>
                    <td><img  width="200" height="200"  src="images/<?= $row['image'] ?>"></td>
                    <td>
                        <a href="portfolioedit.php?id=<?= $row['id'] ?>" class="btn btn-info">Edit</a>
                        <a href="portfoliodelete.php?id=<?= $row['id'] ?>" class="btn btn-warning">Delete</a>
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
        <script src="assets/js/lightbox.min.js"></script>
    </body>
</html>

