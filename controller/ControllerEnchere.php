<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelPays');
RequirePage::requireModel('ModelRole');
RequirePage::requireModel('Modeltimbre');


class ControllerEnchere
{

    public function create()
    {

        //CheckSession::sessionAuth();
        // Pour avoir l'id du membre connecter via la session 
        // Alternative
        // $membre = new ModelMembre;
        // Passe en paramètre l'id de la session du membre connecter
        //$selectMembre = $membre->selectId($_SESSION["idMembre"]);
        // twig::render("enchere-create.php",['membre' => $selectMembre]);

        $selectMembre = $_SESSION["idMembre"];
        twig::render('enchere-create.php',['membre' => $selectMembre]);
    }

    public function store()
    {
        echo '<pre>';
        print_r($_SESSION["idMembre"]);
        echo '</pre>';
        echo "text enchère";
        die();
        $membre = new ModelMembre;
        // Passe en paramètre l'id de la session du membre connecter
        $selectMembre = $membre->selectId($_SESSION["idMembre"]);

        $timbre = new ModelTimbre;
        //$timbreInsert = $timbre->insert($_POST);
        echo '<pre>';
        print_r($timbre);
        echo '</pre>';

        //twig::render("enchere-create.php",['membre' => $selectMembre]);
    }
}