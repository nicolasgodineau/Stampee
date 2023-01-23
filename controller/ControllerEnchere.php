<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelPays');
RequirePage::requireModel('ModelRole');
RequirePage::requireModel('ModelTimbre');
RequirePage::requireModel('ModelEnchere');


class ControllerEnchere
{

    public function create()
    {
        CheckSession::sessionAuth();
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
        //$timbre = new ModelTimbre;
        //$timbreInsert = $timbre->insert($_POST);

        $enchere = new ModelEnchere;
        $enchereInsert = $enchere->insert($_POST);
        echo '<pre>';
        print_r($enchereInsert);
        echo '</pre>';
        die();

        // NOTE l'insert dans la table enchère ne marche pas
        // Piste à chercher:
        // Il faut peuetre faire l'insert du timbre dans sa table, puis récupere l'id du timbre, via lastinsert (chercher dans le code ou c'est)
        // avec ce lastInsert, on peut créer un tableau ? ou faire un insert dans la table enchère de cet id du timbre, il faut aussi l'id du membre


        //twig::render("enchere-create.php",['membre' => $selectMembre]);
    }
}