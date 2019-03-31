<?php
session_start();
require("../database.php");
include("header.php");
error_reporting(1);
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php

extract($_POST);


if (!isset($_SESSION['alogin']))
{
  echo '<div class="alert alert-danger text-center p-3 mt-3 mx-3"><h2>You are not Logged In ... Please Login to Access this Page</h2></div>
  <a href="index.php" class="btn btn-primary mt-3 mx-3"></i>Click Here To Login</a> 
  ';
  exit();
}
echo '<div id="main-content">
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="card bg-dark text-white mb-5">
        <img src="../image/subject.jpg" alt="" class="rounded-circle mx-auto img-fluid img-style" width="200" height="200">
        <div class="card-body">';


if($submit=='submit' || strlen($subname)>0 )
{
$rs=mysqli_query($cn,"select * from mst_subject where sub_name='$subname'");
if (mysqli_num_rows($rs)>0)
{
  echo '<div class="alert alert-danger text-center p-3 mt-3 mx-3"><h2>Subject Already Exists..</h2></div>
  <a href="login.php" class="btn btn-primary mt-3 mx-3"><i class="fas fa-arrow-left mr-2"></i>Go Back To Home</a> 
  ';
  exit;
}
mysqli_query($cn,"insert into mst_subject(sub_name) values ('$subname')") or die(mysqli_error($cn));
echo "<div class=\"alert alert-success text-center p-3 mt-3 mx-3 alert-dismissable\"><button class=\"close\"type=\"button\" data-dismiss=\"alert\"><span>&times;</span></button><h2>Subject <strong>$subname</strong> Added Successfully</h2></div>";
$submit="";
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.subname.value;
if (mt.length<1) {
alert("Please Enter Subject Name");
document.form1.subname.focus();
return false;
}
return true;
}
</script>

<h3 class="card-title">Add Subject</h3>
          <hr>
          <form name="form1" method="post" onSubmit="return check();">
            <div class="form-group">
              <label for="subname" >Enter Subject Name</label>
              <input type="text" name="subname" id="subname" class="form-control">
            </div>
            <input type="submit" value="Add" name="submit" class="btn btn-success btn-lg">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

         