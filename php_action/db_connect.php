<?php
//Conexão com banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "crud";
$porta = "3308";

$connect = mysqli_connect($servername,$username,$password,$db_name,$porta);
mysqli_set_charset($connect,"utf-8");
if(mysqli_connect_error()):
    echo "Erro na conexão: ".mysqli_connect_error();
endif;
?>