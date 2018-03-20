<?php

$app->get('/', function() use ($app) {
    $app->redirect('inicio');
});

$app->get('/inicio', function() use ($app) {
    $app->view->setData(array( 'title' => '', 'metas' => '' ));
    $app->render('index.php');
});

$app->get('/jugar', function() use ($app) {
    if (isset( $_SESSION['is_login'] ) && $_SESSION['is_login'] == true) {
        $app->view->setData(array( 'title' => 'Jugar | ', 'metas' => '' ));
        $app->render('game.php');
    } else
        $app->redirect('inicio');
});

$app->get('/mecanica', function() use ($app) {
    $app->view->setData(array( 'title' => 'Comó Ganar | ', 'metas' => '' ));
    $app->render('mechanics.php');
});

$app->get('/premios', function() use ($app) {
    $app->view->setData(array( 'title' => 'Premios | ', 'metas' => '' ));
    $app->render('awards.php');
});

$app->get('/ganadores', function() use ($app) {
    $participants   = ORM::for_table('usuarios')->raw_query('SELECT * FROM usuarios WHERE fin_juego is not null')->find_array();

    $app->view->setData(array( 'title' => 'Ganadores | ', 'metas' => '', 'participants' => $participants, 'winners' => '' ));
    $app->render('biters.php');
});

$app->get('/terminos-y-condiciones', function() use ($app) {
    $app->view->setData(array( 'title' => 'Términos y condiciones | ', 'metas' => '' ));
    $app->render('terms.php');
});

$app->get('/cerrar-sesion', function() use ($app) {
    session_destroy();
    $app->redirect('inicio');
});

$app->get('/registrarse', function() use ($app) {
    $app->view->setData(array( 'title' => '', 'metas' => '', 'layout' => false ));
    $app->render('register.php');
});

$app->get('/siguiente-nivel/:level', function ($level) use ($app) {
    if ($level == '2') {
        $level  = '3';
        $letter = 'tercer nivel';
    } else if ($level == '3') {
        $level  = '4';
        $letter = 'cuarto nivel';
    } else if ($level == '4') {
        $level  = '5';
        $letter = 'quinto nivel';
    }

    $app->view->setData(array( 'title' => '', 'metas' => '', 'layout' => false, 'level' => $level, 'letter' => $letter ));
    $app->render('popup.php');
});

$app->get('/gameover', function () use ($app) {
    $app->view->setData(array( 'title' => '', 'metas' => '', 'layout' => false ));
    $app->render('gameover.php');
});