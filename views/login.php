<?php
/**
 * @file login.php
 * @brief file description
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 06.12.2022
 */
$title = "leakcode - login";
@$login = $_POST["username"];
@$pass = $_POST["inputUserPswd"];
@$valider = $_POST["login"];
$erreur="";
$trypass=userLogin($login);
if(isset($valider)){
    if($pass==$trypass[0]['password']) {

        $_SESSION["connected"]= true;
        //header("location:index.php?action=home");
    }
    else {
        $erreur="le login et le mot de passe ne correspond pas";

    }

}

ob_start();
?>
    <h2>this is the login</h2>
    <form action="" method="post">
        <h4>
            Connectez-vous
        </h4>

        <div>
            <input type="text" name="username" placeholder="Nom d'utilisateur">
        </div>

        <div>
            <input type="password" name="inputUserPswd" placeholder="Mot de passe">
        </div>
        <input type="submit"  name="login" value="login"><br>
        <input type="reset" value="Annuler">

    </form>
<?php if(!empty($erreur)){?>
<div id="erreur" style="background-color: #52CFEB; color: white">
    <?=$erreur?>
</div>


<?php }
$content = ob_get_clean();
require 'gabarit.php';
?>