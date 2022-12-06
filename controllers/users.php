<?php
/**
 * @file users.php
 * @brief file description
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 06.12.2022
 */
function userLogin(){
    try{
        require_once "models/userIdentification.php";
        $userID = getUserIdentification();

    }   catch (ModelDataBaseException $ex){
        $articleErrorMessage = "Nous rencontrons des problèmes technique lors de votre connection";
    } finally {
        require "views/login.php";
    }
}