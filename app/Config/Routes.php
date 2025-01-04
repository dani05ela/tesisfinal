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
$routes->get('registrousu', 'Login::registrousu');

// Navbar
$routes->get('bienvenida', 'Dashboard::bienvenida');
$routes->get('buscarpaciente', 'BdDashboardController::buscarpaciente');
$routes->get('buscadorhc', 'Dashboard::buscadorhc');

// Pacientes
$routes->get('nuevopaciente', 'Dashboard::nuevopaciente');

// Historias clínicas
$routes->get('resumenpaciente', 'HistoriaClinica::resumenpaciente');
$routes->get('historiaclinica', 'HistoriaClinica::historiaclinica');
$routes->get('nuevacita', 'HistoriaClinica::nuevacita');
$routes->get('receta', 'HistoriaClinica::receta');

// Pacientes (Controlador)
$routes->get('patient', 'PatientController::index');
$routes->get('patient/search', 'PatientController::search');
$routes->get('historiaclinica/(:num)', 'PatientController::viewHistory/$1'); // Validación del segmento como numérico

// Patient routes
$routes->get('patient', 'PatientController::index');
$routes->get('patient/create', 'PatientController::create');
$routes->post('patient/store', 'PatientController::store');
$routes->get('patient/search', 'PatientController::search');
$routes->get('historiaclinica/(:num)', 'PatientController::viewHistory/$1');

// NewPatientController routes
$routes->get('nuevopaciente', 'NewPatientController::create');
$routes->post('nuevopaciente/store', 'NewPatientController::store');
