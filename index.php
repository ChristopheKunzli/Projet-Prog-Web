<?php

//===========================================================================//
//controllers
//===========================================================================//

require 'controllers/navigation.php'; //home and error

//===========================================================================//

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action){
        case 'home':
            home();
            break;
        default:
            lost();
    }
}else{
    home();
}
