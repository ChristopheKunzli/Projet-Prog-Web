<?php
/**
 * @file problems.php
 * @brief file description
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 06.12.2022
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

function submit($code): void
{
    try {
        require_once "models/sumbitProblem.php";
        $output = submitCode($code);
    } catch (ModelDataBaseException $ex) {
        $articleErrorMessage = "Nous rencontrons des problèmes technique à rendre votre code";
    } finally {
        require "views/submitResult.php";
    }
}