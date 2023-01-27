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
        // A déplacer dans la fonction store (faire tests)
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
        /* 
        if ( $_POST['password'] !== $_POST['passwordConfirm']) {
            return '<h3>Non valide</h3>';
            
            twig::render('Membre/membre-create.php',['membre' => $_POST]);
            die();
        }  */ 


            if ($validation->isSuccess()) {
                $user = new ModelMembre;
                $options = [
                    'cost' => 10,
                ];
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

                $userInsert = $user->insert($_POST);

                twig::render('Membre/membre-login.php');
        } else {
                $errors = $validation->displayErrors();
                $privilege = new ModelRole;
                $selectPrivilege = $privilege->select();
                twig::render('book-index.php', ['errors' => $errors, 'privileges' => $selectPrivilege, 'user' => $_POST]);
            }
        
    }

    public function login()
    {
        twig::render('Membre/membre-login.php');
    }

    public function auth()
    {
        $validation = new Validation;
        extract($_POST);
        $validation->name('email')->value($email)->pattern('email')->required()->max(50);
        $validation->name('password')->value($password)->required();
        if ($validation->isSuccess()) {
            $membre = new ModelMembre;
            $checkMembre = $membre->checkMembre($_POST);
            twig::render('Home/home-index.php', ['errors' => $checkMembre, 'membre' => $_POST]);
        } else {
            $errors = $validation->displayErrors();
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