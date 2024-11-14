<?php

use PHPUnit\Framework\TestCase;

class ProfessionalControllerTest extends TestCase
{
    protected $controller;

    protected function setUp(): void
    {
        $this->controller = new ProfessionalController();
    }

    public function testCreate()
    {
        $data = ["name" => "Teste", "specialization" => "Cardiologia", "email" => "teste@exemplo.com", "phone" => "99999-9999"];
        $result = $this->controller->create($data);
        $this->assertTrue($result["success"]);
    }

    public function testRead()
    {
        $result = $this->controller->read();
        $this->assertIsArray($result);
    }

    public function testUpdate()
    {
        $data = ["name" => "Atualizado", "specialization" => "Pediatria", "email" => "atualizado@exemplo.com", "phone" => "88888-8888"];
        $result = $this->controller->update(1, $data);
        $this->assertTrue($result["success"]);
    }

    public function testDelete()
    {
        $result = $this->controller->delete(1);
        $this->assertTrue($result["success"]);
    }
}
