<?php 
session_start();
// Conecte-se ao banco de dados MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "monitoramento";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifique se a conexão foi bem-sucedida
if (!$conn) {
    die("A conexão falhou: " . mysqli_connect_error());
}

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
<h1 align='center'>Bem vindo ao sistema, <br><?php echo isset($_SESSION['nomeCompleto']) ? $_SESSION['nomeCompleto'] : '';?></h1>
<div class="container d-flex flex-column flex-md-row gap-5 justify-content-center align-items-center">
    <div class="bloco1 p-5 rounded-4 m-5">
        <h3 class="mb-5">Configurações de Usuários</h3>
        <div class="d-flex flex-column gap-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mcu">Criar Usuário</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mleu">Listar/Editar Usuário</button>
        </div>
    </div>
    <div class="bloco2 p-5 rounded-4">
        <h3 class="mb-5">Configurações de Dados</h3>
        <div class="d-flex flex-column gap-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mld">Listar Dados</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mla">Listar Arquivos (.csv)</button>
        </div>
    </div>
</div>

<!-- Modal Criar Usuário -->
<div class="modal fade" id="mcu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Criar Usuário</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
        </div>
        <div class="modal-body">
          Modal Criar Usuário
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary"><a href="cadastro_us.php">Criar</a></button>
        </div>
      </div>
    </div>
</div>
<!-- Modal Listar/Editar Usuários -->
<div class="modal fade" id="mleu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Listar/Editar Usuários</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <table align="center">
          <tr>
          <?php
// Executa uma consulta SQL para listar os usuários
$sql = "SELECT nomeCompleto, telefone, setor FROM usuario";
$resultado = mysqli_query($conn, $sql);

// Verifica se a consulta retornou algum resultado
if (mysqli_num_rows($resultado) > 0) {
    // Exibe os resultados em uma tabela na modal
    echo "<table align = 'center'>";
    echo "<tr><th>Nome</th><th>Telefone</th><th>setor</th></tr>";
    while($linha = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>".$linha["nomeCompleto"]."</td>";
        echo "<td>".$linha["telefone"]."</td>";
        echo "<td>".$linha["setor"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum resultado encontrado.";
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
          </tr>
         </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
</div>

<!-- Modal Listar Dados -->
<div class="modal fade" id="mld" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Listar Dados</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Modal Listar Dados
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
</div>
<!-- Modal Listar Arquivos (.CSV) -->
<div class="modal fade" id="mla" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Listar Arquivos (.CSV)</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Modal Listar Arquivos (.CSV)
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
</div>

<form method="post" action="logout.php">
                <br>
  <button type="submit" name="logout">Sair</button>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>