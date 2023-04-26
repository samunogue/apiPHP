<?php
include_once 'config.php';
// COLETANDO A URL DA REQUISIÇÃO E TRATANDO PARA DIVIDIR EM API / ACAO / PARAMETROS
// EX: https://trilhaeduapi/clientes/buscarclienteporid/2

if (isset($_GET['path'])){
    $path = explode("/", $_GET['path']);
}else{
    http_response_code(404); 
    echo 'Caminho não existe'; 
    exit;
};

// TRATAMENTO DA URL PARA DIVISÃO EM API / AÇÃO / PARAMETROS
if(isset($path[0])) { $api = $path[0]; } else{ http_response_code(404); echo 'Caminho não existe'; }
if(isset($path[1])) { $acao = $path[1]; } else{ $acao = ''; }
if(isset($path[2])) { $params = $path[2]; } else { $params = ''; }

// IDENTIFICANDO MÉTODO DA REQUISIÇÃO
$method = $_SERVER['REQUEST_METHOD'];

// INCLUINDO CONEXÃO COM O BANCO DE DADOS
include_once 'Data/dbConnection.php';

// INCLUINDO O ARQUIVO DE ROTAS PRINCIPAL PARA DIRECIONAMENTO DA API
include_once 'Routes/routes.php';