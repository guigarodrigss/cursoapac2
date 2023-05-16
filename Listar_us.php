<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
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
</head>
<body>
    <h1>Lista de Usuários</h1>

    <form method="POST" action="">
        <input type="text" name="search" placeholder="Digite o nome do usuário" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
        <button type="submit">Buscar</button>
    </form>

    <?php
    include('conexao.php');

    $sql = "SELECT * FROM usuario";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST["search"];
        $sql .= " WHERE nome LIKE '%$search%'";
    }
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        echo "<table>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Setor</th>
                    <th>Permissão</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row["nome"] . "</td>
                    <td>" . $row["telefone"] . "</td>
                    <td>" . $row["setor"] . "</td>
                    <td>" . $row["permissao"] . "</td>
                    <td>
                        <a href='editar_usuario.php?id=" . $row["id"] . "' class='button'>Editar</a>
                        <a href='excluir_usuario.php?id=" . $row["id"] . "' class='button' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\")'>Excluir</a>
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
