<?php 
 require("functions.php");
 $catName = "Tundmatu Kiisu";
 $notice = null;
 $cats = null;
 $catTail = null;
 $combined = createAndFetchCats(null, null, null);
 $combinedSplit = null;
 
 if (isset($_POST["catname"])){
	 $catName = $_POST["catname"];
 }
 

 if (isset($_POST["submitCatData"])){
	if (!empty($_POST["catname"] and !empty($_POST["catcolor"] and !empty($_POST["taillength"])))){
		$message = test_input($_POST["catname"]);
		$notice = saveamsg($message);
		$combined = createAndFetchCats($catName, $catColor, $catTail);
	} else {
		$notice = "palun sisesta kassi andmed";
		$combined = createAndFetchCats(null, null, null);
	}
 }
 if (!empty($combined)){ // Parse received string for cats and notice
		$combinedSplit = explode('|', $combined);
 }
 $notice = $combinedSplit[1]; // Notice comes after cats
	$cats = $combinedSplit[0];
	
 ?>
 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>
<?php
	echo $catName;
	echo " ";
	echo "<ol>" . $cats . "</ol>"; 
?>
</title>
</head>

<body>
<h1>
<?php
	echo $catName;
?>
</h1>
<p>See leht on valminud <a href="https://www.tlu.ee/">TLÜ</a> õppetöö raames ja ei oma mõtestatud või muul moel väärtuslikku sisu. </p>
<hr>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>Kiisu nimi: </label>
<input type="text" name="catname">
<select name="catcolor">
  <option value="1">must</option>
  <option value="2">valge</option>
  <option value="3">oranž</option>
  <option value="4">hall</option>
  <option value="5">pruun</option>
  <option value="6">kirju</option>
</select>
<label>Saba pikkus (cm): </label>
<input type="number" min="0" max="100" value="20" name="taillength">
<input type="submit" name="submitCatData" value="Saada andmed">
</form>
<hr>
<p><?php echo $notice; ?></p>
<?php
if (isset($_POST["birthyear"])){
	echo "<p>Olete elanud järgnevatel aastatel:</p> \n";
	echo "<ul> \n";
	for ($i = $_POST["birthyear"]; $i <= date("Y"); $i++){
		echo "<li>" .$i ."</li> \n";
	}
	echo "</ul> \n";
}
?>

</body>

</html> 