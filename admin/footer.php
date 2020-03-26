<?php
require_once './config.php';

if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}


if (isset($_REQUEST['submit'])) {
       $switch = !empty($_POST['switch'])?$_POST['switch']:'';
    if(!empty($_POST['id']))
    {
         $gettbl_footer = mysqli_query($con, " UPDATE tbl_footer SET switch = '".$switch."',about_title='".$_POST['about_title']."',latest_title='".$_POST['latest_title']."',instagram_title='".$_POST['instagram_title']."',about='".$_POST['about']."',latest='".$_POST['latest']."',designed='".$_POST['designed']."' WHERE id ='" . $_POST['id'] . "' ");    
    }
     else
     {

     $gettbl_footer = mysqli_query($con, "INSERT  INTO tbl_footer(`switch`,`about_title`,`latest_title`,`instagram_title`,`about`,`latest`,`designed`)"
                . "VALUES ('".$switch."','" . $_POST['about_title'] . "','" . $_POST['latest_title'] . "','" . $_POST['instagram_title'] . "','" . $_POST['about'] . "','" . $_POST['latest'] . "','" . $_POST['designed'] . "')");

    }

}


if (isset($_REQUEST['imageSubmit'])) {
    
    
    
    if (!empty($_FILES["user_image"]["name"])) {

           $image = $_FILES["user_image"]["name"];
           $upload_image = $_FILES["user_image"]["name"];
           $folder = "images/";
           move_uploaded_file($_FILES["user_image"]["tmp_name"], $folder . $_FILES["user_image"]["name"]);
   } else {
           $image = '';
   }
    $gettbl_footer_image = mysqli_query($con, "INSERT INTO tbl_footer_image(`image`) "
    . "VALUES ('" . $image . "')");
    }


$result = mysqli_query($con, "select * from tbl_footer where id = 1 ");
$row = mysqli_fetch_assoc($result);
    



?>

<!doctype html>
<html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Footer</title>
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

        <div id="right-panel" class="right-panel">

        <?php
        require_once './header.php';
        ?>


            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Footer</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Footer</li>
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
                                    <label>Switch</label>
                                    <input <?= !empty($row['switch']) ? 'checked' : '' ?> type="checkbox"  name="switch" >
                                </div>
                                    
                                       <div class="form-group">
                                    <label class=" form-control-label">About Title</label>
                                    <div class="input-group">
                                        <input name="about_title"  value="<?= !empty($row['about_title']) ? $row['about_title'] : '' ?>" required="" placeholder="" class="form-control">
                                    </div>
                               </div>
                                       <div class="form-group">
                                    <label class=" form-control-label">Latest Title</label>
                                    <div class="input-group">
                                        <input name="latest_title"  value="<?= !empty($row['latest_title']) ? $row['latest_title'] : '' ?>" required="" placeholder="" class="form-control">
                                    </div>
                               </div>
                                       <div class="form-group">
                                    <label class=" form-control-label">Instagram Title</label>
                                    <div class="input-group">
                                        <input name="instagram_title"  value="<?= !empty($row['instagram_title']) ? $row['instagram_title'] : '' ?>" required="" placeholder="" class="form-control">
                                    </div>
                               </div>
                                    
                                     <div class="form-group">
                                    <label class=" form-control-label">About Us</label>
                                    <div class="input-group">
                                        <textarea name="about"   required="" class="form-control"><?= !empty($row['about']) ? $row['about'] : '' ?></textarea>
                                        
                                    </div>
                               </div>
                                    
                                    
                                      <div class="form-group">
                                    <label class=" form-control-label">Table Footer</label>
                                    <div class="input-group">
                                        <textarea name="latest"   required="" class="form-control"><?= !empty($row['latest']) ? $row['latest'] : '' ?></textarea>
                                        
                                    </div>
                               </div>
                                    
                                 
                                <div class="form-group">
                                    <label class=" form-control-label">Copy Right</label>
                                    <div class="input-group">
                                        <input name="designed"  value="<?= !empty($row['designed']) ? $row['designed'] : '' ?>" required="" placeholder="" class="form-control">
                                    </div>
                               </div>
                                    
                 
                                             <div class="form-group">
                                                 <input type="hidden" name="id" value="<?= !empty($row['id']) ? $row['id'] : '' ?>" >
                                               <button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form" style="margin-top: 10px;">Submit</button>
                                     
                                    
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
                                       
                                            
             
                                <form method="post" action="" enctype="multipart/form-data">
                                    
                                            <div class="form-group">
                                                <label class=" form-control-label">Image</label>
                                                <div class="input-group">
                                                    <input type="file" name="user_image">

                                                </div>
                                           </div>
                                 
                                             <div class="form-group">
                                               <button type="submit" class="btn btn-primary" name="imageSubmit" value="imageSubmit" id="submit_form" style="margin-top: 10px;">Submit</button>
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
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $result_image = mysqli_query($con, "select * from tbl_footer_image  ");
                                                    while ($row_image = mysqli_fetch_assoc($result_image))
                                                    {
                                                    ?>
                                                    <tr>
                                                        <td><img  width="200" height="200"  src="images/<?= $row_image['image'] ?>"></td>
                                                        <td>
                                                            <a href="footeredit.php?id=<?= $row_image['id'] ?>" class="btn btn-info">Edit</a>
                                                            <a href="footerdelete.php?id=<?= $row_image['id'] ?>" class="btn btn-warning">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
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

  