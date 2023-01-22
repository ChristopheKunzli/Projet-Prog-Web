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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-sm-12" >
            <?php
            echo "<h2>" . $problem[0] . ". " . $problem[1] . "</h2><br>";


            echo "<h3>Description: </h3>";
            echo "<p>" . $problem[2] . "</p>";

            echo "<h3>Constraints: </h3>";
            echo "<p>" . $problem[3] . "</p>";

            $i = 1;

            foreach ($examples as $example) {
                ?>
                <div class='example'>
                    <div >
                        <h3 >Example <?php echo $i++;?>.</h3>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6">
                                <div >
                                    <p>Input: <?= $example["value"] ?></p>
                                </div>
                                <div>
                                    <p>Output: <?= $example["example_output"] ?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <?php
                                if ($example["explanation"]!='') {

                                }
                                echo " <p>Explanation: ".$example["explanation"]."</p>";
                                ?>



                            </div>
                        </div>

                    </div>


                    <?php
                    if (isset($example["image"])) echo "<img src='" . $example["image"] . "' alt='example'>";
                    ?>
                </div>

                <?php
            }
            ?>
        </div>
        <div class="col-md-6 col-sm-12" >
            <form action="../index.php?action=submit" method="post" style="width: 100%">
                <table style="width: inherit">
                    <tr style="width: inherit">
                        <td style="width: inherit">
                        <textarea id="txtCode" name="txtCode"
                                  placeholder="write your code here" ><?php
                            if(isset($userLastTry[0]["code"])){
                                echo $userLastTry[0]["code"];
                            }else if (isset($problem["preload"])){
                                echo $problem["preload"];
                            }

                            ?></textarea>
                        </td>
                        <input type="hidden" name="usrid" value="<?php
                        echo $_SESSION["connected"];
                        ?>">
                        <?php
                        echo '<input type="hidden" name="problemid" value="' . $problem[0] . '">';
                        ?>

                    </tr>
                    <tr>
                        <td><input type="submit" name="hello"></td>
                    </tr>
                </table>
            </form>
            <div class="container mt-3" id="result">
                <?php if (isset($results)){
                    ?>
                    <button class="btn btn-outline-primary" id="errorbutton" onclick="hideexemple(0)">
                        Error
                    </button>


                    <?php
                    $j=1;
                    foreach ($results as $result) {?>
                        <button  class="btn btn-outline-primary" id="examplebutton<?php echo $j ?>"   onclick="hideexemple(<?php echo $j ?>)" style=" <?php
                        if($result["example_output"]==$result["output"] ){
                            ?>
                                 color: darkgreen
                            <?php
                        }else
                        {
                            ?>
                                color: red
                                <?php
                            }
                        ?> ">
                            Exemple <?php echo $j ?>
                        </button>

                        <?php
                        $j++;
                    }?>
                    <div class="exemple" id="example0" >
                        <?php
                        if (isset($results[0]["error"])){
                            echo "aucune erreur";
                        }else{
                            echo $results[0]["error"];
                        }
                        ?>
                    </div>
                    <?php
                    $k=1;
                    foreach ($results as $result) {?>
                        <div class="container-fluid exemple mt-3 border-3" id="example<?php echo $k ?>">
                            <div class="row">
                                <div class="col-6">
                                    <p>
                                        valeur inseré :<?php echo$result["value"] ?>
                                    </p>
                                </div>
                                <div class="col-6">

                                    <div >
                                        <p>valeur attendu :<?php echo $result["example_output"] ?></p>
                                    </div>
                                    <div>
                                        <p>valeur trouvé : <?php echo $result["output"] ?></p>
                                    </div>


                                </div>
                            </div>

                        </div>
                        <?php
                        $k++;
                    }
                }
                else {
                    ?>
                    <div>
                        vous n'avez pas encore repondu
                    </div>
                    <?php
                }
                ?>


            </div>


        </div>
    </div>
</div>



<?php
if(isset($succes)&&$succes[0]){
    echo"<script>
    reussite();
</script>";
}
$content = ob_get_clean();
require 'gabarit.php';
?>