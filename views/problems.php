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
?>
    <table class="table-hover table">
        <thead>
        <tr>
            <th class="col-1"></th>
            <th class="col-5">Nom</th>
            <th class="col-5">Difficulté</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($problemsList as $problem) {
            ?>

            <tr  onclick="redirect(<?=$problem['id']?>)" >

                <td ><?= $i++ ?>:</td>
                <td ><?= $problem['name'] ?></td>
                <td ><?php
                    switch($problem['Difficulty_id']){
                        case 1:
                            echo "facile";
                            break;
                        case 2:
                            echo "moyen";
                            break;
                        case 3:
                            echo "difficile";
                            break;

                    }
                    ?></td>

            </tr>
            <?php
            // echo '<a href="../index.php/?action=problem&id=' . $problem['id'] . '">' . $i++ . ': ' . $problem['name'] . '<br>';
        }
        ?>

        </tbody>

    </table>


<?php
$content = ob_get_clean();
require 'gabarit.php';
?>