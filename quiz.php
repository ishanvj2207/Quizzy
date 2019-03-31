<?php
session_start();
error_reporting(1);
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
/*$rs=mysql_query("select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
if($_SESSION[qn]>mysql_num_rows($rs))
{
unset($_SESSION[qn]);
exit;
}*/
if(isset($subid) && isset($testid))
{
$_SESSION[sid]=$subid;
$_SESSION[tid]=$testid;
header("location:quiz.php");
}
if(!isset($_SESSION[sid]) || !isset($_SESSION[tid]))
{
	header("location: index.php");
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


$query="select * from mst_question";

$rs=mysqli_query($cn,"select * from mst_question where test_id=$tid") or die(mysqli_error());
if(!isset($_SESSION[qn]))
{
	$_SESSION[qn]=0;
	mysqli_query($cn,"delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysqli_error());
	$_SESSION[trueans]=0;
	
}
else
{	
		if($submit=='Next Question' && isset($ans))
		{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($cn,"insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				$_SESSION[qn]=$_SESSION[qn]+1;
		}
		else if($submit=='Get Result' && isset($ans))
		{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($cn,"insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				echo '<div class="p-3 text-center text-white bg-dark"><h1 class="display-5"><i class="fas fa-poll-h mr-3"></i>Results</h1></div>';
				echo '<div class="container">
				<div class="row">
					<div class="col-md-8 pt-3">
						<img src="image/results1.png" alt="" class="img-fluid rounded">
					</div>
					<div class="col-md-4 pt-3">
						<div class="card text-center">
							<div class="card-body">';
				$_SESSION[qn]=$_SESSION[qn]+1;
				echo "<h3 class=\"text-primary py-3\">Total Questions : <span class=\"bg-primary px-3 rounded text-white\"> $_SESSION[qn]</span></h3>";														
				echo "<h3 class=\"text-success py-3\">True Answer : <span class=\"bg-success px-3 rounded text-white\">$_SESSION[trueans]</span></h3>";
				$w=$_SESSION[qn]-$_SESSION[trueans];
				echo "<h3 class=\"text-danger py-3\">Wrong Answer : <span class=\"bg-danger px-3 rounded text-white\">$w</span></h3>";

				mysqli_query($cn,"insert into mst_result(login,test_id,test_date,score) values('$login',$tid,'".date("d/m/Y")."',$_SESSION[trueans])") or die(mysqli_error());
				echo "<a href=\"review.php\" class=\"btn btn-outline-primary btn-lg my-3\">Review Questions</a>";			
				echo '</div>
						</div>
					</div>
				</div>
			</div>';
				unset($_SESSION[qn]);
				unset($_SESSION[sid]);
				unset($_SESSION[tid]);
				unset($_SESSION[trueans]);
				exit;
		}
}
$rs=mysqli_query($cn,"select * from mst_question where test_id=$tid") or die(mysqli_error());
if($_SESSION[qn]>mysqli_num_rows($rs)-1)
{
unset($_SESSION[qn]);
echo '<div class="alert alert-danger mx-3 mt-3"><h1>Some Error Occured</h1></div>';
session_destroy();
echo '<a href="index.php" class="btn btn-success btn-lg mt-3 mx-3"><i class="fas fa-redo-alt mr-2"></i>Start Again</a>';

exit;
}
mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
echo '<div id="main-content">
<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="card mt-5 mb-5 bg-dark text-white">
				<div class="card-body">
					<form action="quiz.php" method="post" name="myfm">';
$n=$_SESSION[qn]+1;
echo "<h4 class=\"mb-3\">Ques ".$n.": ".$row[2]."</h4>";
echo "<div class=\"radio mb-1\"><label><input type=\"radio\" name=\"ans\" value=\"1\" class=\"mr-2\">$row[3]</label></div>";
echo "<div class=\"radio mb-1\"><label><input type=\"radio\" name=\"ans\" value=\"2\" class=\"mr-2\">$row[4]</label></div>";
echo "<div class=\"radio mb-1\"><label><input type=\"radio\" name=\"ans\" value=\"3\" class=\"mr-2\">$row[5]</label></div>";
echo "<div class=\"radio mb-1\"><label><input type=\"radio\" name=\"ans\" value=\"4\" class=\"mr-2\">$row[6]</label></div>";


if($_SESSION[qn]<mysqli_num_rows($rs)-1)
echo '<input type="submit" value="Next Question" name="submit" class="btn btn-success mt-3 mr-5">';
else
echo '<input type="submit" name="submit" value="Get Result" class="btn btn-primary mt-3 mr-5">';
echo '</form>					
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>';
?>
						
				
</body>
</html>