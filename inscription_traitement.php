<!DOCTYPE html>
<html>
<div>
<p class="text-center"><a href="login_index.php">Retour à l'acceuil</a></p>

</div>


</html>

<?php
require_once('connect.php');
extract($_POST);

$query = pg_query($conn,"INSERT INTO utilisateurs (username, password, role) VALUES ('{$username}','{$password}','{$role}')");



if($query){
        echo "CREATION DU USER REUSSIE ";

}else{
        echo ' UNE ERREUR EST SURVENUE LORS DE LA CREATION DU USER ';

        }


#echo json_encode($resp);
