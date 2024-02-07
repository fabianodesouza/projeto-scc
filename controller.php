<?php

use Random\Engine\Secure;

    require 'conexao.php';
    require 'service.php';
    require 'usuario.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    //Cadastrar novo usuário
    if($acao == 'inserir') {

        $usuario = new Usuario();
        $usuario->__set('nome', $_POST['nome'])->__set('senha', $_POST['senha'])->__set('email', $_POST['email'])
        ->__set('telefone', $_POST['telefone'])->__set('genero', $_POST['genero'])->__set('nascimento', $_POST['nascimento'])
        ->__set('cidade', $_POST['cidade'])->__set('estado', $_POST['estado'])->__set('endereco', $_POST['endereco']);

        $conexao = new Conexao();

        $service = new Service($usuario, $conexao);

        $verificarEmail = $service->verificarEmail();

        //Verificar se e-mail já existe no cadastro
        if(empty($verificarEmail)) {

            $service->cadastrar();
            header('location: formulario.php?cadastro=1');
        }else {

            header('location: formulario.php?cadastro=erro');
        }
        
    }

    //Fazer login no sistema
    if($acao == 'login') {

        $usuario = new Usuario();
        $usuario->__set('email', $_POST['email'])->__set('senha', $_POST['senha']);

        $conexao = new Conexao();

        $service = new Service($usuario, $conexao);
        $user = $service->login();
        if(!empty($user)) {
            session_start();
            $_SESSION['autenticado'] = 'SIM';
            $_SESSION['nome'] = $user->nome;
            $_SESSION['id'] = $user->id;
            header('Location: Home.php');
        }else {
            session_start();
            $_SESSION['autenticado'] = 'NAO';
            header('Location: login.php?erro=1');
        }

    }

    //Exibir usuários
    if($acao == 'exibir') {

        $usuario = new Usuario();

        $conexao = new Conexao();

        $service = new Service($usuario, $conexao);

       $registros =  $service->exibirRegistros();
    }

    //Recuperar o registro que se quer editar
    if($acao == 'registro_ed') {

        $usuario = new Usuario();
        $usuario->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $service = new Service($usuario, $conexao);

        $registro = $service->recuperarRegistro();
    }

    //Editar o registro
    if($acao == 'editar') {

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        $usuario = new Usuario();
        $usuario->__set('id', $_POST['id'])->__set('nome', $_POST['nome'])->__set('senha', $_POST['senha'])->__set('email', $_POST['email'])
        ->__set('telefone', $_POST['telefone'])->__set('genero', $_POST['genero'])->__set('nascimento', $_POST['nascimento'])
        ->__set('cidade', $_POST['cidade'])->__set('estado', $_POST['estado'])->__set('endereco', $_POST['endereco']);

        $conexao = new Conexao();

        $service = new Service($usuario, $conexao);

        $verificarEmail = $service->verificarEmail();


        $cont = count((array)$verificarEmail);

       
        $id =  $verificarEmail[0]['id'];
        
        echo $id;

      


        if($cont == 0) {

            $service->editarRegitro();
            header('location: formulario.php?cadastro=2');

            
            
        }else if($cont == 1 && $_POST['id'] == $id) {

            $service->editarRegitro();
            header('location: formulario.php?cadastro=2');
            
        }else {

            header('location: formulario.php?cadastro=erro2');
        }

            
    }

    //Excluir registro
    if($acao == 'deletar') {

        $usuario = new Usuario();
        $usuario->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $service = new Service($usuario, $conexao);

        $service->deletarRegisto();
        header('Location: index.php');

    }

    //Pesquisar registro
    if($acao == 'pesquisar') {

        // echo '<pre>';
        // print_r($_GET);
        // echo '</pre>';
       
        $usuario = new Usuario();
        $usuario->__set('nome', $_GET['pesq'])->__set('email', $_GET['pesq'])
        ->__set('telefone', $_GET['pesq'])->__set('genero', $_GET['pesq'])
        ->__set('nascimento', $_GET['pesq'])->__set('cidade', $_GET['pesq'])
        ->__set('estado', $_GET['pesq'])->__set('endereco', $_GET['pesq']);

        $conexao = new Conexao();

        $service = new Service($usuario, $conexao);
        if(empty($_GET['pesq'])) {

            $registros =  $service->exibirRegistros();
            
        } else {

            $registros = $service->pesquisarRegistro();
        }
        
    }

    //Sair do sistema
    if($acao == 'sair') {

        session_start();

        session_destroy();

        header('Location: index.php');
    }

?>