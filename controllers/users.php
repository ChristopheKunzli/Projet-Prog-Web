<?php
/**
 * @file users.php
 * @brief Manages users and their profiles
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 06.12.2022
 */

/**
 * Creates a new user if it doesn't already exists
 * @param $user
 * @return void
 */
function userSign($user)
{
    try {
        require_once "models/userIdentification.php";
        $user = getUserExistance($user);

    } catch (ModelDataBaseException $ex) {
        $articleErrorMessage = "Nous rencontrons des problèmes technique lors de votre connection";
    }

    return $user;
}

/**
 * Login function
 * @param $user
 * @return void
 */
function userLogin($user)
{
    try {
        require_once "models/userIdentification.php";
        $user = getUserIdentification($user);

    } catch (ModelDataBaseException $ex) {
        $articleErrorMessage = "Nous rencontrons des problèmes technique lors de votre connection";
    }

    return $user;
}

/**
 * Logout function
 * @return void
 */
function deconnection()
{
    session_destroy();
    header("location:index.php?action=home");
    //require "views/home.php";

}

/**
 * Shows a user's profile page
 * @return array
 */
function profile(): array
{
    try {
        require_once "models/userIdentification.php";
        $userData = getUserData();

    } catch (ModelDataBaseException $ex) {
        $articleErrorMessage = "Nous rencontrons des problèmes technique lors de votre connection";
    } finally {
        require 'views/profile.php';

    }
    return $userData;
}
