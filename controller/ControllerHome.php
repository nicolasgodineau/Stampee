<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelPays');
RequirePage::requireModel('ModelVille');
RequirePage::requireModel('ModelRole');


class ControllerHome
{

  public function index()
  {
/*     CheckSession::sessionAuth();
    $membre = new ModelMembre;
    $select = $membre->select(); */
    twig::render("home-index.php",['membre' => $membre]);
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

  public function create()
  {
    echo "text";
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    $membre = new ModelMembre;
    // Passe en paramètre l'id de la session du membre connecter
    $selectMembre = $membre->selectId($_SESSION["idMembre"]);
    twig::render("enchere-create.php",['membre' => $selectMembre]);
  }
}