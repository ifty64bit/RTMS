<?php
include("../controller/common/redir.php");
include("../model/db_config.php");
$username=$_SESSION['user'];
$query="Select * From users Where username='$username'";
$result = get($query)[0];

$uname=$result['username'];
$unameErr="";
$pass=$result['password'];
$passErr="";
$fname=$result['firstName'];
$fnameErr="";
$lname=$result['lastName'];
$lnameErr="";
$photo=$result['photo'];
$photoErr="";
$phone=$result['phone'];
$phoneErr="";
$email=$result['email'];
$emailErr="";
$date=$result['birthDate'];
$dateErr="";
$month=$result['birthMonth'];
$monthErr="";
$year=$result['birthYear'];
$yearErr="";
$hasErr=false;

function checkMail($email)
    {
        $len=strlen($email);
		for($i=0;$i<$len;$i++)
		{
			if($email[$i]=='@')
			{
				return true;
			}
		}
        return false;
    }

    if(isset($_POST['update']))
    {
        if( empty($_POST["pass"]) )
        {
            $hasErr=true;
            $passErr="Field Is Required";
        }
        elseif(strlen($_POST["pass"])<4)
        {
            $hasErr=true;
            $passErr="Password must be greeter then 4";
        }
        else
        {
            $pass=$_POST['pass'];
        }

        if( empty($_POST["fname"]) )
        {
            $hasErr=true;
            $fnameErr="Field Is Required";
        }
        elseif(strlen($_POST["fname"])<4)
        {
            $hasErr=true;
            $fnameErr="First Name must be greater then 4";
        }
        else
        {
            $fname=$_POST['fname'];
        }

        if( empty($_POST["lname"]) )
        {
            $hasErr=true;
            $lnameErr="Field Is Required";
        }
        elseif(strlen($_POST["lname"])<4)
        {
            $hasErr=true;
            $lnameErr="Last Name must be greater then 4";
        }
        else
        {
            $lname=$_POST['lname'];
        }

        if( empty($_POST["phone"]) )
        {
            $hasErr=true;
            $phoneErr="Field Is Required";
        }
        elseif(strlen($_POST["phone"])<10)
        {
            $hasErr=true;
            $phoneErr="Phone Number must be greater then 10";
        }
        else
        {
            $phone=$_POST['phone'];
        }

        if( empty($_POST["email"]) )
        {
            $hasErr=true;
            $emailErr="Field Is Required";
        }
        elseif(checkMail($_POST['email'])==false)
        {
            $hasErr=true;
            $emailErr="Invalid Email";
        }
        else
        {
            $email=$_POST['email'];
        }

        if($hasErr==false)
        {
            $date=$_POST['date'];
            $month=$_POST['month'];
            $year=$_POST['year'];
            $query="Update users Set `password`='$pass', firstName='$fname', lastName='$lname', phone='$phone', email='$email', birthDate='$date', birthMonth='$month', birthYear='$year' Where username='$uname';";
            $res=execute($query);
            header("Location: ../view/profile.php");
        }
    }

?>