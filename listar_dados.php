<?php
include("conexao.php");

$sql = "SELECT * FROM dados";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST["search"];
        $sql .= " WHERE nome LIKE '%$search%'";
    }
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        echo "<table>
                <tr>
                    <th>id</th>
                    <th>Nivel Chuva</th>
                    <th>Nivel Rio</th>
                    <th>Nivel Reservatório</th>
                    <th>diaHora</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>". $row["id"]."</td>
                    <td>" . $row["nivel_chuva"] . "</td>
                    <td>" . $row["nivel_rio"] . "</td>
                    <td>" . $row["nivel_reservatorio"] . "</td>
                    <td>" . $row["permissao"] . "</td>
                    <td>
                        <a href='editar_usuario.php?id=" . $row["id"] . "' class='button'>Editar</a>
                        <a href='excluir_usuario.php?id=" . $row["id"] . "' class='button' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\")'>Excluir</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum dados encontrado.";
    }

    mysqli_close($conn);
    
    
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Dados</title>
</head>
<body>
<h1>Listar dados</h1>

<form method="POST" action="">
    <input type="text" name="search" placeholder="Digite o usuario" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
    <button type="submit">Buscar</button>
</form>

<button><a href="paineladmin.php">Voltar</button>
    
</body>
</html>