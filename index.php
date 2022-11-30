<?php
/**
 * @file     index.php
 * @brief    Redirects to the desired page
 * @author   Created by Christophe.KUNZLI
 * @version  30.11.2022
 */

require 'controllers/navigation.php';

if (isset($_GET['action'])) {

    switch ($_GET['action']){
        case 'home':
            home();
            break;
        default:
            lost();
    }
}else{
    home();
}
