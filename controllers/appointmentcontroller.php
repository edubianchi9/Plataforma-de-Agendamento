<?php
namespace Controllers;

use Models\Appointment;
use Config\Database;

class AppointmentController {
    private $model;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new Appointment($db);
    }

    public function create($data) {
        if (empty($data['patient_name']) || empty($data['doctor_name']) || empty($data['appointment_date'])) {
            return ["success" => false, "message" => "Todos os campos são obrigatórios"];
        }

        if ($this->model->create($data)) {
            return ["success" => true, "message" => "Agendamento criado com sucesso"];
        } else {
            return ["success" => false, "message" => "Falha ao criar o agendamento"];
        }
    }

    public function read() {
        return $this->model->read();
    }

    public function update($id, $data) {
        if ($this->model->update($id, $data)) {
            return ["success" => true, "message" => "Agendamento atualizado com sucesso"];
        } else {
            return ["success" => false, "message" => "Falha ao atualizar o agendamento"];
        }
    }

    public function delete($id) {
        if ($this->model->delete($id)) {
            return ["success" => true, "message" => "Agendamento excluído com sucesso"];
        } else {
            return ["success" => false, "message" => "Falha ao excluir o agendamento"];
        }
    }
}
