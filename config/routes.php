<?php
/**
 * Configuration des routes de l'application ULCO
 * 
 * Ce fichier définit toutes les routes de l'application.
 * Les routes sont organisées par catégories pour une meilleure lisibilité.
 */

use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

// Configuration des routes
Router::defaultRouteClass(DashedRoute::class);

// Activer les extensions pour les API (JSON, XML)
Router::extensions(['json', 'xml']);

// Définition des routes principales
Router::scope('/', function (RouteBuilder $routes) {
    // Page d'accueil
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    
    // Pages statiques
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    
    // Routes d'authentification
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    $routes->connect('/register', ['controller' => 'Users', 'action' => 'add']);
    
    // Routes utilisateurs
    $routes->connect('/prof', ['controller' => 'Users', 'action' => 'prof']);
    
    // Routes des salles de classe
    $routes->connect('/classe', ['controller' => 'Ulcosalles', 'action' => 'classe']);
    $routes->connect('/classedir', ['controller' => 'Ulcosalles', 'action' => 'classedir']);
    $routes->connect('/classestudent', ['controller' => 'Ulcosalles', 'action' => 'classestudent']);
    $routes->connect('/classeprof', ['controller' => 'Ulcosalles', 'action' => 'classeprof']);
    $routes->connect('/detailclasse/*', ['controller' => 'Ulcosalles', 'action' => 'detailclasse']);
    
    // Routes des étudiants
    $routes->connect('/studentdetail/*', ['controller' => 'Ulcostudents', 'action' => 'studentdetail']);
    $routes->connect('/studentlist/*', ['controller' => 'Ulcostudents', 'action' => 'studentlist']);
    $routes->connect('/pstudentlist/*', ['controller' => 'Ulcostudents', 'action' => 'pstudentlist']);
    $routes->connect('/matieredetail/*', ['controller' => 'Ulcostudents', 'action' => 'matieredetail']);
    
    // Routes des professeurs
    $routes->connect('/proflist/*', ['controller' => 'Ulcoenseignes', 'action' => 'proflist']);
    $routes->connect('/profdetail/*', ['controller' => 'Ulcoprofs', 'action' => 'profdetail']);
    
    // Routes par défaut (à utiliser avec précaution en production)
    $routes->fallbacks(DashedRoute::class);
});
