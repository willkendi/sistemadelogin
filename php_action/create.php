<?php
//Sessão
session_start();
// Conexão
require_once 'db_connect.php';// Chama a conexão com o banco de dados

if(isset($_POST['btn-cadastrar'])):

    if (!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)):
		$_SESSION['mensagem'] = "Formato de idade inválido";
        header('Location:index.php');
    
    else: 
		$nome = mysqli_escape_string($connect, $_POST['nome']);
		$sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
		$email = mysqli_escape_string($connect, $_POST['email']);
		$idade = mysqli_escape_string($connect, $_POST['idade']);



    $sql = "INSERT INTO clientes(nome, sobrenome, email, idade) VALUES('$nome','$sobrenome','$email','$idade')";// Insere os dados na tabela cliente [nome,sobrenome,email,idade] os dados das variaveis [$nome,$sobrenome,$email,$idade]

    if(mysqli_query($connect,$sql)):// Verifica se a query foi realizada com sucesso
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
     header('Location:index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location:index.php');
    endif;
endif;
endif;
