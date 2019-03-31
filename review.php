<?php
session_start();
extract($_POST);
extract($_SESSION);
include("database.php");
if($submit=='Finish')
{
	mysqli_query($cn,"delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysqli_error($cn));
	unset($_SESSION[qn]);
	header("Location: index.php");
	exit;
}
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
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include("header.php");
echo '<div class="p-3 text-center text-white bg-dark"><h1 class="display-5"><i class="fas fa-poll-h mr-3"></i>Review Test Question</h1></div>';;

if(!isset($_SESSION[qn]))
{
		$_SESSION[qn]=0;
}
else if($submit=='Next Question' )
{
	$_SESSION[qn]=$_SESSION[qn]+1;
	
}

$rs=mysqli_query($cn,"select * from mst_useranswer where sess_id='" . session_id() ."'") or die(mysqli_error());
mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
echo '<div id="main-content">
<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="card mt-5 mb-5 bg-dark">
				<div class="card-body">
					<form action="review.php" method="post" name="myfm">';
$n=$_SESSION[qn]+1;
echo "<h4 class=\"mb-3 text-white\">Ques ".$n.": ".$row[2]."</h4><table border=0>";
echo "<tr><td class=".($row[7]==1?'correct-ans':'wrong-ans').">$row[3]";
echo "<tr><td class=".($row[7]==2?'correct-ans':'wrong-ans').">$row[4]";
echo "<tr><td class=".($row[7]==3?'correct-ans':'wrong-ans').">$row[5]";
echo "<tr><td class=".($row[7]==4?'correct-ans':'wrong-ans').">$row[6]</table>";
if($_SESSION[qn]<mysqli_num_rows($rs)-1)
echo '<input type="submit" value="Next Question" name="submit" class="btn btn-success mt-3 mr-5">';
else
echo '<input type="submit" name="submit" value="Finish" class="btn btn-primary mt-3 mr-5">';
echo '</form>					
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>';

?>

