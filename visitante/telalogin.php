<?php

session_start(); //CERTO VISITANTE


?>
<!DOCTYPE html>
<lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rate and Flix - O seu principal site de notícias sobre entretenimento e muito mais</title>
        <link href="../css/stylemain.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Rancho&family=Roboto:wght@500&display=swap" rel="stylesheet">
    </head>

    <body>
        <h1 class="login">Rate & Flix</h1>
        <div class="teladelogin">
            <div class="titleform">
                <h2>Olá! Para continuar, digite o seu e-mail e senha</h2>
            </div>
            <div class="form">
                <form action="../controle/login.php" method="POST">
                    <div class="field">
                        <div class="control">
                            <input name="UsuLogin" name="text" class="input" placeholder="Seu usuário">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input name="UsuSenha" class="input" type="password" placeholder="Sua senha">
                        </div>
                    </div>
                    <div style="display: flex;">
                        <div style="width: 50%; margin-top: 2%;">
                            <a style="font-size: 14px; color: black; text-decoration: none" href="a.html">Esqueceu a senha?</a>
                        </div>
                        <div style="width: 50%">
                            <button type="submit" class="btnEntrar">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <div class="titleform">
                <a href='telacadastro.php'> <h2>Ainda não é cadastrado?</h2> </a>
            </div>
        </div>
    </body>

    </html>