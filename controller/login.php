<?php
session_start();
$rootPath = $_SERVER['DOCUMENT_ROOT'];
include($rootPath."/RTMS/model/db_config.php");

$uname="";
$uname_error="";
$pass="";
$pass_error="";
$loginErr="";
$hasError=false;

if( isset($_POST["login"]))
{
    if( empty($_POST["uname"]) )
    {
        
			$hasError=true;
			$uname_error="Field Is Required";
    }
    elseif(strlen($_POST['uname'])<5)
	{
		$hasError=true;
		$uname_error="Username must be greater then 5";
	}
	else
	{
		$uname=$_POST['uname'];
	}

    if( empty($_POST["pass"]) )
    {
			$hasError=true;
			$pass_error="Field Is Required";
    }
	else
	{
		$pass=$_POST['pass'];
	}

    if($hasError==false)
    {
        $query="Select * From users Where username='$uname' and password='$pass'";
        $loginData=get($query);
        if(count($loginData)==0)
        {
            $loginErr="Invalid Username or Password";
        }
        else
        {
            $_SESSION['user']=$loginData[0]['username'];
            header("Location: ../view/index.php");
        }
    }
}

?>