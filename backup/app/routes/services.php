<?php

$functions = new Functions;

$app->post('/iniciar-sesion', function() use ($app, $functions) {
    $_SESSION['is_login']       = true;
    $_SESSION['user_name']      = $app->request()->post('name');
    $_SESSION['user_lastname']  = $app->request()->post('lastname');
    $_SESSION['user_email']     = $app->request()->post('email');
    $_SESSION['user_fb']        = $app->request()->post('fb');
    $_SESSION['user_date']      = date('Y-m-d H:i:s');

    $login = Users::where('id_facebook', $app->request()->post('fb'))->find_one();

    if (isset($login->id)) {
        $login->set_expr('ultimo_ingreso', 'NOW()');
        $login->save();

        $level = UsersLevels::where('usuarios_id', $login->id)->order_by_desc('inicio_nivel')->find_one();

        if ($level->niveles_id == '5' && $level->estado_nivel == '0')
            $_SESSION['level_id'] = 0;
        else
            $_SESSION['level_id'] = (int) $level->niveles_id;

        $_SESSION['user_id']  = $login->id;
    } else
        $_SESSION['level_id'] = 1;

    echo $functions::json(true, 'Ok');
});

$app->post('/nuevo-registro', function() use ($app, $functions) {
    $verify_email       = Users::where('email', $app->request()->post('email'))->find_one();
    $verify_document    = Users::where('num_documento', $app->request()->post('document'))->find_one();

    if (isset($verify_email->id))
        echo $functions::json(false, 'El Email ya se encuentra registrado.');
    else if (isset($verify_document->id))
        echo $functions::json(false, 'La Cédula ya se encuentra registrada.');
    else {
        $data = array(  'basicos'       => array(
                                                'tipo_documento'    => '',
                                                'documento'         => $app->request()->post('document'),
                                                'nombres'           => $app->request()->post('name'),
                                                'apellidos'         => $app->request()->post('name'),
                                                'mail'              => $app->request()->post('name'),
                                                'contrasena'        => $app->request()->post('document'),
                                                'genero'            => '',
                                                'fecha_nacimiento'  => '',
                                                'telefono'          => '',
                                                'direccion'         => '',
                                                'id_ciudad'         => ''
                                            ),
                        'adicionales'   => array( 'acepta_terminos' => 'S' )
                    );

        // Se consume el web service de NetBangers para guardar el registro.
        $functions::wsdl('new', $data, '');

        // Guarda el registro en la base de datos de Feeling.
        $user = Model::factory('Users')->create();
        $user->id_facebook          = $_SESSION['user_fb'];
        $user->nombres              = $app->request()->post('name');
        $user->apellidos            = $app->request()->post('last_name');
        $user->num_documento        = $app->request()->post('document');
        $user->email                = $app->request()->post('email');
        $user->celular              = $app->request()->post('cell');
        $user->departamento         = $app->request()->post('departament');
        $user->ciudad               = $app->request()->post('city');
        $user->set_expr('creacion_usuario', 'NOW()');

        if ($user->save()) {
            $_SESSION['user_id'] = $user->id;

            // Guarda el registro del primer nivel y informa que fue finalizado.
            $first_level = Model::factory('UsersLevels')->create();
            $first_level->usuarios_id   = $_SESSION['user_id'];
            $first_level->niveles_id    = 1;
            $first_level->estado_nivel  = 0;
            $first_level->inicio_nivel  = $_SESSION['user_date'];
            $first_level->set_expr('fin_nivel', 'NOW()');
            $first_level->save();

            // Guarda el registro del segundo nivel e indica que esta inicializado.
            $first_level = Model::factory('UsersLevels')->create();
            $first_level->usuarios_id   = $_SESSION['user_id'];
            $first_level->niveles_id    = 2;
            $first_level->estado_nivel  = 1;
            $first_level->set_expr('inicio_nivel', 'NOW()');
            $first_level->save();

            $_SESSION['level_id'] = 2;

            echo $functions::json(true, 'Ok');
        } else
            echo $functions::json(false, 'Se presento un problema al momento de guardar el registro en la base de datos.');
    }
});

$app->post('/finalizar-nivel', function() use ($app, $functions) {
    $level_id       = (int) $app->request()->post('id');
    $user_level     = UsersLevels::where('usuarios_id', $_SESSION['user_id'])
                                ->where('niveles_id', $level_id)->find_one();

    if (isset($user_level->id)) {
        $user_level->estado_nivel = 0;
        $user_level->set_expr('fin_nivel', 'NOW()');
        $user_level->save();

        $level_id++;
        $_SESSION['level_id'] = $level_id;
    }

    if ($level_id <= 5) {
        $level = Model::factory('UsersLevels')->create();
        $level->usuarios_id   = $_SESSION['user_id'];
        $level->niveles_id    = $level_id;
        $level->estado_nivel  = 1;
        $level->set_expr('inicio_nivel', 'NOW()');

        if ($level->save()) {
            echo $functions::json(true, 'Ok', array( 'level' => (string) $level_id ));
        } else
            echo $functions::json(false, 'ERROR');
    } else {
        $user = Model::factory('Users')->find_one($_SESSION['user_id']);
        $user->set_expr('fin_juego', 'NOW()');
        $user->save();

        $_SESSION['level_id'] = 0;

        echo $functions::json(true, 'Ok', array( 'level' => '0' ));
    }
});