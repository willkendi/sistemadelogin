<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario;
?>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>Projeto Login</title>
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    
    <div id="corpo-form">
  
        <form method="POST">
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" value="Login">  
        <a href="cadastrar.php">Ainda não é cadastrado?<strong>Cadastre-se!</strong></a>
    </form>
    </div>
    <?php
    
    if(isset($_POST['email'])){
     $email = addslashes($_POST['email']);
     $senha = addslashes($_POST['senha']);
   
     if($u->msg == ""){
        if(!empty($email) && !empty($senha)){
            $u->conectar();
            
            
            if($u->logar($email,$senha)){
                header("location: AreaPrivada.php");
            }
            else{
                ?>
                <div class="msg-erro">
            Email e/ou senha incorretos!
                </div>
                <?php
            }
        }
    }
    else{
        ?>
        <div class="msg-erro">
        echo "Erro: ".$u->msg;
        </div>
        <?php
    }
}
    ?>
</body>
</html>