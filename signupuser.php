<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>User Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
extract($_POST);
include("database.php");
$rs=mysqli_query($cn,"select * from mst_user where login='$lid'");
if (mysqli_num_rows($rs)>0)
{
	echo "<br><br><br><div class=\"alert alert-danger head1\">Login Id Already Exists</div>";
	echo "<br><div class=\"px-5\"><a href=index.php class=\"btn btn-outline-danger btn-lg \">Go To Home</a></div>";
	exit;
}
$query="insert into mst_user(user_id,login,pass,username,address,city,phone,email) values('$uid','$lid','$pass','$name','$address','$city','$phone','$email')";
$rs=mysqli_query($cn,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=\"text-center alert alert-success head1\">Your Login ID  $lid Created Sucessfully</div>";
echo "<br><div class=\"text-center alert alert-success head1\">Please Login using your Login ID to take Quiz</div>";
echo "<br><div class=\"px-5\"><a href=index.php class=\"btn btn-outline-success btn-lg \">Login</a></div>";


?>
</body>
</html>

