<?php

require __DIR__.'/vendor/autoload.php';

use \App\Controller\Pages\Home;

$obResponse = new \App\Http\Response(500, 'Olá, mundo!');
$obResponse->sendResponse();
exit;

echo Home::getHome();