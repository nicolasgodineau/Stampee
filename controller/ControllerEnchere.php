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


class ControllerEnchere
{

    public function index()
    {
        $enchere = new ModelEnchere;
        $selectAllEncheres = $enchere->selectAllEncheres();
        
        $mise = new ModelMise;
        $AllEncheresAvecMise = [];
        foreach ($selectAllEncheres as $uneEnchere):
            $selectLastMise = $mise->lastMise($uneEnchere['idTimbre']);
            $uneEnchere['mise'] += $selectLastMise['mise'];
            array_push($AllEncheresAvecMise,$uneEnchere);
        endforeach;        
        twig::render("Enchere/enchere-index.php",['encheres' => $AllEncheresAvecMise]);
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
        twig::render('Enchere/enchere-create.php',['membre' => $selectMembre]);
    }

    public function adminDeleteEnchere()
    {
        $id = $_POST['idTimbre'];
        $enchere = new ModelEnchere;
        $enchereDelete = $enchere->deleteEnchere($id);

        $timbre = new ModelTimbre;
        $timbreDelete = $timbre->deleteTimbre($id);


        twig::render('Home/home-index.php');    
    }

    public function store()
    {
        $_POST["Status_idStatus"] = 1;


        // Ajout l'id de l'insert de la table image dans le POST pour faire l'insert de l'image
        $timbre = new ModelTimbre;
        $timbreInsert = $timbre->insert($_POST);

        $_POST["Timbre_idTimbre"] = $timbreInsert;

        $image = new ModelImage;
        $imageInsert = $image->insert($_POST);

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

        RequirePage::redirectPage('../enchere/index');

    }

    public function changeStatus($idTimbre){
        // Changement de status de l'enchère, elle passe de 1 = actif à 3 = supprimer (ne supprime pas le ligne dans la bd)
        $enchere = new ModelEnchere;
        $changeStatus = $enchere->changeStatus($idTimbre);
        echo '<pre>';
        print_r($changeStatus);
        echo '</pre>';
        twig::render("Home/home-index.php");

    }

    public function show($id){
        $enchere = new ModelEnchere;
        $selectEnchere = $enchere->selectEnchere($id);

        // Permet d'afficher la mise de l'enchere + 50$ (pour faire la mise minimum)
        $enchereSup = $selectEnchere['mise'] + 50;
        $selectEnchere["enchereSuperieur"] = $enchereSup;
        /* Source pour le script = https://www.nicesnippets.com/blog/creating-dynamic-countdown-in-php-javascript */

        twig::render("Enchere/enchere-show.php",['enchere' => $selectEnchere, 'membre' => $selectMembre, 'session' => $_SESSION]);
    }

    public function ajoutMise()
    {
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        $mise = new ModelMise;
        $miseUpdate = $mise->updateMise($_POST);

        twig::render("Enchere/enchere-index.php");
    }

    
}