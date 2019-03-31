<?php
session_start()
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Quizzy Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
<link href="../quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
?>

<div id="main-content">
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="card bg-warning text-center mb-2">
          <h3>Welcome To Quizzy !!</h3>
        </div>
        <div class="card bg-dark text-white">
          <img src="../image/admin.svg" alt="" class="rounded-circle mx-auto" height="270" width="270">
          <div class="card-body">
            <h3 class="card-title">Administrative Login</h3>
            <hr>
            <form name="form1" method="post" action="login.php">
              <div class="form-group">
                <input type="text" name="loginid" id="loginid" class="form-control"placeholder="Enter Login ID">
              </div>
              <div class="form-group">
                <input type="password" name="pass" id="pass" class="form-control"placeholder="Enter Password">
              </div>
              <input type="submit" value="Login" id="submit" name="submit" class="btn btn-success">
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

</body>
</html>
