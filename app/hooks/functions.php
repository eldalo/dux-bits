<?php

class Functions {

    public static function json($type, $message, $data = '') {
        return json_encode(array( 'state' => $type, 'message' => $message, 'data' => $data ));
    }

    public static function guid() {
        return '';
    }

    public static function generate_pass() {
        return '';
    }

    public static function wsdl($method, $params, $test = '') {
        try {
            $client = new SoapClient( "http://www.noel.com.co/services/user_wsdl.php?wsdl" );
            $data   = array(
                                'site_code'     => "Du82O14S1T1O",
                                'security_code' => "S1T3D4X2O1A",
                                'datos_usuario' => json_encode( $params ),
                                'test'          => $test
                            );

            if ($method == 'new')
                return $client->__call( 'RegistrarUsuario', $data );

        } catch (SoapFault $e) {
            return $e->getMessage();
        }
    }
}