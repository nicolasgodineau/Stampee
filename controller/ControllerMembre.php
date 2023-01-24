<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelPays');
RequirePage::requireModel('ModelRole');
RequirePage::requireModel('ModelEnchere');
RequirePage::requireModel('ModelMise');


class ControllerMembre
{
    public function index($id){

        $membre = new ModelMembre;
        $selectMembre = $membre->selectId($id);
        $selectMembres = $membre->select("idMembre");

        $pays = new ModelPays;
        /* Pour l'affichage de tous les pays dans un select */
        $selectAllPays = $pays->select("pays"); 
        /* Pour l'affichage du pays du membre */
        $selectPaysMembre = $pays->selectPaysMembre(); 

        $enchere = new ModelEnchere;
        $selectEnchereMembre = $enchere->selectEnchereMembre($_SESSION['idMembre']);
        $selectAllEncheres = $enchere->selectEncheres();

        twig::render('membre-index.php', ['membre' => $selectMembre, 'allPays' => $paysAllSelect,'session' => $_SESSION,'enchereMembre' => $selectEnchereMembre,'encheres' => $selectAllEncheres, 'membres' => $selectMembres, 'paysMembre' => $selectPaysMembre]);

    }

    public function create()
    {
        // A déplacer dans la fonction store (faire tests)
        $pays = new ModelPays;
        $paysSelect = $pays->select("pays"); 
        Twig::render('membre-create.php', ['paysS' => $paysSelect]);
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
            
            twig::render('membre-create.php',['membre' => $_POST]);
            die();
        }  */ 


            if ($validation->isSuccess()) {
                $_POST['Pays_idPays'] = $pays;
                $user = new ModelMembre;
                $options = [
                    'cost' => 10,
                ];
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

                $userInsert = $user->insert($_POST);

                twig::render('membre-login.php');
        } else {
                $errors = $validation->displayErrors();
                $privilege = new ModelRole;
                $selectPrivilege = $privilege->select();
                twig::render('book-index.php', ['errors' => $errors, 'privileges' => $selectPrivilege, 'user' => $_POST]);
            }
        
    }

    public function login()
    {
        twig::render('membre-login.php');
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
            twig::render('home-index.php', ['errors' => $checkMembre, 'membre' => $_POST]);
        } else {
            $errors = $validation->displayErrors();
            twig::render('membre-login.php', ['errors' => $errors, 'membre' => $_POST]);
        } 
    }

    public function update()
    {
        $membre = new ModelMembre;
        $update = $membre->update($_POST);
        twig::render('membre-edit.php', ['membre' => $_POST]);
    }

    public function delete()
    {
        $membre = new ModelMembre;
        $delete = $membre->delete($_POST['idMembre']);
        session_destroy();
        twig::render('home-index.php');    
    }

    public function show($id)
    {
        $membre = new ModelMembre;
        $selectMembre = $membre->selectId($id);
        twig::render('membre-show.php');
    }

    public function edit($id)
    {
        $membre = new ModelMembre;
        $selectMembre = $membre->selectId($id);

        $pays = new ModelPays;
        $paysSelect = $pays->select("pays"); 
        twig::render('membre-edit.php', ['membre' => $selectMembre, 'paysS' => $paysSelect]);
    }

    public function logout()
    {
        session_destroy();
        requirePage::redirectPage('../home/index');
    }
}