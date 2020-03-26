<?php
require_once './config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}

if (isset($_REQUEST['submit'])) {
$service_title = $_REQUEST['service_title'];
$sub_service = $_REQUEST['sub_service'];
$icon1 = $_REQUEST['icon1'];
$icon2 = $_REQUEST['icon2'];
$icon3 = $_REQUEST['icon3'];
$main_title1 = $_REQUEST['main_title1'];
$main_title2 = $_REQUEST['main_title2'];
$main_title3 = $_REQUEST['main_title3'];
$text1 = $_REQUEST['text1'];
$text2 = $_REQUEST['text2'];
$text3 = $_REQUEST['text3'];
$switch = !empty($_POST['switch'])?$_POST['switch']:'';
if(!empty($_POST['id']))
{
     $gettbl_service = mysqli_query($con, " UPDATE tbl_service SET switch = '".$switch."',service_title='".$_POST['service_title']."',sub_service='".$_POST['sub_service']."',icon1='".$_POST['icon1']."',icon2='".$_POST['icon2']."',icon3='".$_POST['icon3']."',main_title1='".$_POST['main_title1']."',main_title2='".$_POST['main_title2']."',main_title3='".$_POST['main_title3']."',text1='".$_POST['text1']."',text2= '". $_POST['text2']."',text3='".$_POST['text3']."' WHERE id='" . $_POST['id'] . "' ");    
}
 else
 {
 
 $gettbl_service = mysqli_query($con, "INSERT  INTO tbl_service(`switch`,`service_title`,`sub_service`,`icon1`,`icon2`,`icon3`,`main_title1`,`main_title2`,`main_title3`,`text1`,`text2`,`text3`)"
            . "VALUES ('".$switch."','" . $_POST['service_title'] . "','" . $_POST['sub_service'] . "','" . $_POST['icon1'] . "','" . $_POST['icon2'] . "','" . $_POST['icon3'] . "','" . $_POST['main_title1'] . "','" . $_POST['main_title2'] . "','" . $_POST['main_title3'] . "','" . $_POST['text1'] . "','" . $_POST['text2'] . "','" . $_POST['text3'] . "')");
     
}

}

$result = mysqli_query($con, "select * from tbl_service where id = 1 ");
$row = mysqli_fetch_assoc($result);

?>

<!doctype html>
<html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Service</title>
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
                            <h1>Service</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Service</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            
              <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-12 col-sm-12">
                        <form action="" method="post">
                        <div class="card">
                            <div class="card-header">
                                <strong>Service</strong> 
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Switch</label>
                                    <div class="input-group">
                                        <input <?= !empty($row['switch']) ? 'checked' : '' ?> type="checkbox"  name="switch" >
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class=" form-control-label">Main Title</label>
                                    <div class="input-group">
                                        <input name="service_title"  value="<?= !empty($row['service_title']) ? $row['service_title'] : '' ?>" required="" class="form-control">
                                    </div>
                               </div>
                                
                                <div class="form-group">
                                    <label class=" form-control-label">Sub Main Title</label>
                                    <div class="input-group">
                                        <textarea name="sub_service"   required="" class="form-control"><?= !empty($row['sub_service']) ? $row['sub_service'] : '' ?></textarea>
                                        
                                    </div>
                               </div>
                                
                                <div class="form-group">
                                    <label class=" form-control-label">Icon 1</label>
                                    <div class="input-group">
                                        <input name="icon1"  value="<?= !empty($row['icon1']) ? $row['icon1'] : '' ?>" required="" class="form-control">
                                    </div>
                               </div>
 
                                <div class="form-group">
                                    <label class=" form-control-label">Main Title 1</label>
                                    <div class="input-group">
                                        <textarea name="main_title1"   required="" class="form-control"><?= !empty($row['main_title1']) ? $row['main_title1'] : '' ?></textarea>
                                        
                                    </div>
                               </div>
                                
                                <div class="form-group">
                                    <label class=" form-control-label">Text 1</label>
                                    <div class="input-group">
                                        <textarea name="text1"   required="" class="form-control"><?= !empty($row['text1']) ? $row['text1'] : '' ?></textarea>
                                        
                                    </div>
                               </div>
                                
                                
                                <div class="form-group">
                                    <label class=" form-control-label">Icon 2</label>
                                    <div class="input-group">
                                        <input name="icon2"  value="<?= !empty($row['icon2']) ? $row['icon2'] : '' ?>" required="" class="form-control">
                                    </div>
                               </div>

                               <div class="form-group">
                                    <label class=" form-control-label">Main Title 2</label>
                                    <div class="input-group">
                                        <textarea name="main_title2"   required="" class="form-control"><?= !empty($row['main_title2']) ? $row['main_title2'] : '' ?></textarea>
                                        
                                    </div>
                               </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Text 2</label>
                                    <div class="input-group">
                                        <textarea name="text2"   required="" class="form-control"><?= !empty($row['text2']) ? $row['text2'] : '' ?></textarea>
                                        
                                    </div>
                               </div>
                                
                                
                                 <div class="form-group">
                                    <label class=" form-control-label">Icon 03</label>
                                    <div class="input-group">
                                        <input name="icon3"  value="<?= !empty($row['icon3']) ? $row['icon3'] : '' ?>" required="" class="form-control">
                                    </div>
                               </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Main Title 3</label>
                                    <div class="input-group">
                                        <textarea name="main_title3"   required="" class="form-control"><?= !empty($row['main_title3']) ? $row['main_title3'] : '' ?></textarea>
                                        
                                    </div>
                               </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Text 3</label>
                                    <div class="input-group">
                                        <textarea name="text3"   required="" class="form-control"><?= !empty($row['text3']) ? $row['text3'] : '' ?></textarea>
                                        
                                    </div>
                               </div>
                                
                                
                                <div class="form-group">
                                               <input type="hidden" name="id" value="<?= !empty($row['id']) ? $row['id'] : '' ?>" >
                                               <button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form" style="margin-top: 10px;">Submit</button>
                                            </div>
                                
                        </div>
                        </div>
                        </form>
                    </div>

                    



                </div>


            </div><!-- .animated -->
        </div><!-- .content -->
            
            
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

