<?php
require_once "../vendor/autoload.php";
use Controllers\AppointmentController;
use Controllers\ProfessionalController;

$appointmentController = new AppointmentController();
$professionalController = new ProfessionalController();

header("Content-Type: application/json");

$requestMethod = $_SERVER["REQUEST_METHOD"];
$input = json_decode(file_get_contents("php://input"), true);

if (isset($_GET['type']) && $_GET['type'] === 'professional') {
    
    switch($requestMethod) {
        case 'POST':
            echo json_encode($professionalController->create($input));
            break;
        case 'GET':
            echo json_encode($professionalController->read());
            break;
        case 'PUT':
            parse_str(file_get_contents("php://input"), $_PUT);
            echo json_encode($professionalController->update($_PUT['id'], $_PUT));
            break;
        case 'DELETE':
            parse_str(file_get_contents("php://input"), $_DELETE);
            echo json_encode($professionalController->delete($_DELETE['id']));
            break;
        default:
            echo json_encode(["success" => false, "message" => "Método não suportado"]);
            break;
    }
} else {
    
    switch($requestMethod) {
        case 'POST':
            echo json_encode($appointmentController->create($input));
            break;
        case 'GET':
            echo json_encode($appointmentController->read());
            break;
        case 'PUT':
            parse_str(file_get_contents("php://input"), $_PUT);
            echo json_encode($appointmentController->update($_PUT['id'], $_PUT));
            break;
        case 'DELETE':
            parse_str(file_get_contents("php://input"), $_DELETE);
            echo json_encode($appointmentController->delete($_DELETE['id']));
            break;
        default:
            echo json_encode(["success" => false, "message" => "Método não suportado"]);
            break;
    }
}
