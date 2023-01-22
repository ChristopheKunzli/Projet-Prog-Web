<?php
/**
 * @file signin.php
 * @brief Allow users to create a new account
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
    <h2>this is the signin</h2>
    <div class="container mt-3">
    <h4>
        inscrivez vous
    </h4>

    <form action="" method="post">
    <div class="mb-3 mt-3">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur">
    </div>
    <div class="mb-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" placeholder="email">
    </div>
    <div class="mb-3">
        <label for="inputUserPswd">Mot de passe:</label>
        <input type="password" class="form-control" name="inputUserPswd" placeholder="Mot de passe">
    </div>
    <div class="mb-3">
        <label for="inputUserPswdconfirm">Comfirmer le mot de passe:</label>
        <input type="password" class="form-control" name="inputUserPswdconfirm" placeholder="confirmation de mdp">
    </div>
<?php if (!empty($erreur)) { ?>
    <div id="erreur" style="background-color: #52CFEB; color: white" class="mb-3">
        <?= $erreur ?>
    </div>
        <?php }?>

    <button type="submit" name="sign" class="btn btn-primary">signin</button>
    <button type="reset" class="btn btn-primary" >Annuler </button>

    </form>

    </div>



<?php
$content = ob_get_clean();
require 'gabarit.php';
?>