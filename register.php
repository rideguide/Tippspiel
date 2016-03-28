<?php

require("db_connect.php");

?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
		<link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
	<link href="css/cover.css" rel="stylesheet">

  
  </head>

  <body cz-shortcut-listen="true">

    <div class="container">

      <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Geben Sie ihre Benutzerdaten an</h2>
		
        <label for="inputUser" class="sr-only">Username</label>
        <input type="text" id="inputUser" name="inputUser" class="form-control" placeholder="Username" value="<?php if(isset($_POST['inputUser'])){echo $_POST['inputUser'];}?>">
		
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" >
		
        <label for="inputPassword2" class="sr-only">Password</label>
        <input type="password" id="inputPassword2" name="inputPassword2" class="form-control" placeholder="Password wiederholen" >
		
		<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		
        <input class="btn btn-lg btn-primary btn-block" name="submitRegister" type="submit" value="Registrieren"/>
		
		</div></div>
      </form>
	  <?php
			if(isset($_POST['submitRegister'])){
				
				
				$username = $_POST['inputUser'];
				$password = $_POST['inputPassword'];
				$password2 = $_POST['inputPassword2'];
				
				$username = mysql_real_escape_string($username);
				$password = mysql_real_escape_string($password);
				$password2 = mysql_real_escape_string($password2);
				
				$password = hash('sha256', $password);
				$password2 = hash('sha256', $password2);
				
				if($username == "")
				{
					echo '<p>Bitte Username eingeben</p>';
				}
				else if($password == "")
				{
					echo '<p>Bitte Password eingeben</p>';
				}
				else if($password != $password2)
				{
					echo '<p>Passwörter stimmen nicht überein</p>';
				}
				else
				{
					
					$query = mysql_query("SELECT * FROM users WHERE userName= '$username'");
					$result = mysql_num_rows($query);
					if($result == 1)
					{
						echo '<p>Name existiert bereits</p>';
						
					}
					else
					{
						$query = mysql_query("INSERT INTO users (userName, userPassword) VALUES ('$username', '$password')");
						
						header('location: index.php');
					}
				}
			}
			?>

    </div> <!-- /container -->


</body></html>