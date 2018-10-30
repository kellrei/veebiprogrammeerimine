 <?php 
 //lisan teisi php faili
 require("functions.php");
 $firstName = "Tundmatu";
 $lastName = "Kodanik";
 $fullName = "";
 $birthMonth = date("m");
 $monthNames = ["Jaanuar", "Veebruar", "Märts", "Aprill", "Mai", "Juuni", "Juuli", "August", "September", "Oktoober", "November", "Detsember"];
 $monthAmount = count($monthNames);
 
 //püüan POST andmed kinni
 //var_dump($_POST);
 if (isset($_POST["firstname"])){
	 $firstName = test_input($_POST["firstname"]);
 }
 if (isset($_POST["lastname"])){
	 $lastName = test_input($_POST["lastname"]);
 }
 

//väga mõttetu funktsioon
function stupidfunction() {
		$GLOBALS["fullName"] = $GLOBALS["firstName"] ." " .$GLOBALS["lastName"];
}
stupidfunction();


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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>Eesnimi: </label>
<input type="text" name="firstname">
<label>Perekonnanimi: </label>
<input type="text" name="lastname">
<label>Sünnikuu: </label>
<?php
echo '<select name="birthMonth">' ."\n";
for ($i = 1; $i < 13; $i++) {
	echo '<option value="' .$i .'"';
	if ($i == $birthMonth) {
		echo " selected";
	}
	echo ">" .$monthNames[$i - 1] . "</option> \n";
}
echo "</select> \n";
?>
<label>Sünniaasta: </label>
<input type="number" min="1914" max="2000" value="2000" name="birthyear">

<input type="submit" name="submitUserData" value="Saada andmed">
</form>
<hr>
<?php
if (isset($_POST["birthyear"])){
	echo "<h2>" .$fullName . "</h2>";
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