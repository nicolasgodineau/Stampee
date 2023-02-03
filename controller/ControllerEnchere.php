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
        $favoris = new ModelFavoris;
        $mise = new ModelMise;

        $selectAllEncheres = $enchere->selectAllEncheres();



        $allEncheresAvecMise = [];
        foreach ($selectAllEncheres as $uneEnchere):
            $date = $uneEnchere["dateFin"];
            $dateTime = strtotime($date);
            $getDateTime = date("F d, Y H:i:s", $dateTime); 
            $uneEnchere["dateFormater"] = $getDateTime;

            $selectLastMise = $mise->lastMise($uneEnchere['idTimbre']);
            $uneEnchere['mise'] = $selectLastMise['mise'];

            $count = $favoris->compterFavoris($uneEnchere['idTimbre']);
            $uneEnchere['like'] = $count;

            array_push($allEncheresAvecMise,$uneEnchere);
        endforeach;

        $favorisMembre = [];
        if (array_key_exists('Role_idRole',$_SESSION)) {
            // Permet de savoir si le membre connecter à liker le timbre, si oui alrs on affiche un coeur rouge
            $afficherFavoris = $favoris->afficherFavoris($_SESSION['idMembre']);
            foreach ($afficherFavoris as $unFavoris):
                array_push($favorisMembre,$unFavoris['Enchere_Timbre_idTimbre']);
            endforeach;
        }

        print_r($_SESSION);

        twig::render("Enchere/enchere-index.php",['encheres' => $allEncheresAvecMise, 'session' => $_SESSION, 'favorisMembre' => $favorisMembre]);
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

        // Préparation de l'insert de l'image
        $tmp_name= $_FILES['image']['tmp_name'];
        
        $fileextension= pathinfo($_FILES['image']['name']);
        $fileextension = $fileextension['extension'];
        $name = 'timbre'.$timbreInsert . "." . $fileextension; 
        $path= 'assets/img/timbre/';


        move_uploaded_file($tmp_name, $path.$name);
        //Modification du nom de l'image dans le post
        $_POST['image'] = $name;
        $image = new ModelImage;
        $imageInsert = $image->insert($_POST);



        // Ajout des ids de l'insert de la table timbre dans le POST pour faire l'insert de l'enchère
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

    public function changeStatus($idTimbre)
    {
        // Changement de status de l'enchère, elle passe de 1 = actif à 3 = supprimer (ne supprime pas le ligne dans la bd)
        $enchere = new ModelEnchere;
        $changeStatus = $enchere->changeStatus($idTimbre);
        echo '<pre>';
        print_r($changeStatus);
        echo '</pre>';
        twig::render("Home/home-index.php");

    }

    public function show($idTimbre)
    {
        $erreur = 'erreur';
        $enchere = new ModelEnchere;
        $selectEnchere = $enchere->selectEnchere($idTimbre);

        $favoris = new ModelFavoris;
        $count = $favoris->compterFavoris($idTimbre);
        $selectEnchere['like'] = $count;

        // Permet de savoir si le membre connecter à liker le timbre, si oui alrs on affiche un coeur rouge
        $favorisMembre = [];
        if (array_key_exists('Role_idRole',$_SESSION)) {
            // Permet de savoir si le membre connecter à liker le timbre, si oui alrs on affiche un coeur rouge
            $afficherFavoris = $favoris->afficherFavoris($_SESSION['idMembre']);
            foreach ($afficherFavoris as $unFavoris):
                array_push($favorisMembre,$unFavoris['Enchere_Timbre_idTimbre']);
            endforeach;
        }

        // Permet d'afficher la mise de l'enchere + 50$ (pour faire la mise minimum)
        $enchereSup = $selectEnchere['mise'] + 50;
        $selectEnchere["enchereSuperieur"] = $enchereSup;

        $dateTime = strtotime($selectEnchere["dateFin"]);
        $getDateTime = date("F d, Y H:i:s", $dateTime); 
        $selectEnchere["dateFormater"] = $getDateTime;
        twig::render("Enchere/enchere-show.php",['enchere' => $selectEnchere, 'session' => $_SESSION,'favorisMembre' => $favorisMembre]);
    }

    public function filtrer(){

        $enchere = new ModelEnchere;
        $favoris = new ModelFavoris;
        $mise = new ModelMise;
        
        $selectAllEncheresFiltrer = $enchere->filtre($_POST);

        $allEncheresFiltrer = [];
        foreach ($selectAllEncheresFiltrer as $uneEnchere):
            $dateTime = strtotime($uneEnchere["dateFin"], '23:59:59');
            $getDateTime = date("F d, Y H:i:s", $dateTime); 
            $uneEnchere["dateFormater"] = $getDateTime;

            $selectLastMise = $mise->lastMise($uneEnchere['idTimbre']);
            $uneEnchere['mise'] = $selectLastMise['mise'];

            $count = $favoris->compterFavoris($uneEnchere['idTimbre']);
            $uneEnchere['like'] += $count;

            array_push($allEncheresFiltrer,$uneEnchere);
        endforeach;


        // Permet de savoir si le membre connecter à liker le timbre, si oui alrs on affiche un coeur rouge
        $favorisMembre = [];
        $afficherFavoris = $favoris->afficherFavoris($_SESSION['idMembre']);
        foreach ($afficherFavoris as $unFavoris):
            array_push($favorisMembre,$unFavoris['Enchere_Timbre_idTimbre']);
        endforeach;



        RequirePage::redirectPage('../enchere/index',['encheres' => $allEncheresFiltrer, 'session' => $_SESSION, 'favorisMembre' => $favorisMembre]);



    }


    
}