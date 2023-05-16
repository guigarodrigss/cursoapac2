<?php
include("conexao.php")

?>





<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
<main>
        <div class="forms">
            <form method="POST" class="formulario" action="usuarios.php">
                <h1 class="form_titulo">Editar Usuário</h1>

                <label class="form_label" for="nome"></label>
                <input class="form_input" type="text" placeholder="Nome Completo" name="nome" id = "nome" required>
                <label class="form_label" for="senha"></label>
                <input class="form_input" type="password" placeholder="Crie uma Senha" name="senha" id = "senha"required>
                <label class="form_label" for="telefone"></label>
                <input class="form_input" type="number" placeholder="Número de Telefone" name="telefone" id = "telefone" required>
                <label for="permissao">Escolha a permissão:</label>
                <select class="form-select" aria-label="Default select example" name="setor" id="setor"  required>
                    <option selected></option>
                    <option value="nivel rio">Nível do Rio</option>
                    <option value="Volume da Chuva">Volume da Chuva</option>
                    <option value="Nível do Reservatório">Nível do Reservatório</option>
                    <option value="Todos os campos">Todos os campos</option>
                </select>
                <label for="permissao">Escolha o Tipo de acesso:</label>
                <select class="form-select" aria-label="Default select example" name="permissao" id="permissao"  required>
                    <option selected></option>
                    <option value="1">administrador</option>
                    <option value="0">usuario</option>
                </select>
                <button type="submit" class="button" name = "enviar">Criar usuário</button>
                <button><a href="paineladmin.php">Sair</button>
                <img class="form_img" src="/CURSOAPAC2/assets/imgs/Logo_apac.png" alt="Logo Apac">
            </form>
        </div>
    </main>
</body>
</html>