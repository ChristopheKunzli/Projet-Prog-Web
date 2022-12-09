<?php
/**
 * @file     problemX.php
 * @brief    File description
 * @author   Created by Christophe.KUNZLI
 * @version  07.12.2022
 */

$title = $problem[0] . ". " . $problem[1];
ob_start();

function console_log($output, $with_script_tags = true): void
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

console_log($problem);

echo "<h2>" . $problem[0] . ". " . $problem[1] . "</h2>";

echo "<h2>Description: </h2>";
echo "<p>" . $problem[2] . "</p>";

echo "<h2>Constraints: </h2>";
echo "<p>" . $problem[3] . "</p>";

$i = 1;

foreach ($examples as $example){
    echo "<div class='example'>";

    echo "<h2>Example ".$i++.".</h2>";
    echo "<p>Input: ".$example["input"]."</p>";
    echo "<p>Output: ".$example["output"]."</p>";
    echo "<p>Explanation: ".$example["explanation"]."</p>";

    if(isset($example["image"])) echo "<img src='".$example["image"]."' alt='example'>";


    echo "</div>";
}

$content = ob_get_clean();
require 'gabarit.php';
?>