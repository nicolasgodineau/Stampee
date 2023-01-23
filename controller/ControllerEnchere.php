<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelPays');
RequirePage::requireModel('ModelRole');
RequirePage::requireModel('ModelTimbre');
RequirePage::requireModel('ModelImage');
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
        $image = new ModelImage;
        $imageInsert = $image->insertImage($_POST);

        $_POST["Image_idImage"] = $imageInsert;


        $timbre = new ModelTimbre;
        $timbreInsert = $timbre->insert($_POST);

        // Ajout l'id de l'insert dans la table timbre
        $_POST["Timbre_idTimbre"] = $timbreInsert;
/*         echo '<pre> POST';
        print_r($_POST);
        echo '</pre>';
        echo '<pre>';
        print_r($timbreInsert);
        echo '</pre>';
        die(); */

        // Dans le formulaire, j'utilise l'id de la session comme FK_Membre pour la table enchère, la FK_Timbre est récupérer via lastInsert (id) du timbre
        $enchere = new ModelEnchere;
        $enchereInsert = $enchere->insertEnchere($_POST);



   

        //twig::render("enchere-create.php",['membre' => $selectMembre]);
    }
}