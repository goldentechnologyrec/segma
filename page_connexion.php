<?php
    include("connection.php");
    include("login.php")
    ?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Connexion</title>
        </head>
        <body>
        
        <div class="login-form">
            
           <form name="form" action="login.php" onsubmit="return isvalid()" method="POST">
                <h2 class="text-center">Connexion</h2>       
		<div class="form-group">

                <label>Username: </label>
                <input type="text" id="pseudo" name="pseudo"></br></br>
                <label>Password: </label>
		<input type="password" id="password" name="password"></br></br>
                <input type="submit" id="btn" class="btn btn-primary btn-block" value="Connexion" name="submit" />
                </div>
            
            </form>
    <!--        <p class="text-center"><a href="inscription.php">Inscription</a></p>   -->
        </div>
        <style>
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>
        </body>
</html>
