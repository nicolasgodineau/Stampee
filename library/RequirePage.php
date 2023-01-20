<?php

/* class RequirePage
{
    static public function requireModel($model)
    {
        return require_once "model/$model.php";
    }
    static public function redirectPage($page)
    {
        // return header("Location: $page");
        return header("Location: http://localhost:8888/200-PHP/230-Exercices/233-Session3/TP3/" . $page);
    }
} */

class RequirePage
{
    static public function requireModel($model)
    {
        return require_once "model/$model.php";
    }
    static public function redirectPage($page)
    {
        return header("Location: $page");
    }
    static public function requireComposantePays()
    {
        return require_once "vendor/stefangabos/world_countries/data/countries/fr/countries.php";
    }
}