<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// User Pages
$routes->get('/', 'Users::index');
$routes->get('/mood', 'Users::moodboard');
$routes->get('/road', 'Users::roadmap');

// Authentication Pages
$routes->get('/login', 'Auth::login');
$routes->get('/signup', 'Auth::signup');

// Admin Pages
$routes->get('/dash', 'Admin::dash');
$routes->get('/serv', 'Admin::serv');
$routes->get('/acc', 'Admin::acc');
