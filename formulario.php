
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
        
        <a href="index.php" title="voltar para login" style="color: red;" class="seta">
            <i class="fas fa-arrow-alt-circle-left fa-2x"></i>
        </a>
       

        <div class="boxFormulario">
        <a href="index.php" title="voltar para login" style="color: red;" class="seta">
            <i class="fas fa-arrow-alt-circle-left fa-1x"></i>
        </a>
            <form action="controller.php?acao=inserir" method="post">
                <fieldset>
                    <legend><b>Formulário de Cadastro</b></legend>
                    <?php if(isset($_GET['cadastro']) and $_GET['cadastro'] == 1) { ?>

                        <h5 class="msg_sucesso">Cadastro realizado com sucesso</h5>
                        <meta http-equiv="refresh" content="3; URL='login.php'"/>
                    <?php } ?>

                    <?php if(isset($_GET['cadastro']) and $_GET['cadastro'] == 'erro') { ?>

                        <h5 class="msg_erro">Erro. Email já cadastrado</h5>
                        <meta http-equiv="refresh" content="5; URL='formulario.php'"/>
                    <?php } ?>

                    <?php if(isset($_GET['cadastro']) and $_GET['cadastro'] == 'erro2') { ?>

                        <h5 class="msg_erro">Erro. Email já cadastrado</h5>
                        <meta http-equiv="refresh" content="5; URL='home.php'"/>
                    <?php } ?>

                    <?php if(isset($_GET['cadastro']) and $_GET['cadastro'] == 2) { ?>

                        <h5 class="msg_sucesso">Atualização realizado com sucesso</h5>
                        <meta http-equiv="refresh" content="4; URL='home.php'"/>
                    <?php } ?>

                    <br>
                    <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label class="labelInput" for="nome">Nome completo</label>
                    <br><br>
                    <div class="inputBox">
                        <input type="password" name="senha" id="senha" class="inputUser" required>
                        <div id="icon" onclick="showHidden()"></div>
                        <label class="labelInput" for="senha">Senha</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="email" name="email" id="email" class="inputUser" required>
                        <label class="labelInput" for="email">E-mail</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                        <label class="labelInput" for="telefone">Telefone</label>
                    </div>
                    <br>
                    <p>Sexo</p>
                    <input type="radio" name="genero" id="feminino" value="feminino">
                    <label for="feminino">Feminino</label>
                    <br>
                    <input type="radio" name="genero" id="masculino" value="masculino">
                    <label for="masculino">Masculino</label>
                    <br>
                    <input type="radio" name="genero" id="outro" value="outro">
                    <label for="outro">Outro</label>

                    <br><br>
                    <label for="nascimento"><b>Data de nascimento</b></label>
                    <input type="date" name="nascimento" id="nascimento" placeholder="dd/mm/aaaa" required>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="cidade" id="cidade" class="inputUser" required>
                        <label class="labelInput" for="cidade">Cidade</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="estado" id="estado" class="inputUser" required>
                        <label class="labelInput" for="estado">Estado</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="endereco" id="endereco" class="inputUser" required>
                        <label class="labelInput" for="endereco">Endereço</label>
                    </div>
                    <br>
                    <button>Enviar</button>
                </fieldset>
            </form>
        </div>
            <script src="assets/js/script.js"></script>            
    </body>
</html>