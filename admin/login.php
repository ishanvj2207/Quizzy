<?php
session_start();
error_reporting(1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Adminstrative AreaOnline Quiz </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
extract($_POST);
if(isset($submit))
{
	include("../database.php");
	$rs=mysqli_query($cn,"select * from mst_admin where loginid='$loginid' and pass='$pass'") or die(mysqli_error($cn));
	if(mysqli_num_rows($rs)<1)
	{
		echo '<div class="alert alert-danger text-center p-3 mt-3 mx-3"><h2>Invalid Username or Password</h2></div>
		<a href="index.php" class="btn btn-primary mt-3 mx-3"><i class="fas fa-arrow-left mr-2"></i>Go Back To Login Page</a> 
		';
		exit;
		
	}
	$_SESSION['alogin']="true";
	
}
else if(!isset($_SESSION[alogin]))
{
	echo '<div class="alert alert-danger text-center p-3 mt-3 mx-3"><h2>You Are Not Logged In</h2></div>
	<a href="index.php" class="btn btn-primary mt-3 mx-3">Please Login</a> 
	';		exit;
}
?>

<div id="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card bg-dark text-white mt-4 mb-4">
					<div class="card-body">
						<h1 class="card-title mx-auto">Welcome To Administrative Area</h1>
						<hr>
						<div class="row ml-3"><i class="fas fa-check mr-3 my-auto"></i><a href="subadd.php" class="btn btn-outline-warning text-white btn-lg mb-3">Add Subject</a></div>
						<div class="row ml-3"><i class="fas fa-check mr-3 my-auto"></i><a href="testadd.php" class="btn btn-outline-warning text-white btn-lg mb-3">Add Test</a></div>
						<div class="row ml-3"><i class="fas fa-check mr-3 my-auto"></i><a href="questionadd.php" class="btn btn-outline-warning text-white btn-lg mb-3">Add Question</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

</body>
</html>
