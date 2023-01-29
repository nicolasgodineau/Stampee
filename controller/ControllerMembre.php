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


class ControllerMembre
{
    public function index($id){
        $membre = new ModelMembre;
        $selectMembre = $membre->selectId($id);
        $selectMembres = $membre->select("idMembre");        

        $enchere = new ModelEnchere;
        $selectEnchereMembre = $enchere->selectEnchereMembre($_SESSION['idMembre']);
        $selectAllEncheres = $enchere->selectAllEncheres();

        twig::render('Membre/membre-index.php', ['membre' => $selectMembre,'session' => $_SESSION,'enchereMembre' => $selectEnchereMembre,'encheres' => $selectAllEncheres, 'membres' => $selectMembres]);

    }

    public function create()
    {
        twig::render('Membre/membre-create.php');
    }

    public function store()
    {
        $validation = new Validation;
        extract($_POST);
        $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(45);
        $validation->name('email')->value($email)->pattern('email')->required()->max(50);
        $validation->name('password')->value($password)->max(20)->min(6);
        $validation->name('Role_idRole')->value($Role_idRole)->pattern('int')->required();

        /* Vérification de l'adresse email */
        $membre = new ModelMembre;
        $membreVerifEmail = $membre->verifEmail($_POST['email']);
        if ($membreVerifEmail == 1) {
            $erreurEmailUtiliser = 'Email déja utiliser.';
            twig::render('Membre/membre-create.php', ['erreurEmail' => $erreurEmailUtiliser, 'membre' => $_POST]);
            die();
        }

        /* Vérification de la confirmation du mot de passe */
        if ( $_POST['password'] !== $_POST['passwordVerif']) {
            $erreurMotDePasseConfirmer = "Le mot de passe confirmer n'est pas bon.";
            twig::render('Membre/membre-create.php', ['erreurMotDePasse' => $erreurMotDePasseConfirmer, 'membre' => $_POST]);
            die();

        }

        /* Suite si Email et verrif mot de passe OK */
        if ($validation->isSuccess()) {
            $membre = new ModelMembre;
            $options = [
                'cost' => 10,
            ];
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

            $membreInsert = $membre->insert($_POST);

            twig::render('Membre/membre-login.php');
        }
    }

    public function login()
    {
        twig::render('Membre/membre-login.php');
    }

    public function auth()
    {
        $errors = "";
        $validation = new Validation;
        extract($_POST);
        $validation->name('email')->value($email)->pattern('email')->required()->max(50);
        $validation->name('password')->value($password)->required();

        if ($validation->isSuccess()) {
            $membre = new ModelMembre;
            $checkMembre = $membre->checkMembre($_POST);

            if ($checkMembre == 0) {
                    $errors = "Adresse email non valide";

                twig::render('Membre/membre-login.php', ['errors' => $errors, 'membre' => $_POST]);
            } else {
                $errors = [
                    erreur => 'Mot de passe non valide'];
                }
                twig::render('Membre/membre-login.php', ['errors' => $errors, 'membre' => $_POST]);
            
        } else {
            $errors = "Oups une information n'est pas bonne.";
            twig::render('Membre/membre-login.php', ['errors' => $errors, 'membre' => $_POST]);
        } 
    }

    public function update()
    {
        $membre = new ModelMembre;
        $update = $membre->update($_POST);
        twig::render('Home/home-index.php');
    } 

    public function delete()
    {
        $membre = new ModelMembre;
        $delete = $membre->delete($_POST['idMembre']);
        session_destroy();
        twig::render('Home/home-index.php');    
    }
    
    public function adminDeleteMembre()
    {

        $membre = new ModelMembre;
        $delete = $membre->delete($_POST['idMembre']);
        twig::render('Home/home-index.php');    
    }

    public function show($id)
    {
        $membre = new ModelMembre;
        $selectMembre = $membre->selectId($id);
        twig::render('Membre/membre-show.php');
    }

    public function edit($id)
    {
        $membre = new ModelMembre;
        $selectMembre = $membre->selectId($id);

        twig::render('Membre/membre-edit.php', ['membre' => $selectMembre]);
    }

    public function logout()
    {
        session_destroy();
        requirePage::redirectPage('../home/index');
    }
}