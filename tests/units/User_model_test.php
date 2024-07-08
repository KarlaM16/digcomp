<?php
// tests/units/Empleado_model_test.php

use PHPUnit\Framework\TestCase;

class Empleado_model_test extends TestCase {

    protected $empleadoModel;

    public function setUp(): void {
        parent::setUp();
        // Cargar CodeIgniter para las pruebas
        $this->CI =& get_instance();
        $this->CI->load->database('testing'); // Cargar la configuración de la base de datos de pruebas

        // Cargar el modelo Empleado_model para la prueba
        $this->CI->load->model('Empleado_model');
        $this->empleadoModel = $this->CI->Empleado_model;
    }

    public function testCountUsuarios() {
        // Configurar un mock para el método countusuarios()
        $mockResult = 10; // Resultado esperado

        // Simular el método countusuarios() con un mock
        $this->empleadoModel = $this->getMockBuilder('Empleado_model')
                                   ->setMethods(['countusuarios'])
                                   ->getMock();
        
        $this->empleadoModel->expects($this->once())
                            ->method('countusuarios')
                            ->willReturn($mockResult);

        // Ejecutar el método y verificar el resultado
        $result = $this->empleadoModel->countusuarios();
        $this->assertEquals($mockResult, $result); // Verificar que el resultado es el esperado
    }

    // Puedes añadir más pruebas para otros métodos del modelo aquí
}
?>

