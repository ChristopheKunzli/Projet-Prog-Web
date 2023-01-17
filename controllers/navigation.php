<?php
/**
 * @file     navigation.php
 * @brief    Contains all paths to pages
 * @author   Created by Christophe.KUNZLI
 * @version  18.11.2022
 */

//===========================================================================//
//controllers
//===========================================================================//

function home(): void
{
    require 'views/home.php';
}


function lost(): void
{
    require 'views/gabarit.php';
}

function login(): void
{
    require 'views/login.php';
}

function signin()
{
    require 'views/signin.php';

    //require "views/home.php";

}

//===========================================================================//