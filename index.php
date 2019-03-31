<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
<title>Quizzy</title>
</head>

<body>
<?php
include("header.php");
include("database.php");
extract($_POST);

if(isset($submit))
{
	$rs=mysqli_query($cn,"select * from mst_user where login='$loginid' and pass='$pass'");
	if(mysqli_num_rows($rs)<1)
	{
		$found="N";
	}
	else
	{
		$_SESSION[login]=$loginid;
	}
}
if (isset($_SESSION[login]))
{
echo '<div id="main-content">
<div class="container">
  <div class="row py-3">
    <div class="col-md-6">
      <div class="card p-4 border-primary text-center bg-dark text-white">
        <img src="image/subjects.png" alt="" class=" rounded-circle mx-auto" width="350" height="350">
        <div class="card-body">
          <a href="sublist.php" class="btn btn-lg btn-danger">Choose The Subject...</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card p-4 border-primary text-center bg-dark text-white">
        <img src="image/results.png" alt="" class=" rounded-circle mx-auto" width="450" height="350">
        <div class="card-body">
          <a href="result.php" class="btn btn-lg btn-danger">View Results...</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>';

		exit;


}

?>
<div id="main-content">
<div class="row py-3 ">
<h1 class="display-6 bg-warning mx-auto px-3 rounded">  !! Welcome To Quizzy !!  </h2>
  <div class="container text-center">
    
  </div>
</div>
<section id="form" class="py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-4 text-center">
     
        <img src="image/laptop.jpg" alt="" class="rounded img-fluid" width="400" height="400" >
     
      </div>
      <div class="col-md-8">
        <div class="card p-4 bg-dark text-white text-center">
          <div class="card-body">
            <h3 class="card-title text-center">User Login</h3>
            <hr>
            <form action="" method="post" name="form1">
              <div class="row">
                <div class="form-group col-md-12">
                  <input type="text" name="loginid" id="loginid2" placeholder="Login ID" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <input type="password" name="pass" id="pass2" placeholder="Password" class="form-control">
                </div>
              </div>
              <span class="text-danger">
              <?php
                if(isset($found))
                {
                  echo "Invalid Username or Password";
                }

                ?>
              </span>
              <div class="row">
                <input type="submit" value="Login" name="submit" id="submit" class="btn btn-success btn-block my-3">
                <a href="signup.php" class="btn btn-danger btn-block mt-2">New User?  SignUp Now..</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

</body>



</html>
