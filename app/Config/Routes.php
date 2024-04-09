<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cadastro', 'Home::cadastro');
$routes->post('/signreceivedata', 'Home::signReceiveData');
$routes->get('/biblioteca', 'Home::biblioteca');
$routes->post('/loginverify', 'Home::loginVerify');
$routes->get('/addLivros', 'Home::addlivros'); 
$routes->post('/livroreceivedata', 'Home::livroReceiveData');
$routes->get('/livros', 'Home::livros'); 
$routes->post('/pesquisar', 'Home::pesquisar');
$routes->post('/delete', 'Home::deleteData');
$routes->post('/editarLivro', 'Home::editarLivro');
$routes->post('/formupdatelivro', 'Home::updateLivro');