<?php
    include('connect.php');
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "select * from utilisateurs where username = '$username' and password = '$password'";
        $result = pg_query($conn, $sql);
        $count = pg_num_rows($result);
        $row = pg_fetch_row($result);
         session_start();
        $_SESSION['role']=$row[2];

        if($count == 1){
                $_SESSION['PROFILE']=$count;
                if (!($_SESSION['role'] == 'administration' )){

                       header("location:affichage.php");
                      }
               else{
                       header("location:index.php");

        }
        }
        else{
           header("location:login_index.php");

        }
    }
?>

