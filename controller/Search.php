<?php
    include("../model/db_config.php");
    $name=$_GET['name'];
    $query="Select * From drivers Where firstname LIKE '%$name%' or lastName LIKE '%$name%'";
    echo json_encode(get($query));
?>