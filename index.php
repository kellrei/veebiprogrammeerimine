 <?php 
 //echo "See on minu esimene php!";
 $firstName = "Kelly";
 $lastName = "Reinmaa";
 $dateToday = date("d.m.Y");
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
<br>1234</br></p>
<?php
	echo "<p>Tänane kuupäev on: " .$dateToday .".</p>\n";
	echo "<p>Lehe avamise hetkel oli kell " .date("H:i:s") .", käes oli " .$partOfDay .".</p>\n";
?>
<img src="../../~rinde/veebiprogrammeerimine2018s/tlu_terra_600x400_2.jpg" alt="TLÜ Terra õppehoone">
<p>Minu sõber teeb ka <a href="../../~karemin/" target="_blank">veebi</a></p>
</body>

</html> 