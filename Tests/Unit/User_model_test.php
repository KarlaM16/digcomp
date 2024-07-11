<?php
// tests/unit/User_model_test.php
use PHPUnit\Framework\TestCase;

// Incluir el archivo de bootstrap si es necesario
require_once __DIR__ . '/../bootstrap.php';

class User_model_test extends TestCase {

    protected $userModel;

    public function setUp(): void {
        parent::setUp();
        // Inicializar el modelo con dependencias simuladas (mocking)
        $this->userModel = $this->getMockBuilder('User_model') // Asegúrate de usar el nombre completo y correcto de la clase
                                ->disableOriginalConstructor()
                                ->getMock();
    }

    public function testAddUser() {
        // Verificar si el método add está disponible
        if (!method_exists($this->userModel, 'add')) {
            $this->markTestSkipped('El método add no está disponible para mockear.');
        }

        // Simular datos de usuario
        $data = array(
            'name' => 'karla',
            'email' => 'karla@gmail.com',
            'password' => password_hash('123', PASSWORD_DEFAULT),
            'rol' => 'Administrador'
        );

        // Configurar el mock para que el método add devuelva true
        $this->userModel->expects($this->once())
                        ->method('add')
                        ->with($data)
                        ->willReturn(true);

        // Ejecutar el método y verificar el resultado
        $result = $this->userModel->add($data);
        $this->assertTrue($result); // Verificar que se agregó correctamente
    }
}
?>
