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

    <h2>Bienvenu sur leakcode</h2>
<p>
    le site web d'aprentisage qui a des fuites.

    Avant de commencer votre voyage vers l'infini connaissance que nos vous prodigueront,
    prennez le temps de contempler ce CSS incroyable!!!!
    n'est t'il pas magnifique
    Venez repondre à l'un de nos 5 problemes de programation dont la dificulté vous fera fremir
    le troisième va vous étonner!
    enregistrez vous et admirer la magnificience de votre page profile.
    qui ne contient pas moins de 5 champs!!!!

    alors n'hesité plus et devenez un membre* de cette incroyable communauté!!!

    LeakCode plus qu'un site web, un chef-oeuvre de web design.

    *l'inscription mensuel est de 12.- TVA incluse
</p>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>