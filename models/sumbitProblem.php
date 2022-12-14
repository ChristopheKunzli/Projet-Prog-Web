<?php
/**
 * @file     sumbitProblem.php
 * @brief    File description
 * @author   Created by Christophe.KUNZLI
 * @version  13.12.2022
 */
require 'problemsFetch.php';
require 'problemsSet.php';

function submitCode($code, $usertag, $questiontag): array
{
    addProbAnswer($usertag, $questiontag, $code);
    $psPath = "powershell.exe";
    $psDIR = "C:\\ProjetWeb\\";
    $psScript = "ScriptDB.ps1 " . $usertag . " " . $questiontag;
    $runScript = $psDIR . $psScript;
    $runCMD = $psPath . " " . $runScript . " 2>&1";

    shell_exec($runCMD);
    return getAnwer($questiontag, $usertag);


    //$output = shell_exec($runCMD);
    //echo '<pre>' . $output . '</pre>';
}



