<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelPays');
RequirePage::requireModel('ModelRole');
RequirePage::requireModel('ModelTimbre');
RequirePage::requireModel('ModelImage');
RequirePage::requireModel('ModelMise');
RequirePage::requireModel('ModelEnchere');
RequirePage::requireModel('ModelFavoris');


class ControllerEnchere
{

    public function index()
    {
        $enchere = new ModelEnchere;
        $selectAllEncheres = $enchere->selectEncheres();
        twig::render("enchere-index.php",['encheres' => $selectAllEncheres,]);
    }

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
        
        // Ajout l'id de l'insert de la table image dans le POST pour faire l'insert de l'image
        $_POST["Image_idImage"] = $imageInsert;

        $timbre = new ModelTimbre;
        $timbreInsert = $timbre->insert($_POST);

        // Ajout des ids de l'insert de la table timbre dans le POST pour faire l'insert de l'enchère
        $_POST["Timbre_idTimbre"] = $timbreInsert;
        $_POST['Membre_idMembre'] = $_POST['idMembre'];

        $enchere = new ModelEnchere;
        $enchereInsert = $enchere->insertEnchere($_POST);

        // Ajout des ids de l'insert de la table enchere dans le POST pour faire l'insert de la mise
        $_POST["Enchere_Membre_idMembre"] = $_POST["Membre_idMembre"];
        $_POST["Enchere_Timbre_idTimbre"] = $_POST["Timbre_idTimbre"];
        
        $mise = new ModelMise;
        $miseInsert = $mise->insertMise($_POST);

        //twig::render("enchere-create.php",['membre' => $selectMembre]);
    }
}