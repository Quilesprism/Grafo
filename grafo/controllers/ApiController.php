<?php
require_once __DIR__ . '/../models/Movimientos.php';

class ApiController {
    private $movimientosModel;

    public function __construct() {
        $this->movimientosModel = new Movimientos();
    }

    public function obtenerDatos() {
        
        $data = $this->movimientosModel->obtenerMovimientos();

        
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
?>

