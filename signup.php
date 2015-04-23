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
          <a href="index.html"> <img src="images/Logo.png" alt ="StudyQuiz"/> </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-centre">
            <li class="active"><a href="index.html">Home</a></li>       
            <li><a href="leaderboards.html">Leaderboards</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login/Sign-Up <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Programme Co-Ordinator</li>
                <li><a href="prog_co_login.html">Login </a></li>
                <li><a href="prog_co_signup.html">Sign-Up</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Student</li>
                <li><a href="student_login.html">Login </a></li>
                <li><a href="student_signup.html">Sign-Up</a></li>
              </ul>
            </li>            
            
          </ul>
        </div>
      </div>
    </div> 


      <div class="container">
					<table class="table table-bordered table-striped">
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/login/config.php'); 
 
$sOutput .= '<div id="register-body">'; 
 
if (isset($_GET['action'])) { 
  switch (strtolower($_GET['action'])) { 
    case 'register': 
      // If the form was submitted lets try to create the account. 
      if (isset($_POST['username']) && isset($_POST['password'])) { 
        if (createAccount($_POST['username'], $_POST['password'])) { 
          $sOutput .= '<h1>Account Created</h1><br />Your account has been created.  
                You can now login <a href="index.php">here</a>.'; 
        }else { 
          // unset the action to display the registration form. 
          unset($_GET['action']); 
        }         
      }else { 
        $_SESSION['error'] = "Username and or Password was not supplied."; 
        unset($_GET['action']); 
      } 
    break; 
  } 
} 
 
// If the user is logged in display them a message. 
if (loggedIn()) { 
  $sOutput .= '<h2>Already Registered</h2> 
        You have already registered and are currently logged in as: ' . $_SESSION['username'] . '. 
        <h4>Would you like to <a href="index.php?action=logout">logout</a>?</h4> 
        <h4>Would you like to go back to the <a href="index.php">Home Screen</a>?</h4>'; 
         
// If the action is not set, we want to display the registration form 
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
   
  $sOutput .= '<h2>Register for this site</h2> 
    ' . $sError . ' 
    <form name="register" method="post" action="' . $_SERVER['PHP_SELF'] . '?action=register"> 
      Username: <input type="text" name="username" value="' . $sUsername . '" /><br /> 
      Password: <input type="password" name="password" value="" /><br /><br /> 
      <input type="submit" name="submit" value="Register!" /> 
    </form> 
    <br /> 
    <h4>Would you like to <a href="index.php">login</a>?</h4>'; 
} 
 
$sOutput .= '</div>'; 
 
// display our output. 
echo $sOutput; 
?>
					</table>
				</div>
    		</div>
    	</div>
    </div>
		    
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