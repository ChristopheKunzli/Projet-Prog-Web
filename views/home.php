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
    <body>
    <div class="container-fluid">
        <p class="centerp">le site web d'aprentisage qui a des fuites.</p>
        <div class="row">
            <div class=" col-lg-6 col-md-9 col-sm-11">
                <p class="leftp ">Avant de commencer votre voyage vers l'infini connaissance que nos vous prodigueront,
                    prennez le temps de contempler ce CSS incroyable!!!!
                    <br>
                    n'est t'il pas magnifique!!!
                </p>
            </div>
            <div class=" col-lg-6  col-md-3 col-sm-1">

            </div>
        </div>
        <div class="row">
            <div class=" col-lg-6  col-md-3 col-sm-1">

            </div>
            <div class=" col-lg-6  col-md-9 col-sm-11">
                <p class="rightp ">
                    Venez repondre à l'un de nos 5 problemes de programation dont la dificulté vous fera fremir
                    <br>
                    le troisième va vous étonner!

                </p>
            </div>
        </div>
        <div class="row">
            <div class=" col-lg-6 col-sm-11 col-md-9">
                <p class="leftp ">
                    enregistrez vous et admirer la magnificience de votre page profile.
                    qui ne contient pas moins de 5 champs!!!!</p>
            </div>
            <div class=" col-lg-6 col-md-3 col-sm-1">

            </div>
        </div>
        <p class="centerp">
            alors n'hesitez plus et devenez un membre* de cette incroyable communauté!!!
            <br>
            LeakCode plus qu'un site web, un chef-oeuvre de web design.
        </p></div>

    <p class="littlep fixed-bottom">*l'inscription mensuel est de 12.- TVA incluse.
    </p>
    </body>



<?php
$content = ob_get_clean();
require 'gabarit.php';
?>