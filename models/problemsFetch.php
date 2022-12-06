<?php
/**
 * @file problemsFetch.php
 * @brief file description
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 06.12.2022
 */
function getProblemList(){
    $problemQuery = 'SELECT name, description FROM question';

    require_once 'models/dbConnector.php';
    return executeQuerySelect($problemQuery);
}