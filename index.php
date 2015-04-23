<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="StudyQuiz.com">
    <meta name="author" content="StudyQuiz">
    <title>StudyQuiz - Homepage</title>
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>

  <body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.php"> <img src="images/Logo.png" alt ="StudyQuiz"/> </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-centre">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="leaderboards.html">Leaderboards</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quizzes <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="quiz3.html">History </a></li>
                <li><a href="quiz1.html">Geography</a></li>
                <li><a href="quiz2.html">Science</a></li>
              </ul>
            </li>
            
          </ul>
        </div>
      </div>
    </div>
        <div class="container">
        <div class="jumbotron text-center">
            <h1>StudyQuiz</h1>
            <p>Welcome to StudyQuiz start your journey today.</p>
		<hr/>
		<h3>
		StudyQuiz is a multi-choice quiz which is aimed for secondary school students in 1st year. 
		The quiz will have 10 questions for each individual student and will be presented with a score at the end of the quiz. 
		The quiz provides competitiveness between the users by having a leader board which makes it fun for students to take. 
		</h3>
        </div>
        </div>

					<div class="panel-heading">
						<h3 class="panel-title">Login with your information here.</h3>
					</div>
					<table class="table table-bordered table-striped">
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/login/config.php'); 
 
// If the user is logging in or out 
// then lets execute the proper functions 
if (isset($_GET['action'])) { 
  switch (strtolower($_GET['action'])) { 
    case 'login': 
      if (isset($_POST['username']) && isset($_POST['password'])) { 
        // We have both variables. Pass them to our validation function 
        if (!validateUser($_POST['username'], $_POST['password'])) { 
          // Well there was an error. Set the message and unset 
          // the action so the normal form appears. 
          $_SESSION['error'] = "Bad username or password supplied."; 
          unset($_GET['action']); 
        } 
      }else { 
        $_SESSION['error'] = "Username and Password are required to login."; 
        unset($_GET['action']); 
      }       
    break; 
    case 'logout': 
      // If they are logged in log them out. 
      // If they are not logged in, well nothing needs to be done. 
      if (loggedIn()) { 
        logoutUser(); 
        $sOutput .= '<h1>Logged out!</h1><br />You have been logged out successfully.  
            <br /><h4>Would you like to go back to the <a href="index.php">Home Screen</a>?</h4>'; 
      }else { 
        // unset the action to display the login form. 
        unset($_GET['action']); 
      } 
    break; 
  } 
} 
 
$sOutput .= '<div id="index-body">'; 
 
// See if the user is logged in. If they are greet them  
// and provide them with a means to logout. 
if (loggedIn()) { 
  $sOutput .= '<h1>Logged In!</h1><br /><br /> 
    Hello, ' . $_SESSION["username"] . ' how are you today?<br /><br /> 
    <h4>Would you like to <a href="index.php?action=logout">logout</a>?</h4> 
    <h4>Would you like to go to the <a href="quizzes.html">Quizzes</a>?</h4>'; 
}elseif (!isset($_GET['action'])) { 
  // incase there was an error  
  // see if we have a previous username 
  $sUsername = ""; 
  if (isset($_POST['username'])) { 
    $sUsername = $_POST['username']; 
  } 
   
  $sError = ""; 
  if (isset($_SESSION['error'])) { 
    $sError = '<span id="error">' . $_SESSION['error'] . '</span><br />'; 
  } 
   
  $sOutput .= '<h2>Login to our site</h2><br /> 
    <div id="login-form"> 
      ' . $sError . ' 
      <form name="login" method="post" action="index.php?action=login"> 
        Username: <input type="text" name="username" value="' . $sUsername . '" /><br /> 
        Password: <input type="password" name="password" value="" /><br /><br /> 
        <input type="submit" name="submit" value="Login!" /> 
      </form> 
    </div> 
    <h4>Would you like to <a href="index.php">login</a>?</h4> 
    <h4>Create a new <a href="signup.php">account</a>?</h4>'; 
} 
 
$sOutput .= '</div>'; 
 
// lets display our output string. 
echo $sOutput; 
?>
					</table>		
		
 

    <div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
        <div class="container">
            <div class="navbar-text pull-left">
                <p>© 2015 StudyQuiz</p>
            </div>
            <div class="navbar-text pull-right">
                <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                <a href="#"><i class="fa fa-youtube-square fa-2x"></i></a>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
