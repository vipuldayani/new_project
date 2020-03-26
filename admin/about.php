<?php
require_once './config.php';

if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}


if (isset($_REQUEST['submit'])) {
    $main_title = $_REQUEST['main_title'];
    $sub_title = $_REQUEST['sub_title'];
    $main_title2 = $_REQUEST['main_title2'];
    $sub_title1 = $_REQUEST['sub_title1'];
    $sub_title2 = $_REQUEST['sub_title2'];
    $sub_title3 = $_REQUEST['sub_title3'];
    $text1 = $_REQUEST['text1'];
    $text2 = $_REQUEST['text2'];
    $text3 = $_REQUEST['text3'];
    if (!empty($_FILES["image"]["name"])) 
    {
        $image = $_FILES["image"]["name"];
        $upload_image = $_FILES["image"]["name"];
        $folder = "images/";
        move_uploaded_file($_FILES["image"]["tmp_name"], $folder . $_FILES["image"]["name"]);
    }
    else 
    {
        $image = $_POST['old_image_name'];
    }
    $switch = !empty($_POST['switch'])?$_POST['switch']:'';
    if(!empty($_POST['id']))
    {
          $gettbl_aboutus = mysqli_query($con, " UPDATE tbl_aboutus SET switch = '".$switch."', main_title='" . $_POST['main_title'] . "', sub_title='" . $_POST['sub_title'] . "', main_title2='" . $_POST['main_title2'] . "', sub_title1='" . $_POST['sub_title1'] . "', sub_title2='".$_POST['sub_title2']."', sub_title3='".$_POST['sub_title3']."', text1='".$_POST['text1']."', text2='".$_POST['text2']."', text3 = '". $_POST['text3']."' WHERE id='" . $_POST['id'] . "' ");    
    }
    else
    {
        $gettbl_aboutus = mysqli_query($con, "INSERT INTO `tbl_aboutus`(`switch`, `main_title`, `sub_title`, `main_title2`, `sub_title1`,`sub_title2`, `sub_title3`, `text1`,`text2`,`text3`,`image`) "
            . "VALUES ('".$switch."','" . $_POST['main_title'] . "','" . $_POST['sub_title'] . "','" . $_POST['main_title2'] . "','" . $_POST['sub_title1'] . "','" . $_POST['sub_title2'] . "','" . $_POST['sub_title3'] . "','" . $_POST['text1'] . "','" . $_POST['text2'] . "','" . $_POST['text3'] . "','" . $image . "' )");
    
    }
    
}

$result = mysqli_query($con, "select * from tbl_aboutus where id = 1 ");
$row = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>About Us</title>
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
                            <h1>About Us</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">About Us</li>
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


                                            <div class="col-md-12">
                                                <h1 style="text-align: center;">About Us</h1>

                                                <div class="col-md-12">
                                                    <div class="container">

                                                        <form name="" action="" method="post" enctype="multipart/form-data">
                                                             <div class="form-group">
                                                                <label>	Switch</label>
                                                                <input <?= !empty($row['switch']) ? 'checked' : '' ?> type="checkbox"  name="switch" >
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label>Main Title</label>
                                                                <textarea class="form-control" placeholder="Main Title" required name="main_title" ><?= !empty($row['main_title']) ? $row['main_title'] : '' ?></textarea>
                                                                
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Sub Title</label>
                                                                <textarea class="form-control" placeholder="Sub Title" required name="sub_title" ><?= !empty($row['sub_title']) ? $row['sub_title'] : '' ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>	Sub Main Title</label>
                                                                <textarea class="form-control" placeholder="Sub Main Title" required name="main_title2" ><?= !empty($row['main_title2']) ? $row['main_title2'] : '' ?></textarea>
                                                                
                                                            </div>
                                                            <div class="form-group">
                                                                <label>	Sub Title1</label>
                                                                <textarea class="form-control" placeholder="Sub Title" required name="sub_title1" ><?= !empty($row['sub_title1']) ? $row['sub_title1'] : '' ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>	Sub Title</label>
                                                                <textarea class="form-control" placeholder="Sub Title" required name="sub_title2" ><?= !empty($row['sub_title2']) ? $row['sub_title2'] : '' ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Sub Title</label>
                                                                <textarea class="form-control" placeholder="Sub Title" required name="sub_title3" ><?= !empty($row['sub_title3']) ? $row['sub_title3'] : '' ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>	Text</label>
                                                                <textarea class="form-control" placeholder="Text" required name="text1" ><?= !empty($row['text1']) ? $row['text1'] : '' ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>	Text</label>
                                                                <textarea class="form-control" placeholder="Text" required name="text2" ><?= !empty($row['text2']) ? $row['text2'] : '' ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>	Text</label>
                                                            <textarea class="form-control" placeholder="Text" required name="text3" ><?= !empty($row['text3']) ? $row['text3'] : '' ?></textarea>
                                                               </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Image</label>
                                                                <br /><br />
                                                                <input id="cc-pament" name="image" value="" type="file" >
                                                                <?php
                                                                if(!empty($row['image']))
                                                                {
                                                                ?>
                                                                <img  width="200" height="200"  src="images/<?= $row['image']; ?>">
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>

                                                            <input type="hidden" name="id" value="<?= !empty($row['id']) ? $row['id'] : '' ?>" >
                                                            <input type="hidden" name="old_image_name" value="<?= !empty($row['image']) ? $row['image'] : '' ?>" >
                                                            
                                                            <button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">Submit</button>

                                                        </form>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                    
                                                                


                                                </div>
                                            </div>


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

