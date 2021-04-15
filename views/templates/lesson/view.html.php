 <p><?=$name?></p>
<p><?=isset($time)?$time:""?></p>
<form action="" method="POST">
    <button name="valid" type="submit">Lancer le cours</button>
</form>

<form action="" method="POST">
    <button type="submit" name="validMarqueur">Nouveau marqueurs</button>
</form>
<?php
    foreach($marqueurs as $marqueur){
        ?>
        <p><?=$marqueur['content']?></p></br>
        <?php 

    }
?>