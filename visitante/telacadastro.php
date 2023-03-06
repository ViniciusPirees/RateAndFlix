<?php

session_start(); //CERTO VISITANTE
if (isset($_SESSION['usuario'])) {
  if ($_SESSION['UsuNivel'] == 'A') {
    header('location: ../admin/index.php');
  } else {
    header('location: ../usuario/index.php');
  }
}

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
                <h2>Olá! Para continuar, digite as informações abaixo</h2>
            </div>
            <div class="form">
                <form action="../controle/cadastro.php" method="POST">
            
                    <div class="field">
                        <div class="control">
                            <input name="nome" class="input"  placeholder="Nome">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input name="sobnome" class="input"placeholder="Sobrenome">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input name="email" class="input" placeholder="Email">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input name="login" name="text" class="input" placeholder="Nome do Usuário">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input name="senha" class="input" type="password" placeholder="Senha">
                        </div>
                    </div>

                    <div style="display: flex;">
                        <div style="width: 50%; margin-top: 2%;">
                                    </div>
                        <div style="width: 50%">
                            <button type="submit" class="btnEntrar">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
           
        </div>
    </body>

    </html>