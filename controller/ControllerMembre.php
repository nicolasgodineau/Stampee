<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelPays');
RequirePage::requireModel('ModelRole');

class ControllerMembre
{

    public function index()
    {
    }

    public function create()
    {
Twig::render('membre-create.php', ['privileges' => $select]);
    }
/*     public function create()
    {
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
        $privileges = new ModelRole;
        echo '<pre>';
        print_r($privileges);
        echo '</pre>';
        $select = $privileges->select('privilege');
        return Twig::render('membre-create.php', ['privileges' => $select]);
    } */
    public function store()
    {
        if ($_SESSION['Role_idRole'] == 2) {
            $_POST['Role_idRole'] = 3;
        }
        $validation = new Validation;
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        extract($_POST);
        $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(45);
        $validation->name('email')->value($email)->pattern('email')->required()->max(50);
        $validation->name('password')->value($password)->max(20)->min(6);
        $validation->name('Role_idRole')->value($Role_idRole)->pattern('int')->required();

        if ($validation->isSuccess()) {
            $user = new ModelMembre;
            $options = [
                'cost' => 10,
            ];
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            $userInsert = $user->insert($_POST);
            echo '<pre>';
            print_r($userInsert);
            echo '</pre>';
            echo "text yes";
            requirePage::redirectPage('book/index');
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
        $validation->name('username')->value($username)->pattern('email')->required()->max(50);
        $validation->name('password')->value($password)->required();

        if ($validation->isSuccess()) {
            $user = new ModelMembre;
            $checkUser = $user->checkUser($_POST);

            twig::render('book-index.php', ['errors' => $checkUser, 'user' => $_POST]);
        } else {
            $errors = $validation->displayErrors();
            twig::render('membre-login.php', ['errors' => $errors, 'user' => $_POST]);
        }
    }

    public function update()
    {
        $user = new ModelMembre;
        $update = $user->update($_POST);
        RequirePage::redirectPage('book/index');
    }

    public function delete()
    {
        $user = new ModelMembre;
        $delete = $user->delete($_POST['id']);
        RequirePage::redirectPage('book/index');
    }

    public function show($id)
    {
        $user = new ModelMembre;
        $selectUser = $user->selectId($id);
        twig::render('user-show.php', ['user' => $selectUser]);
    }

    public function edit($id)
    {
        $user = new ModelMembre;
        $privilege = new ModelRole;
        $selectUser = $user->selectId($id);
        $selectPrivilege = $privilege->select();
        twig::render('user-edit.php', ['user' => $selectUser, 'privilege' => $selectPrivilege]);
    }

    public function logout()
    {
        session_destroy();
        twig::render('home-index.php');
    }
}