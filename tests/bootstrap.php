// bootstrap.php
<?php
// bootstrap.php
define('ENVIRONMENT', 'testing'); // Define el entorno de pruebas

// Define las rutas a CodeIgniter
define('APPPATH', realpath('C:/xampp/htdocs/digcomp/application') . '/');
define('BASEPATH', realpath('C:/xampp/htdocs/digcomp/system') . '/');
define('VIEWPATH', APPPATH . 'views/');

// Carga de CodeIgniter
require_once BASEPATH . 'core/CodeIgniter.php';

?>
