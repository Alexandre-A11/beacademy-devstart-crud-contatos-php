<?php

$url = explode("?", $_SERVER["REQUEST_URI"]);

include "./telas/head.php";
include "./action.php";
include "./telas/menu.php";

match ($url[0]) {
    "/" => home(),
    "/login" => login(),
    "/cadastro" => cadastro(),
    "/listar" => listar(),
    // "/relatorio" => relatorio(),
    "/editar" => editar(),
    "/excluir" => excluir(),
    default => notFound(),
};
include "./telas/footer.php";
