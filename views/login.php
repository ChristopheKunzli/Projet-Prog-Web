<?php
/**
 * @file login.php
 * @brief Users can use this page to login to their account
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 06.12.2022
 */
$title = "leakcode - login";
@$login = $_POST["username"];
@$pass = $_POST["inputUserPswd"];
@$valider = $_POST["login"];
$erreur = "";
$trypass = userLogin($login);
if (isset($valider)) {
    if ($pass == $trypass[0]['password']) {

        $_SESSION["connected"] = $trypass[0]['id'];
        header("location:index.php?action=home");
    } else {
        $erreur = "le login et le mot de passe ne correspond pas";

    }

}

ob_start();
?>
    <h2>this is the login</h2>
    <div class="container mt-3">
        <h4>
            Connectez-vous
        </h4>
    <form  action="" method="post">
        <div class="mb-3 mt-3">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur">
        </div>

        <div class="mb-3">
            <label for="inputUserPswd">Mot de passe:</label>
            <input type="password" name="inputUserPswd" class="form-control" placeholder="Mot de passe">
        </div>
        <?php if (!empty($erreur)) { ?>
            <div id="erreur" style="background-color: #52CFEB; color: white" class="mb-3">
                <?= $erreur ?>

            </div>


        <?php }
        ?>

        <button type="submit" name="login" class="btn btn-primary">login</button>
        <button type="reset" class="btn btn-primary" >Annuler </button>


    </form>
    </div>

    <div class="container  mt-3">
        <h4 class="align-self-center">
            Pas encore inscrit
        </h4>
        <a class="btn btn-outline-primary col-12" href="index.php?action=signin">signer ici</a>
    </div>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>