<?php

class ControllerHome
{

  public function index()
  {
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    $data = [
      'name' => 'Peter',
      'welcome' => 'Welcome'
    ];
    twig::render("home-index.php", $data);
  }

  public function error()
  {
    twig::render("home-error.php");
  }
}