<?php


require_once("IP.php");

$bdd = pg_connect("host=$host port=5432  user=caux password=caux dbname=caux");
if(!$bdd){
    echo "Database connection failed. Error:".$bdd->error;
    exit;
}
?>

