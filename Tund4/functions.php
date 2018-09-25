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
//teksti sisendi kontrollimine
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>