<?php
/**
 * @file     problems.php
 * @brief    Contains a list of problems to show
 * @author   Created by Christophe.KUNZLI
 * @version  30.11.2022
 */
$title = "leakcode - problems";
ob_start();
?>
    <h2>List of problems</h2>

<?php

$i = 1;
foreach ($problemsList as $problem) {
    echo '<a href="../index.php/?action=problem&id='.$problem['id'].'">'. $i++ .': ' . $problem['name'] . '</a><br>';
}
?>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>