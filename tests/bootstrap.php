<?php
// tests/bootstrap.php

// Definir constantes si es necesario
define('BASEPATH', true);
define('APPPATH', realpath(__DIR__ . '/../application'));

// Cargar componentes necesarios de CodeIgniter
require_once APPPATH . '/models/User_model.php'; // Ejemplo de carga de un modelo

// Configurar cualquier inicialización adicional necesaria para las pruebas
