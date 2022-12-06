<?php
/**
 * @file login.php
 * @brief file description
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 06.12.2022
 */
?>
<h2>this is the login</h2>
<form  action="index.php?action=login" method="post">
    <h4 >
        Connectez-vous
    </h4>

    <div >
        <input  type="email" name="inputEmail" placeholder="Adresse email">
    </div>

    <div >
        <input  type="password" name="inputUserPswd" placeholder="Mot de passe">
    </div>
    <input type="submit" value="login" ><br>
    <input type="reset" value="Annuler" >

</form>