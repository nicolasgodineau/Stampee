<?php

class ModelMembre extends Crud
{

    protected $table = 'Membre';
    protected $primaryKey = 'idMembre';

    protected $fillable = ['idMembre', 'nom', 'prenom','adresse','telephone','email', 'password','Role_idRole','Pays_idPays'];

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
                $_SESSION['idMembre'] = $membre_info['idMembre'];
                $_SESSION['prenom'] = $membre_info['prenom'];
                $_SESSION['Role_idRole'] = $membre_info['Role_idRole'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
                

                //requirePage::redirectPage('../home/index',['membre_info' => $_SESSION]);

            } else {

                return "<h4>Verifier le mot de passe</h4>";
            }
        } else {
            return "<ul><li>Le non d'utilisateur n'existe pas</li></ul>";
        }
    }
}