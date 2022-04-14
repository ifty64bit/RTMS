<?php
    include("../controller/common/redir.php");
    include("../model/db_config.php");
    $id=$_GET['id'];
    $query="Select * from drivers where id='$id'";
    $r=get($query)[0];
    $fname=$r['firstName'];
    $lname=$r['lastName'];
    $phone=$r['phone'];
    $address=$r['address'];
    $licence=$r['licence'];
    $vehicleNumber=$r['vehicleNumber'];
    $status=$r['status'];
    $query="Select * from offences where driverID='$id'";
    $r=get($query);

    $reason="";
    $reasonErr="";
    $fine="";
    $fineErr="";
    $hasErr=false;

    if(isset($_POST['add']))
    {
        if(empty($_POST['reason']))
        {
            $reasonErr="Reason is required";
            $hasErr=true;
        }
        else
        {
            $reason=$_POST['reason'];
        }
        if(empty($_POST['fine']))
        {
            $fineErr="Fine is required";
            $hasErr=true;
        }
        elseif(is_int($_POST['fine']))
        {
            $hasErr=true;
            $fineErr="Fine must be a number";
        }
        else
        {
            $fine=$_POST['fine'];
        }
        if($hasErr==false)
        {
            $query="Insert into offences(driverID,offenceType,fine) values('$id','$reason','$fine')";
            if(execute($query)==true)
            {
                header("Location: ./ViewDriver.php?id=$id");
            }
        }
    }
?>