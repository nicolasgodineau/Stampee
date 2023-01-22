<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelPays');
RequirePage::requireModel('ModelRole');


class ControllerHome
{

  public function index()
  {
    twig::render("home-index.php");
  }

  public function error()
  {
    twig::render("home-error.php");
  }
}