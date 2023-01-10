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
    <div>
        <div>
           username :  <?=$userData[0]['username']?>
        </div>
        <div>
            email :  <?=$userData[0]['email_address']?>
        </div>
        <div>
            date d'inscription :  <?=$userData[0]['registration_date']?>
        </div>
        <div>
            niveau :  <?=$userData[0]['rank_name']?>
        </div>

    </div>
    <div>
        <?php

        if(isset($userData[0]['question_id'])){
            $i = 1;
            foreach ($userData as $problemlist) {
                echo '<a href="../index.php/?action=problem&id='.$problemlist['question_id'].'">'. $i++ .': ' . $problemlist['question_name'] .': '.$problemlist['difficulty'] .'</a><br>';
            }

        }
        else{
            ?>
            vous n'avez encore jamais essayer de resoudre un de nos problèmes
            <br>
            <br>

            <?php
        }
        ?>

    </div>




<?php
$content = ob_get_clean();
require 'gabarit.php';
?>