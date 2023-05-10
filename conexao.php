<?php
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