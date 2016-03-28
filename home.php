<?php
	
		session_start();
		if(isset($_SESSION['loginstatus']) && $_SESSION['loginstatus'] == true)
		{
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="football.ico">

		<title>Tippspiel</title>

		<!-- Bootstrap core CSS -->
		<link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Custom styles for this template -->
		<link href="css/cover.css" rel="stylesheet">
	</head>

	<body cz-shortcut-listen="true">

		<div class="site-wrapper">
			<div class="site-wrapper-inner">
				<div class="cover-container">
					<div class="masthead clearfix">
						<div class="inner">
							<h3 class="masthead-brand">Tippspiel</h3>
							<nav>
								<ul class="nav masthead-nav">
									<li class="active"><a id="navHom" href="#">Home</a></li>
									<li><a id="navRes" href="#">Resultate</a></li>
									<li><a id="navTip" href="#">Meine Tipps</a></li>
									<li><a id="navLog" href="index.php">Abmelden</a></li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="cover" id="home">
						<h1>Willkommen zum Tippspiel</h1>
						
					</div>
					<div class="cover" id="results" style="display:none">
						<h1>Resultate</h1>
						
						<div class="input-group">
							<input type="text" class="form-control" id="teamInput">
							<p>Matchday  <select class="form-control" id="selectRes"></select></P>
						</div>
						
						<table id="resTable" class="resultTable"></table>
					</div>
					<div class="cover" id="tipps" style="display:none">
						<h1>Meine Tipps</h1>
						
					</div>
					
					<!--div class="mastfoot">
						<div class="inner">
							<p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
						</div>
					</div-->
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		
		<script src="js/jquery.js"></script>
		<script src="js/data.js"></script>
		
	</body>
</html>
<?php
			}
		else
		{
			header('location: index.php');
		}
	
?>