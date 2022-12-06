<?php
/**
 * @file problems.php
 * @brief file description
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 06.12.2022
 */
function problemsList(){
    try{
        require_once "models/problemsFetch.php";
        $problemsList = getProblemList();

    }   catch (ModelDataBaseException $ex){
        $articleErrorMessage = "Nous rencontrons des problèmes technique a charger les questions";
    } finally {
        require "views/problems.php";
    }
}