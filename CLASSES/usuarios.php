<?php

class Usuario{
    private $pdo;
    public $msg = "";
    public function conectar(){// Conexão com banco de dados
        global $pdo;// Variavel global
        try{// Caso não for realizada conexão, retorna o erro
          $pdo = new PDO("mysql:host=localhost;port=3308;dbname=projectlogin;charset=utf8",'root','');

        }
        catch (PDOException $erro){
            global $msg;
            $msg  = $erro->getMessage();
        }
    }

   public function cadastrar($nome,$telefone,$email,$senha){// Método de cadastro
       global $pdo;
      
     
    $sql = $pdo -> prepare("SELECT id_usuario FROM clientes WHERE email = '$email' ");// Preparando a Query 

    $sql->execute();// Executando a Query
    $senhaCrip = md5($senha);// Criptografando senha.
    if($sql->rowCount()>0){
      return false;
    }
    else{
        $sql = $pdo->prepare("INSERT INTO clientes (nome,telefone,email,senha) VALUES('$nome','$telefone','$email','$senhaCrip')");
        $sql->execute();
        return true;
    }
}
 
 public function logar($email,$senha){// Método Logar
   global $pdo;
   $senhaCrip = md5($senha);
   $sql = $pdo->prepare("SELECT id_usuario from clientes WHERE email = '$email' and senha = '$senhaCrip' ");
   $sql->execute();
   if($sql->rowCount() >0 ){
        $dado = $sql->fetch();
       
        session_start();
        $_SESSION['id_usuario'] = $dado['id_usuario'];
       
        return true;// Logado com Sucesso.

   }
   else{
       return false;// Não foi possivel logar
   }
 }
 public function mostrarNome($id){//  Método para mostar nome do usuário
    global $pdo;
    $sql = $pdo->prepare("SELECT nome from clientes WHERE id_usuario = '$id' ");
    $sql->execute();
    $buscar = $sql->fetch();
     $nome = $buscar['nome'];
    echo "Bem vindo ".$nome;
 }
}