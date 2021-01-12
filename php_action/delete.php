<?php
//Sessão
session_start();
// Conexão
require_once 'db_connect.php';// Chama a conexão com o banco de dados

if(isset($_POST['btn-deletar'])):


        $id = mysqli_escape_string($connect,$_POST['id']);


    $sql  = "DELETE FROM clientes WHERE id = '$id'";

    if(mysqli_query($connect,$sql)):// Verifica se a query foi realizada com sucesso
        $_SESSION['mensagem'] =  "Deletado com sucesso!";
     header('Location:index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao Deletar";
        header('Location:index.php');
    endif;
endif;
  