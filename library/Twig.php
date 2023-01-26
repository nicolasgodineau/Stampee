<?php

class Twig
{

    static public function render($template, $data = array())
    {
        $loader = new \Twig\Loader\FilesystemLoader('view');
        // $twig = new \Twig\Environment($loader, array('auto_reload' => true,'cache' => false));
        $twig = new \Twig\Environment($loader, array('auto_reload' => true));
        //$twig->addGlobal('path', 'http://localhost:8888/400-WEB1/430-Exercices/Stampee/');
        $twig->addGlobal('path', 'https://e2295324.webdev.cmaisonneuve.qc.ca/Stampee/');

        $twig->addGlobal('session', $_SESSION);


        if (isset($_SESSION['fingerPrint']) and $_SESSION['fingerPrint'] === md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'])) {
            $guest = false;
        } else {
            $guest = true;
        }
        $twig->addGlobal('guest', $guest);

        echo $twig->render($template, $data);
    }
}