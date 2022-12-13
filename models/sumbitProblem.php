<?php
/**
 * @file     sumbitProblem.php
 * @brief    File description
 * @author   Created by Christophe.KUNZLI
 * @version  13.12.2022
 */
function submitCode($code): string|null|bool
{
    $psPath = "powershell.exe";
    $psDIR = "C:\\";
    $psScript = "test.ps1 " . $code;
    $runScript = $psDIR . $psScript;
    $runCMD = $psPath . " " . $runScript . " 2>&1";

    return '<pre>' . shell_exec($runCMD) . '</pre>';

    //$output = shell_exec($runCMD);
    //echo '<pre>' . $output . '</pre>';
}



