<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index'); // Ruta principal


// Autenticación
$routes->get('iniciosesion', 'Login::iniciosesion');
$routes->post('login', 'Login::login');
$routes->get('registrousu', 'Login::registrousu');
$routes->post('registerUser', 'Login::register');
$routes->get('cerrarsesion', 'Login::logout');


// Rutas protegidas con autenticación
$routes->group('', ['filter' => 'auth'], function ($routes) {

    // Main
    $routes->get('inicio', 'Home::inicio');
    $routes->get('servicios', 'Home::servicios');
    $routes->get('contacto', 'Home::contacto');


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
    $routes->post('filtrarhistoriasclinicas', 'HistoriaClinica::filtrarhistoriasclinicas');
    $routes->post('resumenpaciente', 'HistoriaClinica::resumenpaciente');
    $routes->post('historiaclinica', 'HistoriaClinica::historiaclinica');
    $routes->post('editarpaciente', 'HistoriaClinica::editarPaciente');
    $routes->post('actualizarpaciente', 'HistoriaClinica::actualizarPaciente');
    $routes->get('receta', 'HistoriaClinica::receta');
    $routes->post('editarreceta', 'HistoriaClinica::editarreceta');
    $routes->post('updatereceta', 'HistoriaClinica::updatereceta');

    //Consultas
    $routes->post('nuevaconsulta', 'HistoriaClinica::nuevaConsulta');
    $routes->post('insertarconsulta', 'HistoriaClinica::insertarconsulta');
    $routes->post('editarconsulta', 'HistoriaClinica::editarconsulta');
    $routes->post('actualizarconsulta', 'HistoriaClinica::actualizarconsulta');
    $routes->get('regreso', 'HistoriaClinica::regreso');
    $routes->post('guardarReceta', 'HistoriaClinica::guardarReceta');

    // Logout
    $routes->get('logout', 'Login::logout');
});