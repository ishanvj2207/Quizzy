<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Quizzy </title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
    <link rel="stylesheet" href="quiz.css">
<script language="javascript">
function check()
{

 if(document.form1.lid.value=="")
  {
    alert("Plese Enter Login Id");
	document.form1.lid.focus();
	return false;
  }
 
 if(document.form1.pass.value=="")
  {
    alert("Plese Enter Your Password");
	document.form1.pass.focus();
	return false;
  } 
  if(document.form1.cpass.value=="")
  {
    alert("Plese Enter Confirm Password");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.pass.value!=document.form1.cpass.value)
  {
    alert("Confirm Password does not matched");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.name.value=="")
  {
    alert("Plese Enter Your Name");
	document.form1.name.focus();
	return false;
  }
  if(document.form1.address.value=="")
  {
    alert("Plese Enter Address");
	document.form1.address.focus();
	return false;
  }
  if(document.form1.city.value=="")
  {
    alert("Plese Enter City Name");
	document.form1.city.focus();
	return false;
  }
  if(document.form1.phone.value=="")
  {
    alert("Plese Enter Contact No");
	document.form1.phone.focus();
	return false;
  }
  if(document.form1.email.value=="")
  {
    alert("Plese Enter your Email Address");
	document.form1.email.focus();
	return false;
  }
  e=document.form1.email.value;
		f1=e.indexOf('@');
		f2=e.indexOf('@',f1+1);
		e1=e.indexOf('.');
		e2=e.indexOf('.',e1+1);
		n=e.length;

		if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
		{
			alert("Please Enter valid Email");
			document.form1.email.focus();
			return false;
		}
  return true;
  }
  
</script>
</head>

<body>
<?php
include("header.php");
?>

<div id="main-content">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
      <a href="index.php" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Go To Index</a>
      </div>
      <div class="card col-md-8 ">
      <img src="image/signup.png" alt="" class="rounded-circle mx-auto img-style" width="100" height="100">
        <div class="card-body">
          <h3 class="card-title text-center">New User Signup</h3>
          <hr>
          <form action="signupuser.php" name="form1" method="post" onSubmit="return check();">
          <div class="form-group">
                <input class="form-control"type="text" name="lid" placeholder="Enter Login ID">
            </div>
            <div class="form-group">
                <input class="form-control"type="password" name="pass" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <input class="form-control"type="password" name="cpass" id="cpass" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <input class="form-control"type="text" name="name" id="name"placeholder="Enter Name">
            </div>
            <div class="form-group">
              <textarea name="address" id="address" placeholder="Enter Address" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input class="form-control"type="text" name="city" id="city" placeholder="Enter City">
            </div>
            <div class="form-group">
                <input class="form-control"type="text" name="phone" id="phone"placeholder="Enter Phone">
            </div>
            <div class="form-group">
                <input class="form-control"type="text" name="email" id="name" placeholder="Enter Email">
            </div>
            <input type="submit" value="SignUp" name="submit" class="btn btn-success btn-block">
          </form>
        </div>
      </div>
    </div>
    
  </div>
</div>
 
 <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
</body>
</html>
