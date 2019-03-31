<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
    <link rel="stylesheet" href="quiz.css">
  <header id="main-header" class="py-2 bg-danger text-white">
        <div class="text-align-middle">
          <img src="image/quizzy.jpg" alt="" class="mx-4 mb-3 mt-4 rounded-circle d-inline" width="100" height="100">
          <span class="display-4"><strong>Quizzy</strong> - A Web App</span>
          </div>
  </header> 
  <?php @$_SESSION['login'];
  error_reporting(1);
  ?>
  
  <?php


	if(isset($_SESSION['login']))
	{
	 echo "<div align=\"right\" class=\"pt-2 bg-light mb-1\"><span class=\"bg-danger text-white px-3 py-2 mr-3 mb-2 rounded\">Welcome </span><a href=\"index.php\" class=\"btn btn-outline-danger mr-3 mb-1\"><i class=\"fa fa-user\"></i>Home</a><a href=\"signout.php\" class=\"btn btn-outline-danger mr-3 mb-1\"><i class=\"fa fa-user-times\"></i>Signout</a></div>";
	 }
	 else
	 {
	 	echo "&nbsp;";
	 }
	?>
   
  
  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
