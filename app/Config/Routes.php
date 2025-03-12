<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get("/", "Home::index");
$routes->get("/cyt/sobre-nosotros", "Home::about");
$routes->get("/ayuntamiento-info/(:num)", "Home::ayuntamiento/$1");
$routes->get("/ayuntamientos", "Ayuntamiento::index");

// $routes->setAutoRoute(true);
