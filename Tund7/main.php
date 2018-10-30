 <?php
  require("functions.php");
  // kui pole sisse loginud
  if(!isset($_SESSION["userId"])){
	  header("Location: index_2.php");
	  exit();
  }
  //Välja logimine
  if(isset ($_GET["logout"])){
	  session_destroy(); 
	  header("Location: index_2.php");
	  exit();
  }
  
  //Get profile details
	$profiledetails = getuserprofile($_SESSION["userId"]);
	//print_r($profiledetails);
	
	// Use profile values if they exist
	if ($profiledetails != null){
		if ($profiledetails[1] != null){
			$_SESSION["textcolor"] = $profiledetails[1];
		}
		
		if ($profiledetails[2] != null){
			$_SESSION["bgcolor"] = $profiledetails[2];
		}
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<title>Pealeht</title>
	<style>
			body {
				background-color: <?php echo $_SESSION["bgcolor"]; ?>;
				color: <?php echo $_SESSION["textcolor"]; ?>
			} 
	</style>
  </head>
  <body>
    <h1>Pealeht</h1>
	<p>See leht on valminud <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames ja ei oma mingisugust, mõtestatud või muul moel väärtuslikku sisu.</p>
	<hr>
	<p>Olete sisse loginud nimega: 
	<?php
	echo $_SESSION["firstName"] ." " .$_SESSION["lastName"];
	?>
	</p>
	<ul>
	<li><a href="?logout=1">Logi välja</a></li>
	<li>Valideeri anonüümseid <a href="validatemsg.php">sõnumeid</a></li>
	<li>Vaata valideeritud sõnumeid <a href="validatedmessages.php">valideerijate kaupa</a></li>
	<li><a href="userprofile.php">Profiil</a></li>
	<li><a href="users.php">Süsteemi kasutajad</a>.</li>
	</ul>
	
  </body>
</html>