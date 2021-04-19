<?php $title = "Home" ?>
<?php

    if(is_granted('ROLE_USER')){
        ?>
            <h1>Bienvenue <?=$_SESSION['firstname']?> <?=$_SESSION['name']?></h1>
        <?php
    }
    ?>
