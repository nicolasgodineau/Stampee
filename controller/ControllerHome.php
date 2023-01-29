<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelRole');
RequirePage::requireModel('ModelTimbre');
RequirePage::requireModel('ModelImage');
RequirePage::requireModel('ModelMise');
RequirePage::requireModel('ModelEnchere');
RequirePage::requireModel('ModelFavoris');
RequirePage::requireModel('ModelStatus');


class ControllerHome
{

  public function index()
  {
    twig::render("Home/home-index.php");
  }

  public function error()
  {
    twig::render("Home/home-error.php");
  }
}