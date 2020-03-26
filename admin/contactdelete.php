<?php
    require_once './config.php';

if(empty($_SESSION['user_id']))
{
    header('location:logout.php'); 
}
        
             
        mysqli_query($con, "DELETE FROM tbl_contact WHERE id=$id");
    
        $select_query = mysqli_query($con, "DELETE FROM `tbl_contact` WHERE id = '" . $_GET['id'] . "' ");
        header('Location:contact.php');
?>

















