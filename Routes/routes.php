<?php
// SWITCH CASE PARA DIRECIONAR A API PARA UM DOS SERVIÇOS
// EX: QUESTOES, TEMAS, USUARIOS

switch ($api) {
    case 'clientes':
        include_once 'routeClientes.php';
        break;
    default:
        http_response_code(404);
        echo 'Página não encontrada';
        break;
}