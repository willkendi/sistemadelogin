<?php
//Sessão
session_start();
// Conexão
require_once 'db_connect.php';// Chama a conexão com o banco de dados

if(isset($_POST['btn-editar'])):

    if (!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)):
		$_SESSION['mensagem'] = "Formato de idade inválido";
        header('Location:index.php');
    
    else: 
		$nome = mysqli_escape_string($connect, $_POST['nome']);
		$sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
		$email = mysqli_escape_string($connect, $_POST['email']);
		$idade = mysqli_escape_string($connect, $_POST['idade']);

        $id = mysqli_escape_string($connect,$_POST['id']);


    $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome',email = '$email',idade = '$idade' WHERE id = '$id' ";// Insere os dados na tabela cliente [nome,sobrenome,email,idade] os dados das variaveis [$nome,$sobrenome,$email,$idade]

    if(mysqli_query($connect,$sql)):// Verifica se a query foi realizada com sucesso
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
     header('Location:index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao Atualizar";
        header('Location:index.php');
    endif;
endif;
endif;
