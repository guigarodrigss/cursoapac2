<?php
include('conexao.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  if (empty($_POST['telefone'])) {
    echo "Preencha seu telefone.";
    exit;
  }
  
  if (empty($_POST['senha'])) {
    echo "Preencha sua senha.";
    exit;
  }
  
  $telefone = $_POST['telefone'];
  $senha = $_POST['senha'];
  
  $sql = "SELECT * FROM usuario WHERE telefone = '$telefone' AND senha = '$senha'";
  $resultado = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($resultado) == 1) {
    
    $usuario = mysqli_fetch_assoc($resultado);
    $permissao = $usuario['permissao'];
    $nome = $usuario['nome'];
    $setor = $usuario['setor'];
    $id = $usuario['id'];

    $_SESSION['id'] = $usuario['id'];
    $_SESSION['telefone'] = $telefone;
    $_SESSION['permissao'] = $permissao;
    $_SESSION['nome'] = $nome;
    $_SESSION['setor'] = $setor;
    
    function verificarEnvioUsuario($conn, $id) {
      $currentDateTime = new DateTime();
      $currentDateTime->setTimezone(new DateTimeZone('UTC'));
      $currentDate = $currentDateTime->format('Y-m-d');
  
      $sqlDados = "SELECT data_hora FROM dados WHERE id = $id";
      $result = $conn->query($sqlDados);
  
      
      
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastDateTime = new DateTime($row["data_hora"]);
        $lastDateTime->setTimezone(new DateTimeZone('UTC'));
        $lastDate = $lastDateTime->format('Y-m-d');
  
  
        if ($lastDate != $currentDate) {
          $diff = $currentDateTime->diff($lastDateTime);
          if ($diff->days == 0 && $diff->h < 24) {
            return true;
          }
        }
      }
  
      return false;
    }
      
    if (verificarEnvioUsuario($conn, $id)) {
      echo "Você já enviou os dados hoje. Tente novamente após 24 horas.";
    } else {

          if ($permissao == 0) {
            header("Location: formulario.php");
            exit;
          } elseif ($permissao == 1) {
            header("Location: paineladmin.php");
            exit;
          }
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