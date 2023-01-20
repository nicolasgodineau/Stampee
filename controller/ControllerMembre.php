<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelPays');
RequirePage::requireModel('ModelVille');
RequirePage::requireModel('ModelRole');

class ControllerMembre
{

    public function create()
    {
    Twig::render('membre-create.php', ['privileges' => $select]);
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
                $ville = new ModelVille;
                $villeInsert = $ville->insert($_POST);
                $_POST['Ville_idVille']=$villeInsert;                
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

            //RequirePage::redirectPage('home/index', ['errors' => $checkMembre, 'membre' => $_POST]);

            twig::render('home/index', ['errors' => $checkMembre, 'membre' => $_POST]);
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
        twig::render('membre-edit.php', ['membre' => $selectMembre]);
    }

    public function logout()
    {
        session_destroy();
        requirePage::redirectPage('../home/index');
    }
}