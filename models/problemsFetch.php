<?php
/**
 * @file problemsFetch.php
 * @brief file description
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 06.12.2022
 */
function getProblemList()
{
    $problemQuery = 'SELECT question_id, name, description FROM question';

    require_once 'models/dbConnector.php';
    return executeQuerySelect($problemQuery);
}

function getProblem($id): array
{
    $query = "SELECT question_id, name, description, constraints FROM question WHERE question_id = " . $id;
    require_once 'models/dbConnector.php';
    return executeQuerySelect($query)[0];
}

function getExamples($id): array
{
    $query = "SELECT input, output, explanation, image FROM example WHERE question_question_id = " . $id;
    require_once 'models/dbConnector.php';
    return executeQuerySelect($query);
}