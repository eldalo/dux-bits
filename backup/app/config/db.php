<?php
/* DB Config */
if ( APP_CONFIG == 'dev' ) {
    ORM::configure('mysql:host=127.0.0.1;dbname=appfeeli_dux_bits');
    ORM::configure('username', 'root');
    ORM::configure('password', '');
    ORM::configure('return_result_sets', true);
    ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));    
} else if ( APP_CONFIG == 'prod' ) {
    ORM::configure('mysql:host=localhost;dbname=appfeeli_dux_bits');
    ORM::configure('username', 'appfeeli_duxbits');
    ORM::configure('password', '_h[vkL#W#TgM');
    ORM::configure('return_result_sets', true);
    ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}