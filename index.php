<?php
session_start();
require_once __DIR__ . '/library/RequirePage.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/library/Twig.php';
require_once __DIR__ . '/library/Validation.php';
require_once __DIR__ . '/library/CheckSession.php';


$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';
/* Utiliser cet htaccess
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d 
RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.+)$ index.php/$1 [L]
*/



//$url = isset($_GET["url"]) ? explode('/', ltrim($_GET["url"], '/')) : '/';
/* Utiliser cet htaccess
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d 
RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.+)$ index.php?url=$1 [L]
*/



$_SESSION['url'] = $url;



print_r($url);
if ($url == '/') {
    CheckSession::SessionAuth();
    require_once 'controller/ControllerHome.php';
    $controller = new ControllerHome;
    echo $controller->index();
} else {
    $requestURL = $url[0];
    $requestURL = ucfirst($requestURL);
    $controllerPath = __DIR__ . '/controller/Controller' . $requestURL . '.php';

    if (file_exists($controllerPath)) {
        require_once($controllerPath);
        $controllerName = 'Controller' . $requestURL;
        $controller = new $controllerName;
        print_r($controller);
        if (isset($url[1])) {
            $method = $url[1];
            if (isset($url[2])) {
                $value = $url[2];
                echo $controller->$method($value);
            } else {
                echo $controller->$method();
            }
        } else {
            echo $controller->index();
        }
    } else {

        require_once 'controller/ControllerHome.php';
        $controller = new ControllerHome;
        echo $controller->error();
    }
}