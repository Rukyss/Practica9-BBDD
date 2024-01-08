<?php

session_start();

?>

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../estilos/estiloindex.css">
        <link rel="stylesheet" type="text/css" href="../estilos/overhang.min.css" />
        <title>Title Page</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
    <h2>Bienvenido SOcio</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            


        
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/overhang.min.js"></script>
    
   

    </body>
</html>
