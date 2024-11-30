<?php
require 'vendor/autoload.php';

$app = new Slim\App();

$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write("Hola Mundo Slim!!");
    return $response;
});

$app->get("/hola[/{nombre}]", function ($request, $response, $args) {
    $response->getBody()->write("Hola, " . $args["nombre"]);
    return $response;
});

$app->post("/pruebapost", function($request, $response, $args){
    $reqPost = $request->getParsedBody();
    $val1 = $reqPost["val1"];
    $val2 = $reqPost["val2"];

    $response->getBody()->write("Valores: " . $val1 . " " . $val2);
    return $response;
});

$app->get("/testjson", function ($request, $response, $args) {
    $data = [];
    $data[0]["nombre"] = "Karen";
    $data[0]["apellidos"] = "Paredes Martínez";
    $data[1]["nombre"] = "Alan";
    $data[1]["apellidos"] = "Rebolledo Gradas";

    $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
    return $response;
});

$app->run();
?>