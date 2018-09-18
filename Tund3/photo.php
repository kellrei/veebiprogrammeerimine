 <?php 
 //echo "See on minu esimene php!";
 $firstName = "Kelly";
 $lastName = "Reinmaa";
 
 //loeme kataloogi sisu
 $dirToRead = "../../pics/";
 $allFiles = scandir($dirToRead);
 //var_dump($allFiles);
 $picFiles = array_slice($allFiles, 2);
 //var_dump($picFiles);
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
for($i = 0; $i < count($picFiles); $i ++) {
echo '<img src="' .$dirToRead .$picFiles[$i] .'" alt="pilt" width="300" height="200">';
}
?>
</body>

</html> 