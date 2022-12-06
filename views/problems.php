<?php
/**
 * @file     problems.php
 * @brief    Contains a list of problems to show
 * @author   Created by Christophe.KUNZLI
 * @version  30.11.2022
 */



echo "<h2>List of problems</h2>";

foreach ($problemsList as $problem) {
    echo '<p>' . $problem['name'] . ': '.$problem['description'].'</p>';
}

