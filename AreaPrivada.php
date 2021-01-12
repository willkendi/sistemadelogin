<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario;// Instanciando a classe usuário.
    


session_start();
global $pdo;

 $id = $_SESSION['id_usuario'];
 
 
 if(!isset($_SESSION['id_usuario'])){
     header("location: index.php");
 }
 else{
 $u->conectar();// Conexão com banco de dados
 ?>


<marquee behavior="alternate" direction="up" width="80%"> <marquee direction="right" behavior='alternate' style="color:blue;font-size:30px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;text-align:center">
<?php $u->mostrarNome($id);// Método que mostra nome do usuário?> 
</marquee></marquee>

    
<?php
   
 }

?>
