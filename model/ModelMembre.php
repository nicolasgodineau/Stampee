<?php

class ModelMembre extends Crud
{

    protected $table = 'Membre';
    protected $primaryKey = 'idMembre';

    protected $fillable = ['idMembre', 'nom', 'prenom','adresse','telephone','email', 'password','Role_idRole'];

    public function checkMembre($data)
    {

        extract($data);
        $sql = "SELECT * FROM $this->table WHERE email = ?";

        $stmt = $this->prepare($sql);
        $stmt->execute(array($email));
        $count = $stmt->rowCount();

        if ($count == 1) {
            $membre_info = $stmt->fetch();
            if (password_verify($password, $membre_info['password'])) {

                session_regenerate_id();
                $_SESSION['prenom'] = $membre_info['prenom'];
                $_SESSION['Role_idRole'] = $membre_info['Role_idRole'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
                //twig::render("home-index.php");

                requirePage::redirectPage('home', ['membre_info' => $membre_info]);
            } else {
                echo '<pre> errer';
                print_r($membre_info);
                echo '</pre>';
                return "<h4>Verifier le mot de passe</h4>";
            }
        } else {
            echo "text";
            return "<ul><li>Le non d'utilisateur n'existe pas</li></ul>";
        }
    }
}