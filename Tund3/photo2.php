 <?php 
 //echo "See on minu esimene php!";
 $firstName = "Kelly";
 $lastName = "Reinmaa";
 
 //juhusliku pildi valimine
$dirToRead = "../../pics/";
$allFiles = scandir($dirToRead);
$picRandom = mt_rand(2,7);
$picFile = $allFiles[$picRandom];
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
</p>

<?php
	echo '<img src="' . $dirToRead . $picFile . '" alt="Pilt">';
?>
</body>

</html> 