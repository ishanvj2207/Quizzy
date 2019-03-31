<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Quizzy</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
	<link rel="stylesheet" href="quiz.css">
</head>
<body>
<?php
include("header.php");
include("database.php");
echo '<div class="p-3 text-center text-white bg-dark"><h1 class="display-5">Select Your Subject To Proceed To Quiz</h1></div>';
$rs=mysqli_query($cn,"select * from mst_subject");
echo '<div id="main-content">
<div class="container text-center">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<img src="image/choose.png" alt="" class="rounded-circle choose-style " width="120" height="120">;
		<ul class="list-group mb-5 text-center">';
while($row=mysqli_fetch_row($rs))
{
	echo "<a href=showtest.php?subid=$row[0] class=\"list-group-item list-group-item-danger\">$row[1]</a>";
}
echo '</ul>
</div>
</div>
</div>
</div>';
?>

			
</body>
</html>
