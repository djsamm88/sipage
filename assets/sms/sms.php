<?php 

$db = new mysqli("localhost","root","AVENGED7","gammu_1320");

if(isset($_GET['no_hp']) && isset($_GET['text']))
{
	$no_hp 	= $_GET['no_hp'];
	$text 	= $_GET['text'];
	
	$db->query("INSERT INTO `outbox` SET `DestinationNumber`='$no_hp', `TextDecoded`='$text'");
}


//"INSERT INTO `outbox` SET `DestinationNumber`='$DestinationNumber', `TextDecoded`='$TextDecoded' "


//INSERT INTO `outbox` SET `DestinationNumber`='4444', `TextDecoded`='REG'