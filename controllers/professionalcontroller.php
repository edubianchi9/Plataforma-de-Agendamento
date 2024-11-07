<?php
namespace Controllers;

use Models\Professional;
use Config\Database;

class ProfessionalController {
    private $model;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new Professional($db);
    }

    public function create($data) {
        if (empty($data['name']) || empty($data['specialization']) || empty($data['email']) || empty($data['phone'])) {
            return ["success" => false, "message" => "Todos os campos são obrigatórios"];
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return ["success" => false, "message" => "Email inválido"];
        }

        if ($this->model->create($data)) {
            return ["success" => true, "message" => "Profissional cadastrado com sucesso"];
        } else {
            return ["success" => false, "message" => "Falha ao cadastrar o profissional"];
        }
    }

    public function read() {
        return $this->model->read();
    }

    public function update($id, $data) {
        if ($this->model->update($id, $data)) {
            return ["success" => true, "message" => "Profissional atualizado com sucesso"];
        } else {
            return ["success" => false, "message" => "Falha ao atualizar o profissional"];
        }
    }

    public function delete($id) {
        if ($this->model->delete($id)) {
            return ["success" => true, "message" => "Profissional excluído com sucesso"];
        } else {
            return ["success" => false, "message" => "Falha ao excluir o profissional"];
        }
    }
}
