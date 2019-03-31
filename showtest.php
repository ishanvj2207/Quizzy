<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz - Test List</title>
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
include("database.php");
extract($_GET);
$rs1=mysqli_query($cn,"select * from mst_subject where sub_id=$subid");
$row1=mysqli_fetch_array($rs1);
echo "<div class=\"p-3 text-center text-white bg-success\"><h1 class=\"display-5\">$row1[1]</h1></div>";
$rs=mysqli_query($cn,"select * from mst_test where sub_id=$subid");
if(mysqli_num_rows($rs)<1)
{
	echo "<br><br><br><div class=\" mx-3 alert alert-danger head1\"><h2>No Quiz For This Subject<h2></div>";
	exit;
}
echo "<div class=\"p-3 text-center text-white bg-dark\"><h1 class=\"display-5\">Select Quiz Name To Give Quiz</h1></div>";


while($row=mysqli_fetch_row($rs))
{
	echo "<a href=quiz.php?testid=$row[0]&subid=$subid class=\"btn btn-primary d-block mx-5 my-3\">$row[2]</a>";
}

?>
</body>
</html>
