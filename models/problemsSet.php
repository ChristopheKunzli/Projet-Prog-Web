<?php
/**
 * @file     problemsSet.php
 * @brief    File description
 * @author   Created by Christophe.KUNZLI
 * @version  14.12.2022
 */

function addProbAnswer($userId, $probId, $code): void
{
    $date= '"'.date("Y-m-d").'"';
    $problemQuery = 'INSERT INTO user_anwers_question (user_user_id, question_question_id, code, answer_date) VALUES ('.$userId.','.$probId.',\''.$code.'\','.$date.');';
//INSERT INTO user_anwers_question (user_user_id, question_question_id, code, answer_date) VALUES (2,1,"public class Main{public static void main(String[] args) {System.out.println('Hello, World!'); }}", 2022-12-14);
    require_once 'models/dbConnector.php';
    executeQuerySelect($problemQuery);
}