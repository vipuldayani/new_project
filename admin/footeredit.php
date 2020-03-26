<?php
require_once './config.php';

  if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}

if (isset($_POST['imageSubmit'])) {
if (!empty($_FILES["user_image"]["name"])) {

    $image = $_FILES["user_image"]["name"];


    $upload_image = $_FILES["user_image"]["name"];
    $folder = "images/";
    move_uploaded_file($_FILES["user_image"]["tmp_name"], $folder . $_FILES["user_image"]["name"]);
} else {
    $image = $_POST['old_imagename'];
}

mysqli_query($con, "UPDATE tbl_footer_image SET image = '" . $image . "' WHERE id = '".$_POST['image_id']."' ");



 header('Location:footer.php');
}

$select_query = mysqli_query($con, "SELECT * FROM `tbl_footer_image` WHERE id = '" . $_GET['id'] . "' ");

$row_image = mysqli_fetch_assoc($select_query);

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

        <!-- Right Panel -->

        <div id="right-panel" class="right-panel">

        <?php
        require_once './header.php';
        ?>


            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Update Footer</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Update Footer</li>
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
                        <div class="card-header">
                            <strong class="card-title">Footer image</strong>
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">

                                    <form method="post" action="" enctype="multipart/form-data">    
                                        
                                    
                                        
                                          
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Table Footer Image</label>
                                            <br /><br />
                                            <input id="cc-pament" name="user_image" type="file" >
                                            <br />
                                            <br />
                                            <img  width="50" height="50"  src="images/<?= $row_image['image'] ?>">
                                            
                                        </div>
                                      
                                        <div>
                                            <br />
                                            <input type="hidden" name="image_id"  value="<?= $row_image['id'] ?>"   />
                                            <input type="hidden" name="old_imagename"  value="<?= $row_image['image'] ?>"   />
           <button type="submit" class="btn btn-primary" name="imageSubmit" value="imageSubmit" id="submit_form" style="margin-top: 10px;">Update</button>                                  
                                            
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

<script type="text/javascript" language="javascript">

    $(document).ready(function () {
        $('#add_button').click(function () {
            $('#user-form')[0].reset();
            $('.model-title').text("Add Usur");
            $('#action').val("Add");
            $('#operation').val("Add");
            $('#user_uploaded_image').html('');
        });
        var dataTable = $('#user_data').dataTable(
                );

    });



</script>