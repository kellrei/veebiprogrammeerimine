 <?php 
 //echo "See on minu esimene php!";
 $firstName = "Tundmatu";
 $lastName = "Kodanik";
 $currentMonth = date("m");
 $monthNames = ["Jaanuar", "Veebruar", "Märts", "Aprill", "Mai", "Juuni", "Juuli", "August", "September", "Oktoober", "November", "Detsember"];
 $monthAmount = count($monthNames);
 
 //püüan POST andmed kinni
 //var_dump($_POST);
 if (isset($_POST["firstname"])){
	 $firstName = $_POST["firstname"];
 }
 if (isset($_POST["lastname"])){
	 $lastName = $_POST["lastname"];
 }
 ?>
 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>
<?php
	echo $firstName;
	echo " ";
	echo $lastName;
?>
, õppetöö</title>
</head>

<body>
<h1>
<?php
	echo $firstName ." " .$lastName;
?>
</h1>
<p>See leht on valminud <a href="https://www.tlu.ee/">TLÜ</a> õppetöö raames ja ei oma mõtestatud või muul moel väärtuslikku sisu. </p>
<hr>
<form method="POST">
<label>Eesnimi: </label>
<input type="text" name="firstname">
<label>Perekonnanimi: </label>
<input type="text" name="lastname">
<label>Sünniaasta: </label>
<input type="number" min="1914" max="2000" value="2000" name="birthyear">
<select name="birthMonth">
  <option value="1">jaanuar</option>
  <option value="2">veebruar</option>
  <option value="3">märts</option>
  <option value="4">aprill</option>
  <option value="5">mai</option>
  <option value="6">juuni</option>
  <option value="7">juuli</option>
  <option value="8">august</option>
  <option value="9" selected>september</option>
  <option value="10">oktoober</option>
  <option value="11">november</option>
  <option value="12">detsember</option>
</select>
<input type="submit" name="submitUserData" value="Saada andmed">
</form>
<hr>
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