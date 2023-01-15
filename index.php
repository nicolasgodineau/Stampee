 <?php
    session_start();
    require_once __DIR__ . '/library/RequirePage.php';
    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/library/Twig.php';
    require_once __DIR__ . '/library/Validation.php';
    require_once __DIR__ . '/library/CheckSession.php';


    //print_r($_SERVER['PATH_INFO']);
    $url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';
    //$url = isset($_GET["url"]) ? explode ('/', ltrim($_GET["url"], '/')) : '/';

    //print_r($url);

    if ($url == '/') {
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
            if (isset($url[1])) {
                $method = $url[1];
                /* AJOUT DU CODE POUR LA QUESTION 7 */
                if (method_exists($controller, $method)) {
                } else {
                    require_once 'controller/ControllerHome.php';
                    $controller = new ControllerHome;
                    echo $controller->error();
                }
                /* FIN DE LA QUESTION 7 */
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

    ?>