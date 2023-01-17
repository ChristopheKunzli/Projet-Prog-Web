<?php
/**
 * @file problems.php
 * @brief Manages problems
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 06.12.2022
 */

/**
 * Show problem list page
 * @return void
 */
function problemsList()
{
    try {
        require_once "models/problemsFetch.php";
        $problemsList = getProblemList();

    } catch (ModelDataBaseException $ex) {
        $articleErrorMessage = "Nous rencontrons des problèmes technique a charger les questions";
    } finally {
        require "views/problems.php";
    }
}

/**
 * Show a specific problem's page. The page comes with a code area
 * @return void
 */
function problemX()
{
    try {
        require_once "models/problemsFetch.php";
        $problem = getProblem($_GET["id"]);
        $examples = getExamples($_GET["id"]);
    } catch (ModelDataBaseException $ex) {
        $articleErrorMessage = "Nous rencontrons des problèmes technique a charger la question";
    } finally {
        require "views/problemX.php";
    }
}

/**
 * Allows the user to submit a solution to a problem
 * @param $post
 * @return void
 */
function submit($post): void
{
    try {
        require_once "models/sumbitProblem.php";
        $output = submitCode($post['txtCode'], $post['usrid'], $post['problemid']);

        require_once "models/problemsFetch.php";
        $problem = getProblem($_POST["problemid"]);
        $examples = getExamples($_POST["problemid"]);

    } catch (ModelDataBaseException $ex) {
        $articleErrorMessage = "Nous rencontrons des problèmes technique à rendre votre code";
    } finally {
        require "views/problemX.php";
    }
}