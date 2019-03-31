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
    <link rel="stylesheet" href="quiz.css"></head>

<body>
<?php
include("header.php");
include("database.php");
extract($_SESSION);
$rs=mysqli_query($cn,"select t.test_name,t.total_que,r.test_date,r.score from mst_test t, mst_result r where
t.test_id=r.test_id and r.login='$login'") or die(mysqli_error());

echo '<div class="p-3 text-center text-white bg-dark"><h1 class="display-5"><i class="fas fa-poll-h mr-3"></i>Results</h1></div>';
if(mysqli_num_rows($rs)<1)
{
	echo '<div class="container">
	<div class="row">
		<div class="alert alert-warning alert-lg mt-3 mx-auto"><h1>You have not given any quiz</h1></div>
	</div>
</div>';
	exit;
}
echo '<section id="main">
<div class="container text-center">
	<div class="row">
	<table class="table table-striped">
            <thead>
                <tr>
                    <th>Test Name</th>
                    <th>Total Question</th>
                    <th>Score</th>
                </tr>
			</thead>
			<tbody>';
while($row=mysqli_fetch_row($rs))
{
echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[3]</td></tr>";
}
echo '</tbody>
</table>
</div>
</div>
</section>';
?>

                
			
</body>
</html>
