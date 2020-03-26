<?php
require_once './config.php';

if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}

if (isset($_REQUEST['submit'])) {
    $icon = $_REQUEST['icon'];
    $link = $_REQUEST['link'];

    
    
    $target = !empty($_POST['target'])?$_POST['target']:'';
    if(!empty($_POST['id']))
    {
          $gettbl_shareicon = mysqli_query($con, " UPDATE tbl_shareicon SET target = '".$target."', icon='" . $_POST['icon'] . "', link='" . $_POST['link'] . "' ");    
    }
    else
    {
        $gettbl_shareicon = mysqli_query($con, "INSERT INTO `tbl_shareicon`(`target`, `icon`, `link`) "
            . "VALUES ('".$target."','" . $_POST['icon'] . "','" . $_POST['link'] . "' )");
    
    }
    
}

$result = mysqli_query($con, "select * from tbl_shareicon where id = 1 ");
$row = mysqli_fetch_assoc($result);



?>

<!doctype html>
<html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Share Icon</title>
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
                            <h1>Share Icon</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Share Icon</li>
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
                                       
                                            
             
                                <form method="post" action="">
                                 <div class="form-group">
                                <label class=" form-control-label">Icon</label>
                                    <div class="input-group">
                                        <input name="icon"  value="<?= !empty($row['icon']) ? $row['icon'] : '' ?>" required="" placeholder="fa fa icon " class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Web Link</label>
                                    <div class="input-group">
                                        <input name="link"  value="<?= !empty($row['link']) ? $row['link'] : '' ?>" required="" placeholder="https://www.xyzetc.com " class="form-control">
                                    </div>
                               </div>
                                            
                                    <div class="form-group">
                                       <label class=" form-control-label">Target</label>
                                    <div class="input-group">
                                        <input <?= !empty($row['target']) ? 'checked' : '' ?> type="checkbox"  name="target" >
                                    </div>
                                    </div>
                                            <div class="form-group">
                                               <input type="hidden" name="id" value="<?= !empty($row['id']) ? $row['id'] : '' ?>" >
                                               <button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form" style="margin-top: 10px;">Submit</button>
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
                                                    <th>Icon</th>
                                                    <th>Web Link</th>
                                                    <th>Checkbox</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php
                                                $result = mysqli_query($con, "select * from tbl_shareicon");
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                    <?= $row ['icon'] ?>
                                                        </td>
                                                        <td>
                                                        <?= $row ['link'] ?>
                                                        </td>
                                                        <td><?= $row ['target'] ?></td>
                                                        <td>
                                                            <a href="shareiconedit.php?id=<?= $row['id'] ?>" class="btn btn-info">Edit</a>
                                                            <a href="shareicondelete.php?id=<?= $row['id'] ?>" class="btn btn-warning">Delete</a>
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

  