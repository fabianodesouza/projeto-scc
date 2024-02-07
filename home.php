<?php 
    require 'session_autenticado.php';

    $acao = 'exibir';
    require 'controller.php';

?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/favicon-32x32.png" type="image/x-icon">

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsivo.css">
        <title>Sistema de Cadastro e Consulta | SCC</title>
    </head>
    <body class="body_scc ">

        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid menu">
                <a class="navbar-brand text-white" href="home.php"><img class="logo" src="assets/img/logo6.png" alt="Logo  do sistema cadastro consulta"></a>

                <div class="d-flex sair">
                    <a href="controller.php?acao=sair" class="btn btn-danger me-5">SAIR</a>
                </div>
            </div>
           
        </nav>
      
        <p class="text-white mt-2">BEM VINDO: <strong><?=$_SESSION['nome'] ?></strong> </p>
        <h3 class="text-white text-center mt-5 home-titulo">SISTEMA DE CADASTRO E CONSULTA</h3>

        <div class="boxPesquisa mt-3">
            
            <input type="search" id="pesquisar" class="form-control w-25 inputHome" placeholder="Pesquisar" name="pesq">
            <button onclick="search()" class="btn btn-dark">
              <i class="bi bi-search"></i>
            </button>
        </div>
        
        <div class="mt-5 tabela">
            <table class="table text-white table-bg">
                <thead>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Nascimento</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">...</th>
                    <th scope="col">...</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($registros as $registro) { ?>
                        <tr>
                        <th scope="row"><?=$registro['nome']?></th>
                        <td><?=$registro['email']?></td>
                        <td><?=$registro['telefone']?></td>
                        <td><?=$registro['genero']?></td>
                        <td><?=$registro['nascimento']?></td>
                        <td><?=$registro['cidade']?></td>
                        <td><?=$registro['estado']?></td>
                        <td><?=$registro['endereco']?></td>
                        <?php if($registro['id'] == $_SESSION['id']) { ?>
                        <td><a href="javascript:if(confirm('Tem certeza que deseja excluir sua conta?'))(location='controller.php?acao=deletar&id=<?=$registro['id']?>')"><i class="bi bi-trash3-fill text-danger"></i></a></td>
                        <td><a href="formulario_edit.php?acao=registro_ed&id=<?=$registro['id']?>">
                            <i class="bi bi-pencil-square text-info"></i></a>
                        </td>
                        <?php } else { ?>
                            <td></td>
                            <td></td>
                        <?php } ?> 
                        
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        
        <!-- Java script -->
        <script src="assets/js/script.js"></script>
    </body>
</html>