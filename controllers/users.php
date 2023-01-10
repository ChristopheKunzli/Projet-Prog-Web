<?php
/**
 * @file users.php
 * @brief file description
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 06.12.2022
 */
function userLogin($user)
{
    try {
        require_once "models/userIdentification.php";
        $user = getUserIdentification($user);

    } catch (ModelDataBaseException $ex) {
        $articleErrorMessage = "Nous rencontrons des problèmes technique lors de votre connection";
    } finally {
        //require "views/login.php";

    }
    return $user;
}

function deconnection()
{
    session_destroy();
    header("location:index.php?action=home");
    //require "views/home.php";

}
function profile(): void
{
    require_once "models/userIdentification.php";

    require 'views/profile.php';
}