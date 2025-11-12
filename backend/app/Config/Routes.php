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
$routes->get('/login', 'Users::login');
$routes->get('/signup', 'Users::signup');

$routes->post('login', 'Auth::login');
$routes->post('signup', 'Auth::signup');
$routes->post('logout', 'Auth::logout');

// Admin Pages
$routes->get('/dash', 'Admin::dash');
$routes->get('/serv', 'Admin::serv');
$routes->get('/acc', 'Admin::acc');
$routes->get('/req', 'Admin::req');
$routes->get('/req_t', 'Admin::req_t');
