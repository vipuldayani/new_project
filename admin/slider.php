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

                $gettbl_slider = mysqli_query($con, "INSERT INTO tbl_slider(image) "
                        . "VALUES ('" . $image . "')");
            }
?>
<!doctype html>
<html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Slider</title>
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
                            <h1>Slider</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Slider</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            
                 
      
      
        <table class="table">

            <?php
            $result = mysqli_query($con, "select * from tbl_slider ");
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><img  width="200" height="200"  src="images/<?= $row['image'] ?>"></td>
                    <td>
                        <a href="slideredit.php?id=<?= $row['id'] ?>" class="btn btn-info">Edit</a>
                        <a href="sliderdelete.php?id=<?= $row['id'] ?>" class="btn btn-warning">Delete</a>
                    </td>
                </tr>

            <?php }
            ?>
        </table>
    


    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                         <strong class="card-title">Slider image</strong>
                          </div>
                          <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">


                                    <form method="post" action="" enctype="multipart/form-data">    

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Image</label>
                                            <br /><br />
                                            <input id="cc-pament" name="user_image" type="file">
                                        </div>

                                        <div>
                                          <br />
                                        <input type="hidden" name="id"  value="<?= $row['id'] ?>"   />
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
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->


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
<script>
    (function ($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>

</body>
</html>
