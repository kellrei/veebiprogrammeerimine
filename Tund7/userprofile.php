 <?php
  require("functions.php");
  //kui pole sisse loginud
  if(!isset($_SESSION["userId"])){
	  header("Location: index_2.php");
	  exit();
  }
  
  //väljalogimine
  if(isset($_GET["logout"])){
	session_destroy();
	header("Location: index_2.php");
	exit();
  }
  
  //Get profile details
	$profiledetails = getuserprofile($_SESSION["userId"]);
	//print_r($profiledetails);
	
	// Use profile values if they exist
	if ($profiledetails != null){
		if ($profiledetails[0] != null){
			$descriptiontext = $profiledetails[0];
			// Session variable not needed
		}
		
		if ($profiledetails[1] != null){
			$textcolor = $profiledetails[1];
			$_SESSION["textcolor"] = $textcolor;
		}
		
		if ($profiledetails[2] != null){
			$bgcolor = $profiledetails[2];
			$_SESSION["bgcolor"] = $bgcolor;
		}
	}
	
	// Set profile details on submit
	if (isset($_POST["setUserProfile"])){
		$description = test_input($_POST["description"]);
		setuserprofile($_SESSION["userId"], $description, $_POST["textcolor"], $_POST["bgcolor"]);
		
		// Show sent data on the page
		if (isset($_POST["description"])){
			$mydescription = $_POST["description"];
		}
		else {
			$mydescription = "Pole iseloomustust lisanud.";
		}
		
		if (isset($_POST["textcolor"])){
			$textcolor = $_POST["textcolor"];
			$_SESSION["textcolor"] = $textcolor;
		}
		else {
			$textcolor = "#000000";
		}
		if (isset($_POST["bgcolor"])){
			$bgcolor = $_POST["bgcolor"];
			$_SESSION["bgcolor"] = $bgcolor;
		}
		else {
			$bgcolor = "#ffffff";
		}	
	}
  
  $userslist = listusers();
  $mydescription = userdescription();
  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<title>
	  <?php
	    echo $_SESSION["userFirstName"];
		echo " ";
		echo $_SESSION["userLastName"];
	  ?>
	, õppetöö</title>
	<style>
			body {
				background-color: <?php echo $_SESSION["bgcolor"]; ?>;
				color: <?php echo $_SESSION["textcolor"]; ?>
			} 
	</style>
  </head>
  <body>
    <h1>
	  <?php
	    echo $_SESSION["firstName"] ." " .$_SESSION["lastName"];
	  ?>
	</h1>
	<p>See leht on valminud <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames ja ei oma mingisugust, mõtestatud või muul moel väärtuslikku sisu.</p>
	<hr>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label>Kirjeldus (max 300 märki):</label>
			<br>
			<textarea name="description" rows="4" cols="64" maxlength="300"><?php echo $mydescription; ?></textarea>
			<br>
			<label>Teksti värv:</label>
			<input type="color" name="textcolor" value="<?php echo $textcolor; ?>">
			<br>
			<label>Tausta värv:</label>
			<input type="color" name="bgcolor" value="<?php echo $bgcolor; ?>">
			</br>
			<input type="submit" name="setUserProfile" value="Salvesta profiil">
		</form>

	<ul>
	  <li><a href="?logout=1">Logi välja</a>!</li>
	  <li><a href="main.php">Tagasi pealehele</a></li>
	</ul>
	<hr>
	<?php echo $userslist; ?>
	
  </body>
</html>