<?php
    include("../model/db_config.php");
    $driverID=$_GET['id'];
    $status=$_GET['status'];
    $query="Update drivers set status='$status' where id='$driverID'";
    $r=execute($query);
    if($r==true)
    {
        echo "Status Updated";
    }
?>