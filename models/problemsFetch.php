<?php
/**
 * @file problemsFetch.php
 * @brief Contains functions used to retrieve data about problems
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 06.12.2022
 */
function getProblemList()
{
    $problemQuery = 'SELECT id, name, Difficulty_id FROM question WHERE is_accepted = 1';

    require_once 'models/dbConnector.php';
    return executeQuerySelect($problemQuery);
}

function getProblem($id): array
{
    $query = "SELECT id, name, description, constraints, preload FROM question WHERE id = " . $id;
    require_once 'models/dbConnector.php';
    return executeQuerySelect($query)[0];
}

function getExamples($id): array
{
    $query =
        "SELECT example.question_id, inputs.value, example.example_output, example.explanation, example.image FROM example LEFT JOIN inputs ON example.id=inputs.example_id HAVING example.question_id = " . $id;
    require_once 'models/dbConnector.php';
    return executeQuerySelect($query);
}

function getAnwer($questionid, $userid): array
{
    $query = "SELECT error_message, program_output FROM user_anwers_question WHERE question_id = " . $questionid . " AND user_id = " . $userid . " ORDER BY id DESC LIMIT 1";
    require_once 'models/dbConnector.php';
    return executeQuerySelect($query);
}
function getLastTry($questionid, $userid) : array
{
    $query = "SELECT code,id FROM user_anwers_question WHERE question_id = " . $questionid . " AND user_id = " . $userid . " ORDER BY id DESC LIMIT 1 ;";
    require_once 'models/dbConnector.php';
    return executeQuerySelect($query);
}
function getResultsTry($lasttryid)
{

    $query = "SELECT user_anwers_example.error , inputs.value , user_anwers_example.output , example.example_output FROM user_anwers_question 
    LEFT JOIN user_anwers_example ON user_anwers_example.user_anwers_question_id= user_anwers_question.id  
    LEFT JOIN example ON user_anwers_example.example_id= example.id 
    LEFT JOIN inputs ON example.id=inputs.example_id Where user_anwers_question.id = ".$lasttryid.";";
    require_once 'models/dbConnector.php';
    return executeQuerySelect($query);
}