<?php 

$app->hook('slim.before', function () use ($app) {
    $uri = explode('/', $_SERVER['REQUEST_URI']);

    $app->response->header('Access-Control-Allow-Origin', '*');
	$app->view()->setData(array(
                                'app'           => $app,
                                'base_url'      => $app->request->getRootUri() . '/public/',
                                'site_url'      => $app->request->getRootUri() . '/',
                                'current_url'   => $uri[1]
                            ));
});