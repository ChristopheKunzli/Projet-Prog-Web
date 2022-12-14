<?php
/**
 * @file     problemsSet.php
 * @brief    File description
 * @author   Created by Christophe.KUNZLI
 * @version  14.12.2022
 */

function addProbAnswer($userId, $probId, $code): void
{
    $problemQuery = 'INSERT INTO user_anwers_question (user_user_id, question_question_id, code, answer_date) VALUES ('.$userId.','.$probId.','.$code.', '.date("Y-m-d").')';

    require_once 'models/dbConnector.php';
    executeQuerySelect($problemQuery);
}