<?php
    require 'Routing.php';
    require_once __DIR__."/src/controllers/ScheduleController.php";

    $path = trim($_SERVER['REQUEST_URI'], '/');
    $path = parse_url($path, PHP_URL_PATH);

    Routing::get('index', 'DefaultController');
    Routing::get('home', 'DefaultController');
    Routing::get('signIn', 'DefaultController');
    Routing::get('signUp', 'DefaultController');

    Routing::post('login', 'SecurityController');
    Routing::post('register', 'SecurityController');
    Routing::post('logout', 'SecurityController');

    Routing::post('createNewSchedule', 'ScheduleController');
    Routing::post('removeSchedule', 'ScheduleController');

    Routing::run($path);
?>