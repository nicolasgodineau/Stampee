<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelPays');
RequirePage::requireModel('ModelVille');
RequirePage::requireModel('ModelRole');


class ControllerEnchere
{


public function create()
{
    echo "text enchère";

    $membre = new ModelMembre;
    // Passe en paramètre l'id de la session du membre connecter
    $selectMembre = $membre->selectId($_SESSION["idMembre"]);
    twig::render("enchere-create.php",['membre' => $selectMembre]);
}
}