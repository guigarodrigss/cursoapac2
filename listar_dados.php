<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Dados</title>
</head>
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
<body>
<h1>Listar dados</h1>

<form method="POST" action="">
    <input type="text" name="search" placeholder="Digite o nome do usuário" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
    <button type="submit">Buscar</button>
</form>

<?php
include('conexao.php');

$sql = "SELECT u.nome, d.nivel_chuva, d.nivel_rio, d.nivel_reservatorio, d.data_hora 
FROM usuario u INNER JOIN dados d ON (d.id = u.id)";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST["search"];
    $sql .= " WHERE nome LIKE '%$search%'";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    echo "<table>
            <tr>
                <th>Nome</th>
                <th>Nível Chuva</th>
                <th>Nivel Rio</th>
                <th>Nível Reservatório</th>
                <th>Data Hora</th>
                
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row["nome"] . "</td>
                <td>" . $row["nivel_chuva"] . "</td>
                <td>" . $row["nivel_rio"] . "</td>
                <td>" . $row["nivel_reservatorio"] . "</td>
                <td>" . $row["data_hora"] . "</td>
                <td>
                    <a href='editar_usuario.php?id=" . $row["nome"] . "' class='button'>Editar</a>
                    <a href='excluir_usuario.php?id=" . $row["nome"] . "' class='button' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\")'>Excluir</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum usuário encontrado.";
}

mysqli_close($conn);
?>
<br>
<button><a href="paineladmin.php">Voltar</button>
</body>
</html>