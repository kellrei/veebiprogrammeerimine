<?php
require ("../../../config.php");
$database = "if18_kelly_re_1";
//echo $serverHost;

function saveamsg($msg) {
	$notice = "";
	//loome andmebaasiühenduse
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	//valmistan ette andmebaasikäsu
	$stmt = $mysqli->prepare("INSERT INTO VPamsg (message) VALUES (?)");  //$stmt - statement
	echo $mysqli->error;
	//asendan ettevalmistatud käsus küsimärgid päris andmetega
	//esimesena kirja andmetüübid, siis andmed ise
	//s - string, i - integer, d - decimal
	$stmt->bind_param("s", $msg);
	//täidame ettevalmistatud käsu
	if($stmt->execute()){
		$notice = 'Sõnum: "' .$msg .'" on edukalt salvestatud.';
	}else {
			$notice = "Sõnumi salvestamisel tekkis viga: " .$stmt->error;
		}
		//sulgeme ettevalmistatud käsu
		$stmt->close();
		//sulgeme ühenduse
		$mysqli->close();
		return $notice;
	}
	function readallmessages(){
		$notice = "";
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("SELECT message FROM VPamsg");
		echo $mysqli->error;
		$stmt->bind_result($msg);
		$stmt->execute();
		while($stmt->fetch()){
			$notice .= "<p>" .$msg ."</p> \n";
		}
		$stmt->close();
		$mysqli->close();
		return $notice;
	}
	function createAndFetchCats($catName, $catColor, $catTail){
		$notice = null;
		$cats = null;
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		// Insert a cat
		if ($catName != null and $catColor != null){ // Only if there is input
			$stmt = $mysqli -> prepare("INSERT INTO kassid (nimi, v2rv, saba) VALUES(?, ?, ?)");
			echo $mysqli->error;
		
			$stmt -> bind_param("ssi", $catName, $catColor, $catTail);
	
			if($stmt -> execute()){
				$notice = 'Kass ' . $catName . ' on sisestatud!';
			}
			else {
				$notice = 'Kassi sisestamisel esines tõrge: ' . $stmt -> error; // Never displayed, why?
			}
			$stmt -> close();
		}
		else { // Otherwise skip
			$notice = "Kuvan tabelis olevaid kasse.";		
		}
		// Fetch the cats
		$stmt = $mysqli -> prepare("SELECT nimi, v2rv, saba FROM kassid ORDER BY kiisu_id");
		echo $mysqli->error;
		
		$stmt -> bind_result($readCatName, $readCatColor, $readCatTail);
		if($stmt -> execute()){
			// Do nothing if succeeded
		}
		else {
			$notice = 'Kasside saamisel esines tõrge: ' . $stmt -> error; 
		}
		
		while ($stmt -> fetch()){ // Too lazy for a 2-dimensional array, so separating with dashes
			$cats .= "<li>" . $readCatName . " - " . $readCatColor . " - " . $readCatTail . "</li>";
		}
		
		$stmt -> close();
		$mysqli -> close();
		return $cats . "|" . $notice; // Cannot return two variables properly
	}
//teksti sisendi kontrollimine
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>