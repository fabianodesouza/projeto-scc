<?php

require 'session_autenticado.php';

if (!empty($_GET['id'])) {

    require 'controller.php';

// echo '<pre>';
// print_r($registro);
// echo '</pre>';
$id = $_SESSION['id'];
$nome = $registro['nome'];
$email = $registro['email'];
$tel = $registro['telefone'];
$sexo = $registro['genero'];
$nascimento = $registro['nascimento'];
$cidade = $registro['cidade'];
$uf = $registro['estado'];
$end = $registro['endereco'];
$senha = $registro['senha'];

}


?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/favicon-32x32.png" type="image/x-icon">

        <!-- Font awesome -->
        <script src="https://kit.fontawesome.com/e63370a9b2.js" crossorigin="anonymous"></script>

        <!-- Estilo -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsivo.css">
        
        <title>Sistema de Cadastro e Consulta | SCC</title>
    </head>
    <body class="body_scc">
        
        <a href="home.php" style="color: red;" class="seta">
            <i class="fas fa-arrow-alt-circle-left fa-2x"></i>
        </a>
       

        <div class="boxFormulario">

            <a href="home.php" title="Voltar pra home" style="color: red;" class="seta">
                <i class="fas fa-arrow-alt-circle-left fa-2x"></i>
            </a>
            <form action="controller.php?acao=editar" method="post">
                <fieldset>
                    <legend><b>Formulário de Cadastro</b></legend>
            
                    <br>
                    <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" 
                    value="<?=$nome?>" required>
                    <label class="labelInput" for="nome">Nome completo</label>
                    <br><br>
                    <div class="inputBox">
                        <input type="password" name="senha" id="senha" class="inputUser" 
                        value="<?=$senha?>" required>
                        <div id="icon" onclick="showHidden()"></div>
                        <label class="labelInput" for="senha">Senha</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="email" name="email" id="email" class="inputUser" 
                        value="<?=$email?>" required>
                        <label class="labelInput" for="email">E-mail</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="tel" name="telefone" id="telefone" class="inputUser" 
                        value="<?=$tel?>" required>
                        <label class="labelInput" for="telefone">Telefone</label>
                    </div>
                    <br>
                    <p>Sexo</p>
                    <input type="radio" name="genero" id="feminino" value="feminino" 
                    <?php echo ($sexo == 'feminino') ? 'checked' : ''?> required>
                    <label for="feminino">Feminino</label>
                    <br>
                    <input type="radio" name="genero" id="masculino" value="masculino" 
                    <?php echo ($sexo == 'masculino') ? 'checked' : ''?> required>
                    <label for="masculino">Masculino</label>
                    <br>
                    <input type="radio" name="genero" id="outro" value="outro" 
                    <?php echo ($sexo == 'outro') ? 'checked' : ''?> required>
                    <label for="outro">Outro</label>

                    <br><br>
                    <label for="nascimento"><b>Data de nascimento</b></label>
                    <input type="date" name="nascimento" id="nascimento" placeholder="dd/mm/aaaa" 
                    value="<?=$nascimento?>"required>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="cidade" id="cidade" class="inputUser" 
                        value="<?=$cidade?>" required>
                        <label class="labelInput" for="cidade">Cidade</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="estado" id="estado" class="inputUser" 
                        value="<?=$uf?>" required>
                        <label class="labelInput" for="estado">Estado</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="endereco" id="endereco" class="inputUser" 
                        value="<?=$end?>" required>
                        <label class="labelInput" for="endereco">Endereço</label>
                    </div>
                    <br>
                    <input type="hidden" name="id" value="<?php echo $id ?>">

                    <button>Enviar</button>
                </fieldset>
            </form>
        </div>
        <script src="assets/js/script.js"></script>
    </body>
</html>