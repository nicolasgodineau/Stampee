<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelRole');
RequirePage::requireModel('ModelTimbre');
RequirePage::requireModel('ModelImage');
RequirePage::requireModel('ModelMise');
RequirePage::requireModel('ModelEnchere');
RequirePage::requireModel('ModelFavoris');
RequirePage::requireModel('ModelTimer');
RequirePage::requireModel('ModelStatus');


class ControllerEnchere
{

    public function index()
    {
        $enchere = new ModelEnchere;
        $selectAllEncheres = $enchere->selectAllEncheres();
        twig::render("Enchere/enchere-index.php",['encheres' => $selectAllEncheres]);
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

        // Vérifie si la date est déja dans la BD, si oui, alors Timer_idTimer prend sa valeur (pas de création de ligne dans la BD), si non, création d'une ligne dans la BD 
        $date = $_POST['date'];
        $timer = new ModelTimer;
        $timerSet = $timer->addDate($date);
        $_POST["Timer_idTimer"] = $timerSet['idTimer'];

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

        twig::render("Enchere/enchere-index.php");
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

        $timer = new ModelTimer;
        $dateFin = $timer -> setTimer($selectEnchere['Timer_idTimer']);
        $selectEnchere['dateFin'] = $dateFin['date'];
        $fin = $selectEnchere['dateFin'];

        // Permet d'afficher la mise de l'enchere + 50$ (pour faire la mise minimum)
        $enchereSup = $selectEnchere['mise'] + 50;
        $selectEnchere["enchereSuperieur"] = $enchereSup;
        ?>
<script>
/* Source pour le script = https://www.nicesnippets.com/blog/creating-dynamic-countdown-in-php-javascript */
<?php 
            $dateTime = strtotime($fin, '23:59:59');

            $getDateTime = date("F d, Y H:i:s", $dateTime); 
                    ?>
var countDownDate = new Date("<?php echo "$getDateTime"; ?>").getTime();
// Update the count down every 1 second
var x = setInterval(function() {
    var now = new Date().getTime();
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    // Output the result in an element with id="counter"11
    document.querySelector(".temps_restant h2 span").innerHTML = "Termine dans "
    days + " Jour : " + hours + "h " +
        minutes + "m " + seconds + "s ";
    // If the count down is over, write some text
    if (distance < 0) {
        clearInterval(x);
        document.querySelector(".temps_restant h2 span").innerHTML = "Terminer";
    }
}, 1000);
</script>
<?php

        
        twig::render("Enchere/enchere-show.php",['enchere' => $selectEnchere, 'membre' => $selectMembre]);
    }
    
}