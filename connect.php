<?php
$conn = pg_connect("host=192.168.193.139 port=5432  user=emega password=omega dbname=omega");
if(!$conn){
    echo "Database connection failed. Error:".$conn->error;
    exit;
}
?>
