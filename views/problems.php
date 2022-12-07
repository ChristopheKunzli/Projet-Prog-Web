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

<?php
echo "<h2>List of problems</h2>";

foreach ($problemsList as $problem) {
    echo '<p><b style="font-size: 20px;">' . $problem['name'] . '</b>: ' . $problem['description'] . '</p>';
}
?>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>