<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/favicon-32x32.png" type="image/x-icon">
        
        <script src="https://kit.fontawesome.com/e63370a9b2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Sistema de Cadastro e Consulta | SCC</title>
    </head>
    <body class="body_scc">

    <a href="index.php" style="color: red;">
        <i class="fas fa-arrow-alt-circle-left fa-3x"></i>
    </a>
    <div class="tela_login">
        <div class="tela-login">
            <h1>Login</h1>
            <form action="controller.php?acao=login" method="post">
                <input type="email" placeholder="E-mail" name="email">
                <br><br>
                <input type="password" placeholder="Senha" name="senha">
                <br><br>
                <button>Entrar</button>

                <?php if(isset($_GET['erro']) && $_GET['erro'] == 1) { ?>
                    <div class="alerta">
                        E-mail ou senha incorreto(s)
                    </div>
                <?php } ?>

                <?php if(isset($_GET['erro']) && $_GET['erro'] == 2) { ?>
                    <div class="alerta">
                        Logue-se primeiro
                    </div>
                <?php } ?>
            </form>
        </div>
        
    </body>
</html>