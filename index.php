<?php

/**
 * @file     index.php
 * @brief    Redirects to the desired page
 * @author   Created by Christophe.KUNZLI
 * @version  30.11.2022
 */

require 'controllers/navigation.php';
require 'controllers/problems.php';
require 'controllers/users.php';

session_start();



if (isset($_GET['action'])) {

    switch ($_GET['action']) {
        case 'deconnection':
            deconnection();
            break;
        case 'profile':
            profile();
            break;
        case 'login':
            login();
            break;
        case 'home':
            home();
            break;
        case'problems':
            problemsList();
            break;
        case 'problem':
            problemX();
            break;
        case 'submit':
            submit($_POST);
            break;
        default:
            lost();
            break;
    }
} else {
    home();
}
