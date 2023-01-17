<?php
/**
 * @file     problemX.php
 * @brief    File description
 * @author   Created by Christophe.KUNZLI
 * @version  07.12.2022
 */

$title = $problem[0] . ". " . $problem[1];
ob_start();

console_log($problem);
console_log($examples);

?>
    <style>
        #txtCode {
            width: 100%;
            height: 600px;
        }

        section {
            width: 48%;
            height: 500px;

            float: left;
            padding: 12px;
        }
    </style>

    <section id="problem">
        <?php
        echo "<h2>" . $problem[0] . ". " . $problem[1] . "</h2>";

        echo "<h2>Description: </h2>";
        echo "<p>" . $problem[2] . "</p>";

        echo "<h2>Constraints: </h2>";
        echo "<p>" . $problem[3] . "</p>";

        $i = 1;

        foreach ($examples as $example) {
            echo "<div class='example'>";

            echo "<h2>Example " . $i++ . ".</h2>";
            echo "<p>Input: " . $example["value"] . "</p>";
            echo "<p>Output: " . $example["example_output"] . "</p>";
            echo "<p>Explanation: " . $example["explanation"] . "</p>";

            if (isset($example["image"])) echo "<img src='" . $example["image"] . "' alt='example'>";

            echo "</div>";
        }
        ?>
    </section>
    <section id="code-area">
        <form action="../index.php?action=submit" method="post" style="width: 100%">
            <table style="width: inherit">
                <tr style="width: inherit">
                    <td style="width: inherit">
                        <textarea id="txtCode" name="txtCode"
                                  placeholder="write your code here"><?php if (isset($problem["preload"])) echo $problem["preload"]; ?></textarea>
                    </td>
                    <input type="hidden" name="usrid" value="2">
                    <?php
                    echo '<input type="hidden" name="problemid" value="' . $problem[0] . '">';
                    ?>

                </tr>
                <tr>
                    <td><input type="submit" name="hello"></td>
                </tr>
            </table>
        </form>
    </section>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>