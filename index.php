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

function console_log($output, $with_script_tags = true): void
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

if (isset($_GET['action'])) {

    switch ($_GET['action']) {
        case 'signin':
            signin();
            break;
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
