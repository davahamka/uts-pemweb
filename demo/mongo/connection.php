<?php
require_once '../vendor/autoload.php';

$mongostring = 'mongodb://pemweb:kelompok6@ec2-18-204-3-17.compute-1.amazonaws.com:27017/dbpemweb?authSource=dbpemweb&readPreference=primary&appname=MongoDB%20Compass&ssl=false';

$client = new MongoDB\Client($mongostring);


$collection = $client->dbpemweb->tweets;

?>