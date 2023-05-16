<?php 
session_start();
// Conecte-se ao banco de dados MySQL
include("conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/CURSOAPAC2/assets/css/paineladmin.css">
    <title>Apac - Administração</title>
</head>
<body>
<h1 align='center'>Bem vindo ao sistema, <br><?php echo isset($_SESSION['nome']) 
? $_SESSION['nome'] : '';?></h1>


  <div class="container d-flex flex-column flex-md-row gap-5 justify-content-center align-items-center">
    <div class="bloco1 p-5 rounded-4 m-5">
        <h3 class="mb-5">Configurações de Usuários</h3>
        <div class="d-flex flex-column gap-3">
          <a href="cadastro_us.php"><button class = "btn btn-primary">Criar usuário</button></a>
          <a href="Listar_us.php"><button class = "btn btn-primary">Listar usuário</button></a>    
        </div>
    </div>
    <div class="bloco2 p-5 rounded-4">
        <h3 class="mb-5">Configurações de Dados</h3>
        <div class="d-flex flex-column gap-3">
          <a href="listar_dados.php"><button class = "btn btn-primary">Listar Dados</button></a>
          <a href="#"><button class = "btn btn-primary">Exportar dados(csv)</button></a>
        </div>
    </div>
  </div>


<form method="post" action="logout.php">
  <button type="submit" class = "btn btn-danger" name="logout">Sair</button>

</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>