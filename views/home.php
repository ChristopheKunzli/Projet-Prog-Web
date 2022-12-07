<?php
/**
 * @file     home.php
 * @brief    Home page of the site
 * @author   Created by Christophe.KUNZLI
 * @version  30.11.2022
 */
$title = "leakcode - home";
ob_start();
?>

<h2>Hello</h2>;

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>