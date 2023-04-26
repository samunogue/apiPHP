<?php
// CLASSE CONTROLLER PARA O TEMA CLIENTES
// AQUI É ARMAZENADO TODA A LÓGICA PARA CADA ROTA DA API

class ClientesController{
    public static function buscarClientes(){
        $database = DB::connect();
            $query = $database->prepare("SELECT * FROM CLIENTES");
            $query->execute();
            $obj = $query->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode(["dados" => $obj]);
    }
    public static function buscarClienteId(){
        $path = explode("/", $_GET['path']);
        $database = DB::connect();
        $query = $database->prepare("SELECT * FROM CLIENTES WHERE id = :id");
        $query->bindParam("id", $path[2]);
        $query->execute();
        $obj = $query->fetchObject();
        echo json_encode(["dados" => $obj]);
    }
    public static function adicionarCliente(){
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $req = file_get_contents('php://input');
            $body = json_decode($req, true);
            $database = DB::connect();
            $query = $database->prepare("INSERT INTO CLIENTES (nome, idade, sexo) VALUES (:nome, :idade, :sexo)");
            $query->bindParam("nome", $body['nome']);
            $query->bindParam("idade", $body['idade']);
            $query->bindParam("sexo", $body['sexo']);
            $result = $query->execute();
            if($result) echo json_encode(["message" => "Dados salvo com sucesso"]);
        }else{
            http_response_code(404);
            echo 'Metódo não encontrado';
        }
    }
}