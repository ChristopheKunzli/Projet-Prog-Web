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
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Difficulté</th>
        </tr>
        </thead>


<?php
$i = 1;
foreach ($problemsList as $problem) {
    ?>

    <tr class="link-primary" href="../index.php/?action=problem&id=<?= $problem['id'] ?>">

        <td ><?= $i++ ?></td>
        <td href="../index.php/?action=problem&id=<?= $problem['id'] ?>"><?= $problem['name'] ?></td>
        <td href="../index.php/?action=problem&id=<?= $problem['id'] ?>"><?php
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

    </table>


<?php
$content = ob_get_clean();
require 'gabarit.php';
?>