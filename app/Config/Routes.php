<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->post("/login", "Auth::login");
$routes->get("/login", "Auth::index");

$routes->get("/dashboard", "Dashboard::index");
$routes->get("/crear_factura", "Factura::index");
$routes->post("/crear_factura", "Factura::crear");
