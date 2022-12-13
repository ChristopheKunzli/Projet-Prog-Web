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

if (isset($_GET['action'])) {

    switch ($_GET['action']) {
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
            //problems();
            break;
        case 'problem':
            problemX();
            break;
        case 'submit':
            submit($_POST["txtCode"]);
            break;
        default:
            lost();
            break;
    }
} else {
    home();
}
