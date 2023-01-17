<?php
/**
 * @file     sumbitProblem.php
 * @brief    Contains the function called when submitting a solution to a problem
 * @author   Created by Christophe.KUNZLI
 * @version  13.12.2022
 */
require 'problemsFetch.php';
require 'problemsSet.php';

/**
 * Calls a powershell script used to execute the code sent when a user submit their solution
 * @param $code
 * @param $usertag
 * @param $questiontag
 * @return array
 */
function submitCode($code, $usertag, $questiontag): array
{
    //
    addProbAnswer($usertag, $questiontag, $code);
    $psPath = "powershell.exe";
    $psDIR = "C:\\ProjetWeb\\";
    $psScript = "ScriptDB.ps1 " . $usertag . " " . $questiontag;
    $runScript = $psDIR . $psScript;
    $runCMD = $psPath . " " . $runScript . " 2>&1";

    shell_exec($runCMD);
    $output = getAnwer($questiontag, $usertag);
    console_log($output);
    return $output;


    //$output = shell_exec($runCMD);
    //echo '<pre>' . $output . '</pre>';
}



