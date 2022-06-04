<?php

function home() {
    include "./telas/home.php";
}

function login() {
    include "./telas/login.php";
}

function cadastro() {
    if ($_POST) {

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        $arquivo = fopen("./data/contatos.csv", "a+");

        fwrite($arquivo, "{$nome};{$email};{$telefone}" . PHP_EOL);

        fclose($arquivo);

        $mensagem = "Cadastrado com sucesso!";

        include "./telas/mensagem.php";
    }
    include "./telas/cadastro.php";
}

function listar() {
    $contatos = file("./data/contatos.csv");
    include "./telas/listar.php";
}


function admin() {
    include "./telas/admin.php";
}


function notFound() {
    include "./telas/404.php";
}

function relatorio() {
    include "./telas/relatorio.php";
}


function editar() {
    $id = $_GET["id"];
    $contatos = file("./data/contatos.csv");

    if ($_POST) {

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        $contatos[$id] = "{$nome};{$email};{$telefone}" . PHP_EOL;

        unlink("./data/contatos.csv");

        $arquivo = fopen("./data/contatos.csv", "a+");

        foreach ($contatos as $contato) {
            fwrite($arquivo, $contato);
        }

        fclose($arquivo);

        $mensagem = "Atualizado com sucesso!";

        include "./telas/mensagem.php";
    }


    $dados = explode(";", $contatos[$id]);

    include "./telas/editar.php";
}

function excluir() {
    $id = $_GET["id"];

    $contatos = file("./data/contatos.csv");
    unset($contatos[$id]);

    unlink("./data/contatos.csv");

    $arquivo = fopen("./data/contatos.csv", "a+");

    foreach ($contatos as $contato) {
        fwrite($arquivo, $contato);
    }

    $mensagem = "Contato excluído com sucesso!";

    include "./telas/mensagem.php";
}
