
<!DOCTYPE html>
<html>
<div>
<p class="text-center"><a href="page_connexion.php">Retour à l'acceuil</a></p>

</div>


</html>

<?php
require_once('config.php');
extract($_POST);

$query = pg_query($bdd,"INSERT INTO utilisateurs (pseudo, email, password, ip, token) VALUES ('{$pseudo}','{$email}','{$password}','{$ip}','{$token}')");



if($query){
	echo "CREATION DU USER REUSSIE ";
	 
}else{ 
	echo ' UNE ERREUR EST SURVENUE LORS DE LA CREATION DU USER ';

	}


#echo json_encode($resp);



