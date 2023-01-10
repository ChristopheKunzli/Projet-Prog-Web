<?php
/**
 * @file profile.php
 * @brief file description
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 06.12.2022
 */
$title = "leakcode - profile";
ob_start();

?>
    <h2>this is your profile</h2>
<?php

$i = 1;
foreach ($userData as $problem) {
    echo '<a href="../index.php/?action=problem&id='.$problem['question_id'].'">'. $i++ .': ' . $problem['question_name'] .': '.$problem['difficulty'] .'</a><br>';
}
?>



<?php
$content = ob_get_clean();
require 'gabarit.php';
?>