<?php

require("db_connect.php");
session_start();
session_unset();
session_destroy();
$_SESSION = array();
session_start();

?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Tippspiel</title>

    <!-- Bootstrap core CSS -->
		<link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
	<link href="css/cover.css" rel="stylesheet">

  
  </head>

  <body cz-shortcut-listen="true">

    <div class="container">

      <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUser" class="sr-only">Email address</label>
        <input type="text" id="inputUser" name="inputUser" class="form-control" placeholder="Username" value="<?php if(isset($_POST['inputUser'])){echo $_POST['inputUser'];}?>">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" >
		<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		
        <input class="btn btn-lg btn-primary btn-block" name="submitLogin" type="submit" value="Sign in"/>
		<label>OR</label>
		<a href="register.php"><input class="btn btn-lg btn-primary btn-block" value="Register" type="button" /></a>
		</div></div>
      </form>
	  <?php
			if(isset($_POST['submitLogin'])){
				
				
				$username = $_POST['inputUser'];
				$password = $_POST['inputPassword'];
				
				$username = mysql_real_escape_string($username);
				$password = mysql_real_escape_string($password);
				
				
				
				if($username == "")
				{
					echo '<p>Bitte Username eingeben</p>';
				}
				else if($password == "")
				{
					echo '<p>Bitte Password eingeben</p>';
				}
				else
				{
					$password = hash('sha256', $password);
					$query = mysql_query("SELECT * FROM users WHERE userName= '$username' AND userPassword='$password'");
					$result = mysql_num_rows($query);
					if($result == 1)
					{
						$_SESSION['loginstatus'] = true;
						$query = mysql_query("SELECT userID_PS, userName FROM users WHERE userName= '".$username."'");
						$row = mysql_fetch_object($query);
						$_SESSION['username'] = $row->userName;
						$_SESSION['userid'] = $row->userID_PS;
						header('location: home.php');
					}
					else
					{
						echo '<p>Falscher Name oder Falsches Passwort </p>';
					}
				}
			}
			?>

    </div> <!-- /container -->


</body></html>