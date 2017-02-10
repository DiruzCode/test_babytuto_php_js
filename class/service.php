<?php
require_once('solve.php');

class Service {

    public $data;

    public function __construct($array) {
        $this->data = $array;
    }

    public function service_loop() {
        //REALIZAMOS EL ENVIO DE NUESTRO ARREGLO
        $solve = New Solve($this->data);
        echo json_encode($solve->solve_bribery());

    }
}

$getData = new Service($_POST['array']);
$getData->service_loop();
