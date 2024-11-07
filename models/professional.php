<?php
namespace Models;

use src\database;
use PDO;

class Professional {
    private $conn;
    private $table = "professionals";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table . " SET name=:name, specialization=:specialization, email=:email, phone=:phone";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $data['name']);
        $stmt->bindParam(":specialization", $data['specialization']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":phone", $data['phone']);

        return $stmt->execute();
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $query = "UPDATE " . $this->table . " SET name=:name, specialization=:specialization, email=:email, phone=:phone WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $data['name']);
        $stmt->bindParam(":specialization", $data['specialization']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":phone", $data['phone']);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
