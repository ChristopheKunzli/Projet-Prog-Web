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
$content = ob_get_clean();
require 'gabarit.php';
?>