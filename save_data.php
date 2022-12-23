<?php 
include ('connect.php');
extract($_POST);

$query = pg_query($conn,"INSERT INTO authors (first_name,last_name,email,telephone,groupes) VALUES ('{$first_name}','{$last_name}','{$email}','{$telephone}','{$groupes}')");
if($query){
    $resp['status'] = 'success';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}

echo json_encode($resp);
