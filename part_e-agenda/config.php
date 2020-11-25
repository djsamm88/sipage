<?php
//include_once(dirname(__FILE__) . '/../../application/config/database.php');

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'agendapa_root';
$db['default']['password'] = 'AVENGED7x';
$db['default']['database'] = 'agendapa_eagenda';
$db['default']['dbdriver'] = 'mysql';

$con = mysqli_connect($db['default']['hostname'],$db['default']['username'],$db['default']['password'],$db['default']['database']);
?>