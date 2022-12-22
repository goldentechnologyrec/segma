<?php
$conn = pg_connect("host=192.168.174.128 port=5432  user=caux password=caux dbname=caux");
if(!$conn){
    echo "Database connection failed. Error:".$conn->error;
    exit;
}
?>
