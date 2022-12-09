<?php
    include('connection.php');
    if (isset($_POST['submit'])) {
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];

        $sql = "select * from utilisateurs where pseudo = '$pseudo' and password = '$password'";  
        $result = pg_query($conn, $sql);  
        $row = pg_fetch_array($result);  
        $count = pg_num_rows($result);  


        if($count == 1){  
            header("Location: index.php");
        }  
        else{  
            echo  '<script>
                        window.location.href = "page_connexion.php";
                        alert("Login ou mot de passe incorrect")
                    </script>';
        }     
    }
    ?>
