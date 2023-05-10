<?php
session_start();
include('conexao.php');

$setor = $_SESSION['setor'];
echo $setor;

$nivelRioDisabled = '';
$volumeChuvaDisabled = '';
$nivelReservatorioDisabled = '';

if($setor === 'nivel rio')
{
    $volumeChuvaDisabled = 'disabled';
    $nivelReservatorioDisabled = 'disabled';
}
else if($setor === 'Volume da Chuva')
{
    $nivelRioDisabled = 'disabled';
    $nivelReservatorioDisabled = 'disabled';
}
else if($setor === 'Nível do Reservatório')
{
    $nivelRioDisabled = 'disabled';
    $volumeChuvaDisabled = 'disabled';
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
    <link rel="stylesheet" href="assets/css/formulario.css">
</head>
<body>
    <div class="forms">
        <form class="formulario" method="POST" action = "logout.php">
        <h1 align='center'>Bem vindo ao sistema, <br><?php echo isset($_SESSION['nomeCompleto']) ? $_SESSION['nomeCompleto'] : '';?></h1>
            <h3 class="form_titulo">Preencha os Dados</h3>
            <label class="form_label <?php echo $nivelRioDisabled ?>" for="nivel_rio"></label>
            <input class="form_input" type="text" placeholder="Insira o nível do rio" id="user_id" name = "nivel_rio" <?php echo $nivelRioDisabled ?>>
            <label class="form_label <?php echo $volumeChuvaDisabled ?>" for="volume_chuva"></label>
            <input class="form_input" type="text" placeholder="Insira o volume da chuva" id="user_pass" name = "volume-chuva" <?php echo $volumeChuvaDisabled ?>>
            <label class="form_label <?php echo $nivelReservatorioDisabled ?>" for="nivel_reservatorio"></label>
            <input class="form_input" type="text" placeholder="Insira o nível do reservatório" id="user_pass" name = "nivel_reservatorio" <?php echo $nivelReservatorioDisabled ?>>
            <button type="submit" class="button">Enviar</button>
                <br>
            <button type="submit" name="logout">Sair</button>
            <img class="form_img" src="/CURSOAPAC2/assets/imgs/Logo_apac.png" alt="Logo Apac">
        </form>
    </div>
</body>
</html>
