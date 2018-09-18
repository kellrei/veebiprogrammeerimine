 <?php 
 //echo "See on minu esimene php!";
 $firstName = "Kelly";
 $lastName = "Reinmaa";
 $dateToday = date("d.m.Y");
 $weekdayToday = date("N");
 $weekdayNamesET = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
 //var_dump($weekdayNamesET);
 //echo $weekdayNamesET [1];
 //echo $weekdayToday;
 $hourNow = date("G");
 $partOfDay = "";
 if ($hourNow < 8) {
	 $partOfDay = "varajane hommik";
 }
 if ($hourNow >= 8 and $hourNow < 16) {
	 $partOfDay = "koolipäev";
 }
 if ($hourNow > 16) {
	 $partOfDay = "loodetavasti vaba aeg";
	 
 }
 //juhusliku pildi valimine
 $picURL = "http://www.cs.tlu.ee/~rinde/media/fotod/TLU_600x400/tlu_";
 $picEXT = ".jpg";
 $picNUM = mt_rand(2,43);
 //echo $picNUM;
 $picFILE = $picURL .$picNUM .$picEXT;
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
<p>See leht on valminud <a href="https://www.tlu.ee/">TLÜ</a> õppetöö raames ja ei oma mõtestatud või muul moel väärtuslikku sisu. 
<p>Teine leht: <a href="photo.php" target="_blank">photo.php</a></p>
<p>Kolmas leht: <a href="page.php" target="_blank">page.php</a></p>
<?php
	//echo "<p>Tänane kuupäev on: " .$dateToday .".</p>\n";
	echo "<p>Täna on " .$weekdayNamesET[$weekdayToday - 1] .", " .$dateToday .".</p> \n";
	echo "<p>Lehe avamise hetkel oli kell " .date("H:i:s") .", käes oli " .$partOfDay .".</p>\n";
?>
<img src="<?php echo $picFILE; ?>" alt="TLÜ Terra õppehoone">
<p>Minu sõber teeb ka <a href="../../../~karemin/" target="_blank">veebi</a></p>
</body>

</html> 