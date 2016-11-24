<?php
    $artikels[0]["title"] = "Titel van artikel 1";
    $artikels[0]["text"] = "Tekst van artikel 1";
    $artikels[0]["tags"] = "tag 1 van artikel 1";

    $artikels[1]["title"] = "Titel van artikel 2";
    $artikels[1]["text"] = "Tekst van artikel 2";
    $artikels[1]["tags"][0] = "tag 1 van artikel 2";
    $artikels[1]["tags"][1] = "tag 2 van artikel 2";

    $artikels[2]["title"] = "Titel van artikel 3";
    $artikels[2]["text"] = "Tekst van artikel 3";
    $artikels[2]["tags"][0] = "tag 1 van artikel 3";
    $artikels[2]["tags"][1] = "tag 2 van artikel 3";
    $artikels[2]["tags"][2] = "tag 3 van artikel 3";
?>
<?php include "view/header-partial.php" ?>
<?php include "view/body-partial.php" ?>
<div class="artikel">
    <?php 
        for ($i = 0, $iLen = 3;$i < $iLen; $i++) {
            foreach ($artikels[$i] as $value) {
                
                echo "$value<br> \n"; #error bij 3de dimensie voor de tags.
            }
            echo "<br>";
        }
    ?>
</div>
<?php include "view/footer-partial.php" ?>