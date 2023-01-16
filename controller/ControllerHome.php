<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelRole');


class ControllerHome
{

  public function index()
  {
    twig::render("home-index.php");
  }

  public function indexAuth()
  {
    CheckSession::sessionAuth();
    $membre = new ModelMembre;
    $select = $membre->select();
    twig::render("home-index.php",['membre' => $membre]);
  }

  public function error()
  {
    twig::render("home-error.php");
  }
}