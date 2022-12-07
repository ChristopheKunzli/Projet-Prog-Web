<?php
/**
 * @file     gabarit.php
 * @brief    Skeleton of all pages on the site
 * @author   Created by Christophe.KUNZLI
 * @version  30.11.2022
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leakcode</title>


    <style>
        :root {
            /* variables storing all 5 colors chosen on mood-board */
            --color1: #4776ED;
            --color2: #3F91D4;
            --color3: #52CFEB;
            --color4: #3FD4C7;
            --color5: #49F5B3;
        }

        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: var(--color3);
        }

        .menu li {
            float: left;
        }

        .menu li a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: var(--color5);
        }
    </style>
</head>
<body>
<nav>
    <ul class="menu">
        <li><a class="navlink" href="../index.php/?action=home">Home</a></li>
        <li><a class="navlink" href="../index.php/?action=problems">Problems</a></li>
        <?php
        //if(connected){
        echo '<li><a class="navlink" href="../index.php/?action=profile">Profile</a></li>';
        //}else{
        echo '<li><a class="navlink" href="../index.php/?action=login">Login</a></li>';
        //}


        ?>
    </ul>
</nav>

<?= $content; ?>
</body>
</html>