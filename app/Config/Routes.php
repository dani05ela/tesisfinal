<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index'); // Ruta principal

// Main
$routes->get('inicio', 'Home::inicio');
$routes->get('servicios', 'Home::servicios');
$routes->get('contacto', 'Home::contacto');

// Autenticación
$routes->get('iniciosesion', 'Login::iniciosesion');
$routes->post('login', 'Login::login');
$routes->get('registrousu', 'Login::registrousu');
$routes->post('registerUser', 'Login::register');

// Navbar
$routes->get('bienvenida', 'Dashboard::bienvenida');
$routes->get('buscarpaciente', 'Dashboard::buscarpaciente');
$routes->get('buscadorhc', 'Dashboard::buscadorhc');

// Pacientes
$routes->get('nuevoInfoAdmin', 'Dashboard::nuevoInfoAdmin');
$routes->post('guardarpaciente', 'PacienteController::guardarpaciente');
$routes->post('guardarinfoAdmin', 'PacienteController::guardarinfoAdmin');
$routes->post('filtrarPacientes', 'PacienteController::filtrarPacientes');

// Historias clínicas
$routes->post('resumenpaciente', 'HistoriaClinica::resumenpaciente');
$routes->get('historiaclinica', 'HistoriaClinica::historiaclinica');
$routes->get('nuevacita', 'HistoriaClinica::nuevacita');
$routes->get('receta', 'HistoriaClinica::receta');
