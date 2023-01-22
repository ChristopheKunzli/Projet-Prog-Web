<?php
/**
 * @file userIdentification.php
 * @brief Contains functions used to retrieve data about users
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 02.12.2022
 */
function userAdd($user, $password, $email)
{
    $date = '"' . date("Y-m-d") . '"';
    $userQuery = 'INSERT INTO user (username, password, email_address, registration_date ,rank_id) VALUES ("' . $user . '","' . $password . '","' . $email . '",' . $date . ',1);';

    require_once 'models/dbConnector.php';
    return executeQueryInsert($userQuery);
}

function getUserExistance($user)
{
    $userQuery = 'SELECT id FROM user WHERE username = "' . $user . '";';

    require_once 'models/dbConnector.php';
    return executeQuerySelect($userQuery);
}

function getUserIdentification($user)
{
    $userQuery = 'SELECT id, password FROM user WHERE username = "' . $user . '";';

    require_once 'models/dbConnector.php';
    return executeQuerySelect($userQuery);
}

function getUserData()
{
    $userQuery = 'SELECT DISTINCT user.username, user.email_address, user.registration_date, rank.rank_name, question.id AS question_id ,question.name AS question_name, difficulty.name AS difficulty, user_anwers_question.succeed As succeed
FROM user 
INNER JOIN rank ON user.rank_id=rank.id 
LEFT JOIN user_anwers_question ON user.id = user_anwers_question.user_id
left JOIN question ON user_anwers_question.question_id=question.id
LEFT Join difficulty ON question.Difficulty_id =difficulty.id
WHERE user.id=' . $_SESSION['connected'] . ';';

    require_once 'models/dbConnector.php';
    return executeQuerySelect($userQuery);
}