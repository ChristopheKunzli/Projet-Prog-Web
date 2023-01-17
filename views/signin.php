<?php
/**
 * @file signin.php
 * @brief file description
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 10.01.2023
 */
$title = "leakcode - login";
@$signin = $_POST["username"];
@$pass = $_POST["inputUserPswd"];
@$confirmpass = $_POST["inputUserPswdconfirm"];
@$email = $_POST["email"];
@$valider = $_POST["sign"];
$erreur = "";


if (isset($valider)) {
    if ($pass != $confirmpass) {
        $erreur = "les mot de passe ne correspond pas";

    } else {
        $trypass = userSign($signin);
        if (isset($trypass[0]['id'])) {
            $erreur = "l'utilisateur existe déjà";
        } else {
            userAdd($signin, $pass, $email);
            $newlog = userLogin($signin);
            $_SESSION["connected"] = $newlog[0]['id'];
            header("location:index.php?action=home");

        }
    }

}
ob_start();
?>
    <h2>this is the login</h2>
    <form action="" method="post">
        <h4>
            inscrivez vous
        </h4>

        <div>
            <input type="text" name="username" placeholder="Nom d'utilisateur">
        </div>
        <div>
            <input type="email" name="email" placeholder="email">
        </div>
        <div>
            <input type="password" name="inputUserPswd" placeholder="Mot de passe">
        </div>
        <div>
            <input type="password" name="inputUserPswdconfirm" placeholder="confirmation de mdp">
        </div>
        <input type="submit" name="sign" value="sign"><br>
        <input type="reset" value="Annuler">

    </form>
<?php if (!empty($erreur)) { ?>
    <div id="erreur" style="background-color: #52CFEB; color: white">
        <?= $erreur ?>
    </div>
    <a href="index.php?action=signin"

<?php }
$content = ob_get_clean();
require 'gabarit.php';
?>