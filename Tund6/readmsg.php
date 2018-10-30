 <?php 
 require("functions.php");
$notice = readallmessages();
 ?>
 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Anonüümsed sõnumid</title>
</head>
<body>
<h1>Sõnumid</h1>
<p>See leht on valminud <a href="https://www.tlu.ee/">TLÜ</a> õppetöö raames ja ei oma mõtestatud või muul moel väärtuslikku sisu. </p>
<hr>
<hr>
<?php echo $notice; ?>
</body>

</html> 