<?php
require_once __DIR__ . '/../controllers/ApiController.php';

$controller = new ApiController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->obtenerDatos();
} else {
    http_response_code(405); 
    echo json_encode(["error" => "Método no permitido"]);
}
?>
