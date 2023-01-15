<?php

/* class RequirePage{
    static public function requireModel($model){
        return require_once "model/$model.php";
    }
    static public function redirectPage($page){
        return header("Location: http://localhost:8888/200-PHP/220-Cours/223-Session3/Cours20/".$page);
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
}