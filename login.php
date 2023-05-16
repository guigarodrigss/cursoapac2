<?php

// Inclui o arquivo de conexão com o banco de dados
include('conexao.php');
session_start();
// Inicia a sessão

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Verifica se o campo de telefone foi preenchido
  if (empty($_POST['telefone'])) {
    echo "Preencha seu telefone.";
    exit;
  }
  
  // Verifica se o campo de senha foi preenchido
  if (empty($_POST['senha'])) {
    echo "Preencha sua senha.";
    exit;
  }
  
  // Recebe os valores dos campos do formulário
  $telefone = $_POST['telefone'];
  $senha = $_POST['senha'];
  
  // Faz a consulta no banco de dados para verificar se o usuário e senha estão corretos
  $sql = "SELECT * FROM usuario WHERE telefone = '$telefone' AND senha = '$senha'";
  $resultado = mysqli_query($conn, $sql);
  
  // Verifica se encontrou um usuário com o telefone e senha informados
  if (mysqli_num_rows($resultado) == 1) {
    
    // Recebe o valor do campo de permissão e nome completo do usuário encontrado
    $usuario = mysqli_fetch_assoc($resultado);
    $permissao = $usuario['permissao'];
    $nome = $usuario['nome'];
    $setor = $usuario['setor'];
    // Armazena informações do usuário na sessão
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['telefone'] = $telefone;
    $_SESSION['permissao'] = $permissao;
    $_SESSION['nome'] = $nome;
    $_SESSION['setor'] = $setor;
    
    
    // Verifica o valor do campo de permissão e redireciona para a página correspondente
    if ($permissao == 0) {
      header("Location: formulario.php");
      exit;
    } elseif ($permissao == 1) {
      header("Location: paineladmin.php");
      exit;
    }
    
  } else {
    echo "Usuário ou senha inválidos.";
  }
  
}

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apac - Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="forms">
        <form class="formulario" method="POST" action="">
            <h1 class="form_titulo">Faça seu Login</h1>
            <label class="form_label" for="user_telefone"></label>
            <input class="form_input" type="text" placeholder="Insira seu telefone" id="user_telefone" name = "telefone"required>
            <label class="form_label" for="user_pass"></label>
            <input class="form_input" type="password" placeholder="Insira sua Senha" id="user_pass" name = "senha"required>
            <input type="hidden" name="permissao" value="1">
            <button type="submit" class="button" id="entrar">Entrar</button>
            <img class="form_img" src="assets/imgs/Logo_apac.png" alt="Logo Apac">
        </form>
    </div>
</body>
</html>