<?php
/**
 * @file userIdentification.php
 * @brief file description
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 02.12.2022
 */
function getUserIdentification(){
    $userQuery = 'SELECT username, password FROM user';

    require_once 'models/dbConnector.php';
    return executeQuerySelect($userQuery);
}