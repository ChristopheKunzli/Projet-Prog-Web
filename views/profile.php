<?php
/**
 * @file profile.php
 * @brief Show the user's profile information and attempted problems
 * @author Created by Pablo-Fernando.ZUBIE
 * @version 06.12.2022
 */
$title = "leakcode - profile";
ob_start();

?>
    <h2>this is your profile</h2>
<br>
    <body>
    <div class="container-fluid">
        <div class="row">
            <div class=" col-lg-6 col-md-6 col-sm-12">
                <h3> Information
                </h3>
                <table>
                    <tr>
                        <td>
                            username
                        </td>
                        <td style="text-align: right">
                            <?= $userData[0]['username'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            email
                        </td>
                        <td style="text-align: right">
                            <?= $userData[0]['email_address'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            date d'inscription
                        </td>
                        <td style="text-align: right">
                            <?= $userData[0]['registration_date'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            niveau
                        </td>
                        <td style="text-align: right">
                            <?= $userData[0]['rank_name'] ?>
                        </td>
                    </tr>
                </table>

            </div>
            <div class=" col-lg-6  col-md-6 col-sm-12">
                <h3> Problème résolu
                </h3>
                <?php

                if (isset($userData[0]['question_id'])) {
                    $i = 1;?>
                    <table class="table-hover table">
                        <thead>
                        <tr>
                            <th class="col-1"></th>
                            <th class="col-5">Nom</th>
                            <th class="col-5">Difficulté</th>
                            <th class="col-1">Reussi</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                    foreach ($userData as $problemlist) {
                        ?>
                        <tr  onclick="redirect(<?=$problemlist['question_id']?>)" >

                        <td ><?= $i++ ?>:</td>
                        <td ><?= $problemlist['question_name'] ?></td>
                        <td ><?= $problemlist['difficulty'] ?></td>
                            <td style="background-color: <?php
                            if($problemlist['succeed'==1]){
                                echo "green";
                            }else{
                                echo "red";
                            }

                            ?>">

                            </td>


                        </tr>

                        <?php
                    }
                    ?>


                        </tbody>

                    </table>




                    <?php
                } else {
                    ?>
                    vous n'avez encore jamais essayer de resoudre un de nos problèmes
                    <br>
                    <br>

                    <?php
                }
                ?>



            </div>

        </div>

    </body>




<?php
$content = ob_get_clean();
require 'gabarit.php';
?>