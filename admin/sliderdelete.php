<?php
    require_once './config.php';

if(empty($_SESSION['user_id']))
{
    header('location:logout.php'); 
}
        
     
    $select_query = mysqli_query($con, "DELETE FROM `tbl_slider` WHERE id = '" . $_GET['id'] . "' ");
header('Location:slider.php');
?>

















