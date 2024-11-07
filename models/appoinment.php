<?php
namespace Models;

use src\database;
use PDO;

class Appointment {
    private $conn;
    private $table = "appointments";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table . " SET patient_name=:patient_name, doctor_name=:doctor_name, appointment_date=:appointment_date";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":patient_name", $data['patient_name']);
        $stmt->bindParam(":doctor_name", $data['doctor_name']);
        $stmt->bindParam(":appointment_date", $data['appointment_date']);

        return $stmt->execute();
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $query = "UPDATE " . $this->table . " SET patient_name=:patient_name, doctor_name=:doctor_name, appointment_date=:appointment_date WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":patient_name", $data['patient_name']);
        $stmt->bindParam(":doctor_name", $data['doctor_name']);
        $stmt->bindParam(":appointment_date", $data['appointment_date']);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
