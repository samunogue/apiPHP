<?php
// INCLUINDO O CONTROLLER COM TODA A LÓGICA
include_once 'Controller/clientes.php';

// DEFININDO AS ROTAS EM UM ARRAY ASSOCIATIVO PARA MELHOR DEFINIÇÃO E MANUTENÇÃO DO CÓDIGO
// O ARRAY ARMAZENA TODAS AS ROTAS E OS SEUS RESPECTIVOS CONTROLLERS E FUNÇÕES
// QUE SERÃO CHAMADAS PARA CADA CAMINHO DA API

$routes = [
    'buscarclientes' => ['controller' => 'ClientesController', 'action' => 'buscarClientes'],
    'buscarclientesporid' => ['controller' => 'ClientesController', 'action' => 'buscarClienteId'],
    'adicionarcliente' => ['controller' => 'ClientesController', 'action' => 'adicionarCliente']
];

// DEFININDO A ROTA DA REQUISIÇÃO
// CASO A ROTA NÃO EXISTA A VARIAVÉL $route RECEBE O VALOR DE NULL
$route = array_key_exists($acao, $routes) ? $routes[$acao] : null;

if ($route != null) {
    // ARMAZENA O NOME DO CONTROLLER PARA A ROTA CORRESPONDENTE NO ARRAY ASSOCIATIVO
    $controller_name = $route['controller'];
    // ARMAZENA O NOME DA FUNÇÃO PARA A ROTA CORRESPONDENTE NO ARRAY ASSOCIATIVO
    $action_name = $route['action'];

    // CRIA UMA INSTÃNCIA DO CONTROLLER CORRESPONDENTE
    $controller = new $controller_name();
    
    // EXECUTA A FUNÇÃO CORRESPONDENTE A ROTA
    $controller->$action_name();
} else {
    http_response_code(404);
    echo 'Página não encontrada';
}