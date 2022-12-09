<?php

require_once("IP.php");
$conn = pg_connect("host=$host port=5432  user=caux password=caux dbname=caux");
if(!$conn){
    echo "Database connection failed. Error:".$conn->error;
    exit;
}
?>
