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
            
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="email" name="email" placeholder="E-mail" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
            <input type="submit" value="Cadastrar"> 
       
    </form>
    </div>
    <?php





if(isset($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']); 
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confSenha = addslashes($_POST['confSenha']);
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confSenha) 
){ 
        $u->conectar();
        if($u->msg == ""){// Não retornou nenhum erro
            if($senha == $confSenha){
                if($u->cadastrar($nome,$telefone,$email,$senha) == true){
                ?>
                <div id="msg-sucesso">
               <a href="index.php"> Cadastrado com Sucesso! Clique para voltar a Home!</a>
                </div>

                <?php
          }
              else{
                  ?>
                   <div class="msg-erro">
                  Email já cadastrado!
                  </div>
                  <?php
              }
            }
            else{
               ?>
              <div class="msg-erro">
                Senha e confirmar senha não correspondem
              </div>
              <?php
            }
        }
        else{   
            ?>
               <div class="msg-erro">
              <?php echo "Erro: ".$msg;?>
              </div>
              <?php
          }
    }
    else{
        ?>
        <div class="msg-erro">
        Preencha todos os campos!
        </div>
        <?php	
    
    }
  }

?> 
</body>
</html>