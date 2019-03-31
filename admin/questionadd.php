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


if (!isset($_SESSION[alogin]))
{
	echo '<div class="alert alert-danger text-center p-3 mt-3 mx-3"><h2>You are not Logged In ... Please Login to Access this Page</h2></div>
  <a href="index.php" class="btn btn-primary mt-3 mx-3"></i>Click Here To Login</a> 
  ';
  exit();
}
echo '<div id="main-content">
<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="card bg-dark text-white mb-5">
        <img src="../image/question.png" alt="" class="rounded-circle mx-auto img-fluid img-style" width="200" height="200">
        <div class="card-body">
        <h3 class="card-title">Add Question</h3>
          <hr>';
if($_POST[submit]=='Save' || strlen($_POST['testid'])>0 )
{
extract($_POST);
mysqli_query($cn,"insert into mst_question(test_id,que_desc,ans1,ans2,ans3,ans4,true_ans) values ('$testid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')") or die(mysqli_error($cn));
echo "<div class=\"alert alert-success text-center p-3 mt-3 mx-3 alert-dismissable\"><button class=\"close\"type=\"button\" data-dismiss=\"alert\"><span>&times;</span></button><h2>Question Added Successfully</h2></div>";
unset($_POST);
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.addque.value;
if (mt.length<1) {
alert("Please Enter Question");
document.form1.addque.focus();
return false;
}
a1=document.form1.ans1.value;
if(a1.length<1) {
alert("Please Enter Answer 1");
document.form1.ans1.focus();
return false;
}
a2=document.form1.ans2.value;
if(a1.length<1) {
alert("Please Enter Answer 2");
document.form1.ans2.focus();
return false;
}
a3=document.form1.ans3.value;
if(a3.length<1) {
alert("Please Enter Answer 3");
document.form1.ans3.focus();
return false;
}
a4=document.form1.ans4.value;
if(a4.length<1) {
alert("Please Enter Answer 4");
document.form1.ans4.focus();
return false;
}
at=document.form1.anstrue.value;
if(at.length<1) {
alert("Please Enter True Answer");
document.form1.anstrue.focus();
return false;
}
return true;
}
</script>

 <form name="form1" method="post" onSubmit="return check();">
            <div class="form-group">
              <label for="testid" >Enter Test Name</label>
              <select name="testid" class="form-control" id="testid">
<?php
$rs=mysqli_query($cn,"Select * from mst_test order by test_name");
	  while($row=mysqli_fetch_array($rs))
{
if($row[0]==$testid)
{
echo "<option value='$row[0]' selected>$row[2]</option>";
}
else
{
echo "<option value='$row[0]'>$row[2]</option>";
}
}
?>
     </select>
            </div>
            <div class="form-group">
              <label for="addque">Enter Question</label>
              <textarea name="addque" id="addque" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <input type="text" name="ans1" id="ans1" type="text" class="form-control" placeholder="Enter Answer 1">
            </div>
            <div class="form-group">
              <input type="text" name="ans2" id="ans2" type="text" class="form-control" placeholder="Enter Answer 2">
            </div>
            <div class="form-group">
              <input type="text" name="ans3" id="ans3" type="text" class="form-control" placeholder="Enter Answer 3">
            </div>
            <div class="form-group">
              <input type="text" name="ans4" id="ans4" type="text" class="form-control" placeholder="Enter Answer 4">
            </div>
            <div class="form-group">
              <input type="text" name="anstrue" id="anstrue" type="text" class="form-control" placeholder="Enter True Answer No.">
            </div>
            <input type="submit" value="Add" name="submit" class="btn btn-success btn-lg px-4">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>      

<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('addque');
  </script>


         
              
              
          