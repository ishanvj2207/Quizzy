<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
<?php
session_start();
error_reporting(1);
if (!isset($_SESSION['alogin']))
{
	echo '<div class="alert alert-danger text-center p-3 mt-3 mx-3"><h2>Subject Already Exists..</h2></div>
  <a href="login.php" class="btn btn-primary mt-3 mx-3"><i class="fas fa-arrow-left mr-2"></i>Go Back To Home</a> 
  ';
  exit();
}
?>

<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php
require("../database.php");

include("header.php");


echo '<div id="main-content">
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="card bg-dark text-white mb-5">
        <img src="../image/test.png" alt="" class="rounded-circle mx-auto img-fluid img-style" width="200" height="200">
        <div class="card-body">
        <h3 class="card-title">Add Test</h3>
          <hr>';
if($_POST[submit]=='Save' || strlen($_POST['subid'])>0 )
{
extract($_POST);
mysqli_query($cn,"insert into mst_test(sub_id,test_name,total_que) values ('$subid','$testname','$totque')") or die(mysqli_error($cn));
echo "<div class=\"alert alert-success text-center p-3 mt-3 mx-3 alert-dismissable\"><button class=\"close\"type=\"button\" data-dismiss=\"alert\"><span>&times;</span></button><h2>Test <strong>$testname</strong> Added Successfully</h2></div>";
unset($_POST);
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.testname.value;
if (mt.length<1) {
alert("Please Enter Test Name");
document.form1.testname.focus();
return false;
}
tt=document.form1.totque.value;
if(tt.length<1) {
alert("Please Enter Total Question");
document.form1.totque.value;
return false;
}
return true;
}
</script>
<form name="form1" method="post" onSubmit="return check();">
            <div class="form-group">
              <label for="subid" >Enter Subject ID</label>
              <select name="subid" class="form-control">
<?php
$rs=mysqli_query($cn,"Select * from mst_subject order by  sub_name");
	  while($row=mysqli_fetch_array($rs))
{
if($row[0]==$subid)
{
echo "<option value='$row[0]' selected>$row[1]</option>";
}
else
{
echo "<option value='$row[0]'>$row[1]</option>";
}
}
?>
</select>
            </div>
            <div class="form-group">
               <input type="text" name="testname" id="testname" type="text" placeholder="Enter Test Name" class="form-control">
            </div>
            <div class="form-group">
               <input type="text" name="totque" id="totque" type="text" placeholder="Enter Total Question" class="form-control">
            </div>
            <input type="submit" value="Add" name="submit" class="btn btn-success btn-lg">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>      
          
               
              
